<header class="sticky top-0 z-20 flex h-16 items-center justify-between gap-4 border-b border-line bg-white/90 px-4 backdrop-blur sm:px-6 lg:px-8">
    <div class="flex items-center gap-3">
        <button
            id="admin-menu-toggle"
            type="button"
            class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-line bg-white text-ink lg:hidden"
            aria-label="باز کردن منو"
        >
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7h16M4 12h16M4 17h16" stroke-linecap="round"/></svg>
        </button>
        <div>
            <p class="text-sm font-semibold text-ink">@yield('heading', 'مدیریت محتوا')</p>
            <p class="text-xs text-ink-soft">محتوای سایت را از اینجا ویرایش کنید</p>
        </div>
    </div>

    <div class="flex items-center gap-3">
        <a href="{{ route('home') }}" target="_blank" class="hidden rounded-full bg-brand-soft px-3 py-1 text-xs font-medium text-brand-deep sm:inline-flex">
            مشاهده سایت
        </a>
        <div class="flex items-center gap-2 rounded-xl border border-line bg-mist/60 px-2.5 py-1.5">
            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-brand text-xs font-bold text-white">ا</span>
            <div class="hidden sm:block">
                <p class="text-xs font-semibold text-ink">{{ auth()->user()->name ?? 'ادمین' }}</p>
                <p class="text-[11px] text-ink-soft">{{ auth()->user()?->roleLabel() ?? '' }}</p>
            </div>
        </div>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="rounded-xl border border-line bg-white px-3 py-2 text-xs font-medium text-ink-soft hover:text-brand-deep">
                خروج
            </button>
        </form>
    </div>
</header>
