@props([
    'label',
    'name',
    'value' => '',
    'rows' => 4,
    'placeholder' => '',
    'hint' => null,
])

<label class="block">
    <span class="mb-1.5 block text-sm font-medium text-ink">{{ $label }}</span>
    <textarea
        name="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        class="admin-input w-full resize-y"
    >{{ $value }}</textarea>
    @if ($hint)
        <span class="mt-1.5 block text-xs text-ink-soft">{{ $hint }}</span>
    @endif
</label>
