<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MediaService
{
    public const UPLOAD_DIR = 'images/uploads';

    public function absolutePath(string $relativePath): string
    {
        return public_path(str_replace(['/', '\\'], DIRECTORY_SEPARATOR, ltrim($relativePath, '/\\')));
    }

    public function ensureUploadDirectory(): void
    {
        $path = $this->absolutePath(self::UPLOAD_DIR);

        if (! File::isDirectory($path)) {
            File::makeDirectory($path, 0755, true);
        }
    }

    public function storeUpload(UploadedFile $file, ?string $prefix = null): string
    {
        $this->ensureUploadDirectory();

        $extension = strtolower($file->getClientOriginalExtension() ?: $file->extension() ?: 'jpg');
        $name = ($prefix ? Str::slug($prefix).'-' : '').Str::uuid()->toString().'.'.$extension;
        $file->move($this->absolutePath(self::UPLOAD_DIR), $name);

        return self::UPLOAD_DIR.'/'.$name;
    }
}
