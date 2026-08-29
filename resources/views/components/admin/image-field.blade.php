@props([
    'label',
    'name',
    'current' => null,
    'hint' => 'فرمت‌های مجاز: JPG, PNG, WEBP — حداکثر ۵ مگابایت',
])

<div class="rounded-xl border border-line bg-mist/40 p-4">
    <div class="flex flex-wrap items-start gap-4">
        <div class="h-28 w-40 overflow-hidden rounded-xl border border-line bg-white">
            @if ($current)
                <img src="{{ asset($current) }}" alt="{{ $label }}" class="h-full w-full object-cover">
            @else
                <div class="flex h-full items-center justify-center text-xs text-ink-soft">بدون تصویر</div>
            @endif
        </div>
        <div class="min-w-[14rem] flex-1">
            <p class="text-sm font-semibold text-ink">{{ $label }}</p>
            @if ($current)
                <p class="font-latin mt-1 break-all text-[11px] text-ink-soft" dir="ltr">{{ $current }}</p>
            @endif
            <label class="mt-3 block">
                <span class="mb-1.5 block text-xs font-medium text-ink-soft">انتخاب / تعویض تصویر</span>
                <input
                    type="file"
                    name="{{ $name }}"
                    accept="image/png,image/jpeg,image/webp,image/gif"
                    class="admin-input w-full"
                    {{ $attributes }}
                >
            </label>
            @if ($hint)
                <p class="mt-1.5 text-xs text-ink-soft">{{ $hint }}</p>
            @endif
            @error($name)
                <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
