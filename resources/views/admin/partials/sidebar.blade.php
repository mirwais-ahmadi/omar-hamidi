@php
    $user = auth()->user();
    $nav = [
        ['route' => 'admin.dashboard', 'label' => 'داشبورد', 'icon' => 'dashboard', 'match' => 'admin.dashboard'],
        ['route' => 'admin.hero', 'label' => 'صفحه اصلی / Hero', 'icon' => 'home', 'match' => 'admin.hero'],
        ['route' => 'admin.about', 'label' => 'درباره ما', 'icon' => 'about', 'match' => 'admin.about'],
        ['route' => 'admin.why', 'label' => 'چرا عمر حمیدی', 'icon' => 'why', 'match' => 'admin.why'],
        ['route' => 'admin.products', 'label' => 'محصولات و خدمات', 'icon' => 'products', 'match' => 'admin.products'],
        ['route' => 'admin.network', 'label' => 'شبکه توزیع', 'icon' => 'network', 'match' => 'admin.network'],
        ['route' => 'admin.licenses', 'label' => 'جوازها', 'icon' => 'license', 'match' => 'admin.licenses'],
        ['route' => 'admin.partners', 'label' => 'شرکای استراتژیک', 'icon' => 'partners', 'match' => 'admin.partners'],
        ['route' => 'admin.contact', 'label' => 'تماس و اطلاعات', 'icon' => 'contact', 'match' => 'admin.contact'],
        ['route' => 'admin.settings', 'label' => 'تنظیمات سایت', 'icon' => 'settings', 'match' => 'admin.settings'],
    ];

    if ($user?->canManageUsers()) {
        $nav[] = ['route' => 'admin.users.index', 'label' => 'مدیریت کاربران', 'icon' => 'users', 'match' => 'admin.users.*'];
    }
@endphp

<aside id="admin-sidebar" class="fixed inset-y-0 start-0 z-40 flex h-dvh w-72 flex-col border-e border-line bg-white">
    <div class="flex h-16 shrink-0 items-center gap-3 border-b border-line px-5">
        <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-brand text-sm font-bold text-white">OH</span>
        <div class="min-w-0">
            <p class="truncate text-sm font-bold text-ink">پنل مدیریت</p>
            <p class="font-latin truncate text-[11px] text-ink-soft">Omar Hamidi CMS</p>
        </div>
    </div>

    <nav class="admin-sidebar-nav min-h-0 flex-1 space-y-1 overflow-y-auto overscroll-contain px-3 py-4" aria-label="منوی ادمین">
        @foreach ($nav as $item)
            <a
                href="{{ route($item['route']) }}"
                @class([
                    'flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition',
                    'bg-brand-soft text-brand-deep' => request()->routeIs($item['match']),
                    'text-ink-soft hover:bg-mist hover:text-ink' => ! request()->routeIs($item['match']),
                ])
            >
                @include('admin.partials.icons', ['name' => $item['icon']])
                <span>{{ $item['label'] }}</span>
            </a>
        @endforeach
    </nav>

    <div class="shrink-0 border-t border-line p-4">
        <a href="{{ route('home') }}" target="_blank" class="flex items-center justify-between rounded-xl bg-mist px-3 py-2.5 text-sm font-medium text-ink-soft transition hover:text-brand-deep">
            <span>مشاهده سایت</span>
            <span aria-hidden="true">↗</span>
        </a>
    </div>
</aside>
