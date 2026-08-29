<?php

namespace App\Services;

use App\Models\ContentItem;
use App\Models\SiteContent;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class ContentService
{
    public const LOCALES = ['fa', 'en'];

    public function currentLocale(): string
    {
        $locale = app()->getLocale();

        return in_array($locale, self::LOCALES, true) ? $locale : 'fa';
    }

    public function get(string $section, string $key, ?string $default = null, ?string $locale = null): ?string
    {
        $value = $this->section($section, $locale)[$key] ?? null;

        return $value !== null && $value !== '' ? $value : $default;
    }

    public function section(string $section, ?string $locale = null): array
    {
        $locale ??= $this->currentLocale();

        return Cache::remember($this->cacheKey($section, $locale), 60, function () use ($section, $locale) {
            return SiteContent::query()
                ->where('section', $section)
                ->where('locale', $locale)
                ->pluck('value', 'field_key')
                ->all();
        });
    }

    public function put(string $section, string $key, ?string $value, ?string $locale = null): void
    {
        $locale ??= $this->currentLocale();

        SiteContent::query()->updateOrCreate(
            [
                'section' => $section,
                'field_key' => $key,
                'locale' => $locale,
            ],
            ['value' => $value]
        );

        $this->forgetSection($section, $locale);
    }

    public function putMany(string $section, array $values, ?string $locale = null): void
    {
        $locale ??= $this->currentLocale();

        foreach ($values as $key => $value) {
            if (is_array($value)) {
                $value = implode("\n", array_filter(array_map('trim', $value), fn ($line) => $line !== ''));
            }

            $this->put($section, $key, $value === null ? null : (string) $value, $locale);
        }
    }

    public function putLocalized(string $section, array $byLocale): void
    {
        foreach ($byLocale as $locale => $values) {
            if (! in_array($locale, self::LOCALES, true) || ! is_array($values)) {
                continue;
            }

            $this->putMany($section, $values, $locale);
        }
    }

    public function lines(string $section, string $key, ?string $locale = null): array
    {
        $raw = (string) $this->get($section, $key, '', $locale);

        if ($raw === '') {
            return [];
        }

        return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $raw) ?: []), fn ($line) => $line !== ''));
    }

    public function items(string $section, ?string $locale = null): Collection
    {
        $locale ??= $this->currentLocale();

        return ContentItem::query()
            ->where('section', $section)
            ->where('locale', $locale)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
    }

    public function syncItems(string $section, array $titles, array $descriptions = [], array $images = [], ?string $locale = null): void
    {
        $locale ??= $this->currentLocale();

        ContentItem::query()
            ->where('section', $section)
            ->where('locale', $locale)
            ->delete();

        foreach ($titles as $index => $title) {
            $title = trim((string) $title);
            $description = trim((string) ($descriptions[$index] ?? ''));
            $image = trim((string) ($images[$index] ?? ''));

            if ($title === '' && $description === '' && $image === '') {
                continue;
            }

            ContentItem::query()->create([
                'section' => $section,
                'locale' => $locale,
                'title' => $title !== '' ? $title : null,
                'description' => $description !== '' ? $description : null,
                'image' => $image !== '' ? $image : null,
                'sort_order' => $index,
            ]);
        }
    }

    public function syncLocalizedItems(string $section, array $byLocale): void
    {
        foreach ($byLocale as $locale => $payload) {
            if (! in_array($locale, self::LOCALES, true)) {
                continue;
            }

            $this->syncItems(
                $section,
                $payload['titles'] ?? [],
                $payload['descriptions'] ?? [],
                $payload['images'] ?? [],
                $locale
            );
        }
    }

    public function forgetSection(string $section, ?string $locale = null): void
    {
        if ($locale) {
            Cache::forget($this->cacheKey($section, $locale));

            return;
        }

        foreach (self::LOCALES as $code) {
            Cache::forget($this->cacheKey($section, $code));
        }
    }

    private function cacheKey(string $section, string $locale): string
    {
        return "site_content.{$locale}.{$section}";
    }
}
