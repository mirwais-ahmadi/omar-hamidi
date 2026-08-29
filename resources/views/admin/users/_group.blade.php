@php
    /** @var \Illuminate\Support\Collection<int, \App\Models\User> $items */
@endphp

@forelse ($items as $item)
    <article class="rounded-xl border border-line bg-mist/40 p-4" data-user-row>
        <div class="flex items-start justify-between gap-3">
            <div class="min-w-0">
                <p class="truncate text-sm font-semibold text-ink">{{ $item->name }}</p>
                <p class="font-latin mt-1 truncate text-xs text-ink-soft" dir="ltr">{{ $item->email }}</p>
            </div>
            <span @class([
                'shrink-0 rounded-lg px-2.5 py-1 text-[11px] font-semibold',
                'bg-brand-soft text-brand-deep' => $item->isAdmin(),
                'bg-white text-ink-soft ring-1 ring-line' => ! $item->isAdmin(),
            ])>
                {{ $item->roleLabel() }}
            </span>
        </div>

        <div class="mt-4 flex flex-wrap items-center gap-2" data-user-actions>
            <a href="{{ route('admin.users.edit', $item) }}" class="rounded-lg border border-line bg-white px-3 py-1.5 text-xs font-medium text-ink transition hover:border-brand hover:text-brand-deep" data-edit-link>
                ویرایش
            </a>
            @if (auth()->id() !== $item->id)
                <div data-inline-confirm>
                    <button
                        type="button"
                        class="rounded-lg border border-red-200 bg-red-50 px-3 py-1.5 text-xs font-medium text-red-700 transition hover:bg-red-100"
                        data-confirm-trigger
                    >
                        حذف
                    </button>

                    <form
                        method="POST"
                        action="{{ route('admin.users.destroy', $item) }}"
                        class="hidden items-center gap-1.5"
                        data-confirm-panel
                    >
                        @csrf
                        @method('DELETE')
                        <span class="me-1 text-[11px] text-red-700/80">حذف شود؟</span>
                        <button
                            type="button"
                            class="rounded-lg border border-line bg-white px-2.5 py-1.5 text-xs font-medium text-ink-soft transition hover:bg-mist"
                            data-confirm-cancel
                        >
                            انصراف
                        </button>
                        <button
                            type="submit"
                            class="rounded-lg bg-red-600 px-2.5 py-1.5 text-xs font-semibold text-white transition hover:bg-red-700"
                            data-confirm-submit
                        >
                            تأیید حذف
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </article>
@empty
    <div class="rounded-xl border border-dashed border-line bg-mist/30 px-4 py-8 text-center text-sm text-ink-soft">
        {{ $empty ?? 'کاربری در این گروه نیست.' }}
    </div>
@endforelse
