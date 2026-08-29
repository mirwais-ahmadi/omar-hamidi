@props([
    'title',
    'description' => null,
])

<section class="rounded-2xl border border-line bg-white p-5 sm:p-6">
    <div class="mb-5 border-b border-line pb-4">
        <h2 class="text-base font-bold text-ink">{{ $title }}</h2>
        @if ($description)
            <p class="mt-1 text-sm text-ink-soft">{{ $description }}</p>
        @endif
    </div>
    <div class="space-y-4">
        {{ $slot }}
    </div>
</section>
