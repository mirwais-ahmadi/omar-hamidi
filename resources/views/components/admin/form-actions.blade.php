@props([
    'preview' => null,
    'action' => null,
])

<div class="flex flex-wrap items-center justify-between gap-3 rounded-2xl border border-dashed border-line bg-mist/50 px-4 py-3">
    <p class="text-sm text-ink-soft">پس از ذخیره، تغییرات در سایت عمومی نمایش داده می‌شود.</p>
    <div class="flex flex-wrap gap-2">
        @if ($preview)
            <a href="{{ $preview }}" target="_blank" class="rounded-xl border border-line bg-white px-4 py-2 text-sm font-medium text-ink-soft transition hover:text-brand-deep">
                پیش‌نمایش صفحه
            </a>
        @endif
        <a href="{{ url()->previous() }}" class="rounded-xl border border-line bg-white px-4 py-2 text-sm font-medium text-ink-soft">
            بازگشت
        </a>
        <button type="submit" class="rounded-xl bg-brand px-4 py-2 text-sm font-semibold text-white transition hover:bg-brand-deep">
            ذخیره تغییرات
        </button>
    </div>
</div>
