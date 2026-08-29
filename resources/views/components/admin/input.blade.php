@props([
    'label',
    'name',
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'hint' => null,
    'dir' => null,
])

<label class="block">
    <span class="mb-1.5 block text-sm font-medium text-ink">{{ $label }}</span>
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        @if ($type !== 'password') value="{{ $value }}" @endif
        placeholder="{{ $placeholder }}"
        @if ($dir) dir="{{ $dir }}" @endif
        {{ $attributes->merge(['class' => 'admin-input w-full']) }}
    >
    @error($name)
        <span class="mt-1.5 block text-xs text-red-600">{{ $message }}</span>
    @enderror
    @if ($hint)
        <span class="mt-1.5 block text-xs text-ink-soft">{{ $hint }}</span>
    @endif
</label>
