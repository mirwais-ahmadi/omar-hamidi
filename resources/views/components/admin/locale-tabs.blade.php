@props([
    'id' => 'locale-tabs',
])

@php
    $active = old('_active_locale', 'fa');
@endphp

<div class="locale-tabs" data-locale-tabs="{{ $id }}">
    <div class="mb-5 flex gap-2 rounded-2xl border border-line bg-mist/60 p-1">
        <button type="button" data-locale-tab="fa" class="locale-tab flex-1 rounded-xl px-4 py-2.5 text-sm font-semibold transition {{ $active === 'fa' ? 'is-active bg-white text-brand-deep shadow-sm' : 'text-ink-soft' }}">
            فارسی
        </button>
        <button type="button" data-locale-tab="en" class="locale-tab flex-1 rounded-xl px-4 py-2.5 text-sm font-semibold transition {{ $active === 'en' ? 'is-active bg-white text-brand-deep shadow-sm' : 'text-ink-soft' }}">
            English
        </button>
    </div>

    <input type="hidden" name="_active_locale" value="{{ $active }}" data-active-locale>

    <div data-locale-panel="fa" class="{{ $active === 'fa' ? '' : 'hidden' }} space-y-5">
        {{ $fa }}
    </div>
    <div data-locale-panel="en" class="{{ $active === 'en' ? '' : 'hidden' }} space-y-5" dir="ltr">
        {{ $en }}
    </div>
</div>
