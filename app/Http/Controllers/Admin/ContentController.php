<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ContentService;
use App\Services\MediaService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;

class ContentController extends Controller
{
    public function __construct(
        private readonly ContentService $content,
        private readonly MediaService $media,
    ) {
    }

    public function hero(): View
    {
        return view('admin.hero', [
            'fa' => $this->content->section('hero', 'fa'),
            'en' => $this->content->section('hero', 'en'),
        ]);
    }

    public function updateHero(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'fa' => ['nullable', 'array'],
            'en' => ['nullable', 'array'],
            'fa.title' => ['nullable', 'string', 'max:255'],
            'fa.tagline' => ['nullable', 'string', 'max:500'],
            'fa.text' => ['nullable', 'string'],
            'fa.cta_primary' => ['nullable', 'string', 'max:120'],
            'fa.cta_secondary' => ['nullable', 'string', 'max:120'],
            'fa.stat_1_value' => ['nullable', 'string', 'max:50'],
            'fa.stat_1_label' => ['nullable', 'string', 'max:120'],
            'fa.stat_2_value' => ['nullable', 'string', 'max:50'],
            'fa.stat_2_label' => ['nullable', 'string', 'max:120'],
            'fa.stat_3_value' => ['nullable', 'string', 'max:50'],
            'fa.stat_3_label' => ['nullable', 'string', 'max:120'],
            'en.title' => ['nullable', 'string', 'max:255'],
            'en.tagline' => ['nullable', 'string', 'max:500'],
            'en.text' => ['nullable', 'string'],
            'en.cta_primary' => ['nullable', 'string', 'max:120'],
            'en.cta_secondary' => ['nullable', 'string', 'max:120'],
            'en.stat_1_value' => ['nullable', 'string', 'max:50'],
            'en.stat_1_label' => ['nullable', 'string', 'max:120'],
            'en.stat_2_value' => ['nullable', 'string', 'max:50'],
            'en.stat_2_label' => ['nullable', 'string', 'max:120'],
            'en.stat_3_value' => ['nullable', 'string', 'max:50'],
            'en.stat_3_label' => ['nullable', 'string', 'max:120'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:5120'],
        ]);

        $this->content->putLocalized('hero', [
            'fa' => $validated['fa'] ?? [],
            'en' => $validated['en'] ?? [],
        ]);

        $this->storeSharedImage($request, 'image', 'hero', 'image');

        return back()->with('success', 'محتوای صفحه اصلی (فارسی/انگلیسی) ذخیره شد.');
    }

    public function about(): View
    {
        return view('admin.about', [
            'fa' => $this->content->section('about', 'fa'),
            'en' => $this->content->section('about', 'en'),
        ]);
    }

    public function updateAbout(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'fa' => ['nullable', 'array'],
            'en' => ['nullable', 'array'],
            'fa.*' => ['nullable', 'string'],
            'en.*' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:5120'],
            'leadership_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:5120'],
        ]);

        $keys = [
            'title', 'p1', 'p2', 'p3', 'leadership_title', 'leadership_name', 'ceo_name', 'vice_name',
            'leadership_message', 'vision', 'mission', 'values', 'philosophy_title', 'philosophy_text', 'commitments',
        ];

        $this->content->putLocalized('about', [
            'fa' => $this->onlyKeys($validated['fa'] ?? [], $keys),
            'en' => $this->onlyKeys($validated['en'] ?? [], $keys),
        ]);

        $this->storeSharedImage($request, 'image', 'about', 'image');
        $this->storeSharedImage($request, 'leadership_image', 'about', 'leadership_image');

        return back()->with('success', 'محتوای درباره ما (فارسی/انگلیسی) ذخیره شد.');
    }

    public function why(): View
    {
        return view('admin.why', [
            'fa' => $this->content->section('why', 'fa'),
            'en' => $this->content->section('why', 'en'),
            'faItems' => $this->content->items('why', 'fa'),
            'enItems' => $this->content->items('why', 'en'),
        ]);
    }

    public function updateWhy(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'fa' => ['nullable', 'array'],
            'en' => ['nullable', 'array'],
            'fa.title' => ['nullable', 'string', 'max:255'],
            'fa.intro' => ['nullable', 'string'],
            'fa.closing' => ['nullable', 'string'],
            'fa.reason_title' => ['nullable', 'array'],
            'fa.reason_title.*' => ['nullable', 'string', 'max:255'],
            'fa.reason_desc' => ['nullable', 'array'],
            'fa.reason_desc.*' => ['nullable', 'string'],
            'en.title' => ['nullable', 'string', 'max:255'],
            'en.intro' => ['nullable', 'string'],
            'en.closing' => ['nullable', 'string'],
            'en.reason_title' => ['nullable', 'array'],
            'en.reason_title.*' => ['nullable', 'string', 'max:255'],
            'en.reason_desc' => ['nullable', 'array'],
            'en.reason_desc.*' => ['nullable', 'string'],
        ]);

        foreach (['fa', 'en'] as $locale) {
            $payload = $validated[$locale] ?? [];
            $this->content->putMany('why', [
                'title' => $payload['title'] ?? null,
                'intro' => $payload['intro'] ?? null,
                'closing' => $payload['closing'] ?? null,
            ], $locale);

            $this->content->syncItems(
                'why',
                $payload['reason_title'] ?? [],
                $payload['reason_desc'] ?? [],
                [],
                $locale
            );
        }

        return back()->with('success', 'صفحه چرا عمر حمیدی (فارسی/انگلیسی) ذخیره شد.');
    }

    public function products(): View
    {
        return view('admin.products', [
            'fa' => $this->content->section('products', 'fa'),
            'en' => $this->content->section('products', 'en'),
            'faItems' => $this->content->items('products', 'fa'),
            'enItems' => $this->content->items('products', 'en'),
        ]);
    }

    public function updateProducts(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'fa' => ['nullable', 'array'],
            'en' => ['nullable', 'array'],
            'fa.title' => ['nullable', 'string', 'max:255'],
            'fa.intro' => ['nullable', 'string'],
            'fa.quality_items' => ['nullable', 'string'],
            'fa.advantage_items' => ['nullable', 'string'],
            'fa.goals' => ['nullable', 'string'],
            'fa.product_title' => ['nullable', 'array'],
            'fa.product_title.*' => ['nullable', 'string', 'max:255'],
            'fa.product_desc' => ['nullable', 'array'],
            'fa.product_desc.*' => ['nullable', 'string'],
            'fa.product_image_current' => ['nullable', 'array'],
            'fa.product_image_current.*' => ['nullable', 'string', 'max:255'],
            'fa.product_image' => ['nullable', 'array'],
            'fa.product_image.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:5120'],
            'en.title' => ['nullable', 'string', 'max:255'],
            'en.intro' => ['nullable', 'string'],
            'en.quality_items' => ['nullable', 'string'],
            'en.advantage_items' => ['nullable', 'string'],
            'en.goals' => ['nullable', 'string'],
            'en.product_title' => ['nullable', 'array'],
            'en.product_title.*' => ['nullable', 'string', 'max:255'],
            'en.product_desc' => ['nullable', 'array'],
            'en.product_desc.*' => ['nullable', 'string'],
            'en.product_image_current' => ['nullable', 'array'],
            'en.product_image_current.*' => ['nullable', 'string', 'max:255'],
            'en.product_image' => ['nullable', 'array'],
            'en.product_image.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:5120'],
        ]);

        foreach (['fa', 'en'] as $locale) {
            $payload = $validated[$locale] ?? [];
            $this->content->putMany('products', [
                'title' => $payload['title'] ?? null,
                'intro' => $payload['intro'] ?? null,
                'quality_items' => $payload['quality_items'] ?? null,
                'advantage_items' => $payload['advantage_items'] ?? null,
                'goals' => $payload['goals'] ?? null,
            ], $locale);

            $images = $this->resolveItemImages(
                $request->file("{$locale}.product_image", []),
                $request->input("{$locale}.product_image_current", []),
                $payload['product_title'] ?? []
            );

            $this->content->syncItems(
                'products',
                $payload['product_title'] ?? [],
                $payload['product_desc'] ?? [],
                $images,
                $locale
            );
        }

        return back()->with('success', 'محصولات و خدمات (فارسی/انگلیسی) ذخیره شد.');
    }

    public function network(): View
    {
        return view('admin.network', [
            'fa' => $this->content->section('network', 'fa'),
            'en' => $this->content->section('network', 'en'),
        ]);
    }

    public function updateNetwork(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'fa' => ['nullable', 'array'],
            'en' => ['nullable', 'array'],
            'fa.*' => ['nullable', 'string'],
            'en.*' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:5120'],
        ]);

        $keys = ['title', 'p1', 'p2', 'offices', 'competitive', 'markets'];

        $this->content->putLocalized('network', [
            'fa' => $this->onlyKeys($validated['fa'] ?? [], $keys),
            'en' => $this->onlyKeys($validated['en'] ?? [], $keys),
        ]);

        $this->storeSharedImage($request, 'image', 'network', 'image');

        return back()->with('success', 'شبکه توزیع (فارسی/انگلیسی) ذخیره شد.');
    }

    public function licenses(): View
    {
        return view('admin.licenses', [
            'fa' => $this->content->section('licenses', 'fa'),
            'en' => $this->content->section('licenses', 'en'),
        ]);
    }

    public function updateLicenses(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'fa' => ['nullable', 'array'],
            'en' => ['nullable', 'array'],
            'fa.*' => ['nullable', 'string'],
            'en.*' => ['nullable', 'string'],
            'commerce_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:5120'],
            'moph_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:5120'],
        ]);

        $keys = ['intro', 'license_no', 'tin', 'ceo_name', 'vice_name', 'commerce_caption', 'moph_caption'];

        $this->content->putLocalized('licenses', [
            'fa' => $this->onlyKeys($validated['fa'] ?? [], $keys),
            'en' => $this->onlyKeys($validated['en'] ?? [], $keys),
        ]);

        $this->storeSharedImage($request, 'commerce_image', 'licenses', 'commerce_image');
        $this->storeSharedImage($request, 'moph_image', 'licenses', 'moph_image');

        return back()->with('success', 'جوازها (فارسی/انگلیسی) ذخیره شد.');
    }

    public function partners(): View
    {
        return view('admin.partners', [
            'fa' => $this->content->section('partners', 'fa'),
            'en' => $this->content->section('partners', 'en'),
            'faItems' => $this->content->items('partners', 'fa'),
            'enItems' => $this->content->items('partners', 'en'),
        ]);
    }

    public function updatePartners(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'fa' => ['nullable', 'array'],
            'en' => ['nullable', 'array'],
            'fa.title' => ['nullable', 'string', 'max:255'],
            'fa.intro' => ['nullable', 'string'],
            'fa.partners' => ['nullable', 'array'],
            'fa.partners.*' => ['nullable', 'string', 'max:255'],
            'en.title' => ['nullable', 'string', 'max:255'],
            'en.intro' => ['nullable', 'string'],
            'en.partners' => ['nullable', 'array'],
            'en.partners.*' => ['nullable', 'string', 'max:255'],
        ]);

        foreach (['fa', 'en'] as $locale) {
            $payload = $validated[$locale] ?? [];
            $this->content->putMany('partners', [
                'title' => $payload['title'] ?? null,
                'intro' => $payload['intro'] ?? null,
            ], $locale);
            $this->content->syncItems('partners', $payload['partners'] ?? [], [], [], $locale);
        }

        return back()->with('success', 'شرکا (فارسی/انگلیسی) ذخیره شد.');
    }

    public function contact(): View
    {
        return view('admin.contact', [
            'fa' => $this->content->section('contact', 'fa'),
            'en' => $this->content->section('contact', 'en'),
        ]);
    }

    public function updateContact(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'fa' => ['nullable', 'array'],
            'en' => ['nullable', 'array'],
            'fa.*' => ['nullable', 'string'],
            'en.*' => ['nullable', 'string'],
        ]);

        $keys = [
            'title', 'intro', 'email', 'phone_1', 'phone_2',
            'hq_title', 'hq_address', 'hq_address_extra', 'regional_offices',
        ];

        $this->content->putLocalized('contact', [
            'fa' => $this->onlyKeys($validated['fa'] ?? [], $keys),
            'en' => $this->onlyKeys($validated['en'] ?? [], $keys),
        ]);

        return back()->with('success', 'اطلاعات تماس (فارسی/انگلیسی) ذخیره شد.');
    }

    public function settings(): View
    {
        return view('admin.settings', [
            'fa' => $this->content->section('settings', 'fa'),
            'en' => $this->content->section('settings', 'en'),
        ]);
    }

    public function updateSettings(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'fa' => ['nullable', 'array'],
            'en' => ['nullable', 'array'],
            'fa.*' => ['nullable', 'string'],
            'en.*' => ['nullable', 'string'],
        ]);

        $keys = ['company_fa', 'company_en', 'site_tagline', 'founded', 'meta_description', 'footer_copy'];

        $this->content->putLocalized('settings', [
            'fa' => $this->onlyKeys($validated['fa'] ?? [], $keys),
            'en' => $this->onlyKeys($validated['en'] ?? [], $keys),
        ]);

        return back()->with('success', 'تنظیمات سایت (فارسی/انگلیسی) ذخیره شد.');
    }

    private function storeSharedImage(Request $request, string $input, string $section, string $field): void
    {
        if (! $request->hasFile($input)) {
            return;
        }

        /** @var UploadedFile $file */
        $file = $request->file($input);
        $path = $this->media->storeUpload($file, $section.'-'.$field);

        foreach (ContentService::LOCALES as $locale) {
            $this->content->put($section, $field, $path, $locale);
        }
    }

    /**
     * @param  array<int, UploadedFile|null>  $files
     * @param  array<int, string|null>  $current
     * @param  array<int, string|null>  $titles
     * @return list<string>
     */
    private function resolveItemImages(array $files, array $current, array $titles): array
    {
        $images = [];
        $count = max(count($titles), count($current), count($files));

        for ($i = 0; $i < $count; $i++) {
            $file = $files[$i] ?? null;

            if ($file instanceof UploadedFile && $file->isValid()) {
                $images[$i] = $this->media->storeUpload($file, 'product-'.$i);
                continue;
            }

            $images[$i] = trim((string) ($current[$i] ?? ''));
        }

        return $images;
    }

    private function onlyKeys(array $payload, array $keys): array
    {
        $out = [];
        foreach ($keys as $key) {
            if (array_key_exists($key, $payload)) {
                $out[$key] = $payload[$key];
            }
        }

        return $out;
    }
}
