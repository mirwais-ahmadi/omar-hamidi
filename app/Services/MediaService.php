<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MediaService
{
    public const UPLOAD_ROOT = 'images/uploads';

    /** @var list<string> */
    public const SECTIONS = [
        'hero',
        'about',
        'network',
        'licenses',
        'products',
    ];

    public function absolutePath(string $relativePath): string
    {
        return public_path(str_replace(['/', '\\'], DIRECTORY_SEPARATOR, ltrim($relativePath, '/\\')));
    }

    public function isManagedUpload(?string $relativePath): bool
    {
        if ($relativePath === null || $relativePath === '') {
            return false;
        }

        $normalized = str_replace('\\', '/', ltrim($relativePath, '/'));

        return str_starts_with($normalized, self::UPLOAD_ROOT.'/');
    }

    public function ensureSectionDirectory(string $sectionPath): void
    {
        $path = $this->absolutePath(self::UPLOAD_ROOT.'/'.trim($sectionPath, '/'));

        if (! File::isDirectory($path)) {
            File::makeDirectory($path, 0755, true);
        }
    }

    /**
     * Store a shared section image under images/uploads/{section}/ with a stable field name.
     * Replaces and deletes the previous managed upload when present.
     */
    public function storeSectionImage(
        UploadedFile $file,
        string $section,
        string $field,
        ?string $previousPath = null,
    ): string {
        $section = $this->normalizeSection($section);
        $this->ensureSectionDirectory($section);

        $label = $this->fieldLabel($section, $field);
        $extension = $this->extension($file);
        $filename = $label.'.'.$extension;
        $relative = self::UPLOAD_ROOT.'/'.$section.'/'.$filename;

        $this->deleteManaged($previousPath);

        if ($previousPath !== $relative) {
            $this->deleteLabelVariants($section, $label, $extension);
        }

        $directory = $this->absolutePath(self::UPLOAD_ROOT.'/'.$section);
        $target = $directory.DIRECTORY_SEPARATOR.$filename;

        if (File::exists($target)) {
            File::delete($target);
        }

        $file->move($directory, $filename);

        return $relative;
    }

    /**
     * Store a product item image under images/uploads/products/{locale}/.
     */
    public function storeProductImage(
        UploadedFile $file,
        string $locale,
        int $index,
        ?string $title = null,
        ?string $previousPath = null,
    ): string {
        $locale = in_array($locale, ContentService::LOCALES, true) ? $locale : 'fa';
        $sectionPath = 'products/'.$locale;
        $this->ensureSectionDirectory($sectionPath);

        $slug = Str::slug((string) $title);
        if ($slug === '') {
            $slug = 'item';
        }
        $slug = Str::limit($slug, 40, '');

        $extension = $this->extension($file);
        $filename = sprintf('product-%02d-%s.%s', $index + 1, $slug, $extension);
        $relative = self::UPLOAD_ROOT.'/'.$sectionPath.'/'.$filename;

        $this->deleteManaged($previousPath);

        $directory = $this->absolutePath(self::UPLOAD_ROOT.'/'.$sectionPath);
        $target = $directory.DIRECTORY_SEPARATOR.$filename;

        if (File::exists($target) && ($previousPath === null || $previousPath !== $relative)) {
            File::delete($target);
        }

        $file->move($directory, $filename);

        return $relative;
    }

    public function deleteManaged(?string $relativePath): bool
    {
        if (! $this->isManagedUpload($relativePath)) {
            return false;
        }

        $absolute = $this->absolutePath((string) $relativePath);

        if (! File::isFile($absolute)) {
            return false;
        }

        return File::delete($absolute);
    }

    /**
     * Delete managed paths that are no longer referenced.
     *
     * @param  list<string|null>  $previousPaths
     * @param  list<string|null>  $keptPaths
     */
    public function deleteOrphans(array $previousPaths, array $keptPaths): void
    {
        $kept = [];
        foreach ($keptPaths as $path) {
            $path = trim((string) $path);
            if ($path !== '') {
                $kept[$path] = true;
            }
        }

        foreach ($previousPaths as $path) {
            $path = trim((string) $path);
            if ($path === '' || isset($kept[$path])) {
                continue;
            }

            $this->deleteManaged($path);
        }
    }

    private function normalizeSection(string $section): string
    {
        $section = Str::slug($section);

        return $section !== '' ? $section : 'misc';
    }

    private function fieldLabel(string $section, string $field): string
    {
        $map = [
            'hero.image' => 'hero-banner',
            'about.image' => 'about-intro',
            'about.leadership_image' => 'leadership-ceo',
            'about.vice_image' => 'leadership-vice',
            'network.image' => 'network',
            'licenses.commerce_image' => 'license-commerce',
            'licenses.moph_image' => 'license-moph',
        ];

        $key = $section.'.'.$field;
        if (isset($map[$key])) {
            return $map[$key];
        }

        $label = Str::slug(str_replace('_', '-', $field));

        return $label !== '' ? $label : 'image';
    }

    private function extension(UploadedFile $file): string
    {
        $extension = strtolower($file->getClientOriginalExtension() ?: $file->extension() ?: 'jpg');

        return in_array($extension, ['jpg', 'jpeg', 'png', 'webp', 'gif'], true) ? $extension : 'jpg';
    }

    private function deleteLabelVariants(string $section, string $label, string $keepExtension): void
    {
        $directory = $this->absolutePath(self::UPLOAD_ROOT.'/'.$section);

        if (! File::isDirectory($directory)) {
            return;
        }

        foreach (File::files($directory) as $file) {
            $name = $file->getFilename();
            $base = pathinfo($name, PATHINFO_FILENAME);
            $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

            if ($base === $label && $ext !== $keepExtension) {
                File::delete($file->getPathname());
            }
        }
    }
}
