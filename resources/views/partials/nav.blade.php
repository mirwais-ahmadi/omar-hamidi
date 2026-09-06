@php
    $links = [
        ['route' => 'about', 'label' => __('About')],
        ['route' => 'why', 'label' => __('Why Omar Hamidi')],
        ['route' => 'products', 'label' => __('Products')],
        ['route' => 'network', 'label' => __('Distribution Network')],
        ['route' => 'licenses', 'label' => __('Licenses')],
        ['route' => 'contact', 'label' => __('Contact')],
    ];
    $currentLocale = app()->getLocale();
    $brandName = $currentLocale === 'en'
        ? ($settings['company_en'] ?? 'Omar Hamidi Trading Ltd')
        : ($settings['company_fa'] ?? 'عمر حمیدی لمیتد');
    $brandSub = $currentLocale === 'en'
        ? ($settings['company_fa'] ?? 'عمر حمیدی لمیتد')
        : ($settings['company_en'] ?? 'Omar Hamidi Trading Ltd');
@endphp

<header id="site-nav" class="fixed inset-x-0 top-0 z-50 transition-all duration-300">
    <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="group flex min-w-0 items-center gap-3">
            <img
                src="{{ asset('logo/logo.jpeg') }}"
                alt="{{ $brandName }}"
                class="h-12 w-auto max-w-[9.5rem] rounded-lg bg-white object-contain p-1 shadow-sm ring-1 ring-white/40 sm:h-14 sm:max-w-[11rem]"
            >
            <div class="hidden min-w-0 leading-tight sm:block">
                <span class="nav-brand-title block truncate text-sm font-bold sm:text-base">{{ $brandName }}</span>
                <span @class(['nav-brand-sub block truncate text-[11px] font-semibold tracking-wide', 'font-latin' => $currentLocale === 'fa'])>{{ $brandSub }}</span>
            </div>
        </a>

        <nav class="hidden items-center gap-1 lg:flex" aria-label="{{ __('Quick access') }}">
            @foreach ($links as $link)
                <a
                    href="{{ route($link['route']) }}"
                    @class([
                        'nav-link rounded-lg px-3 py-2 text-sm font-medium transition',
                        'is-active' => request()->routeIs($link['route']),
                    ])
                >
                    {{ $link['label'] }}
                </a>
            @endforeach
        </nav>

        <div class="flex items-center gap-2">
            <div class="nav-locale flex items-center rounded-xl border p-1 text-xs font-semibold">
                <a
                    href="{{ route('locale.switch', 'fa') }}"
                    @class([
                        'rounded-lg px-2.5 py-1.5 transition',
                        'is-active' => $currentLocale === 'fa',
                    ])
                    hreflang="fa"
                    lang="fa"
                >{{ __('Persian') }}</a>
                <a
                    href="{{ route('locale.switch', 'en') }}"
                    @class([
                        'rounded-lg px-2.5 py-1.5 font-latin transition',
                        'is-active' => $currentLocale === 'en',
                    ])
                    hreflang="en"
                    lang="en"
                >{{ __('English') }}</a>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="nav-ghost hidden rounded-xl border px-3 py-2.5 text-sm font-medium transition sm:inline-flex">
                {{ __('Admin') }}
            </a>
            <a href="{{ route('contact') }}" class="hidden rounded-xl bg-brand px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-brand-deep sm:inline-flex">
                {{ __('Contact Us') }}
            </a>
            <button id="menu-toggle" type="button" class="nav-menu-btn inline-flex h-11 w-11 items-center justify-center rounded-xl border lg:hidden" aria-controls="mobile-menu" aria-expanded="false" aria-label="Menu">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7h16M4 12h16M4 17h16" stroke-linecap="round"/></svg>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden border-t border-white/15 bg-brand-deep/95 backdrop-blur-md lg:hidden">
        <nav class="mx-auto flex max-w-7xl flex-col gap-1 px-4 py-4" aria-label="Mobile">
            @foreach ($links as $link)
                <a
                    href="{{ route($link['route']) }}"
                    @class([
                        'rounded-lg px-3 py-3 text-base font-medium text-white/90',
                        'bg-white/15 text-white' => request()->routeIs($link['route']),
                        'hover:bg-white/10' => ! request()->routeIs($link['route']),
                    ])
                >
                    {{ $link['label'] }}
                </a>
            @endforeach
            <div class="mt-2 flex gap-2">
                <a href="{{ route('locale.switch', 'fa') }}" @class(['flex-1 rounded-xl border px-3 py-2.5 text-center text-sm font-semibold', 'border-white bg-white text-brand-deep' => $currentLocale === 'fa', 'border-white/30 text-white' => $currentLocale !== 'fa'])>{{ __('Persian') }}</a>
                <a href="{{ route('locale.switch', 'en') }}" @class(['font-latin flex-1 rounded-xl border px-3 py-2.5 text-center text-sm font-semibold', 'border-white bg-white text-brand-deep' => $currentLocale === 'en', 'border-white/30 text-white' => $currentLocale !== 'en'])>{{ __('English') }}</a>
            </div>
            <a href="{{ route('contact') }}" class="mt-2 rounded-xl bg-brand px-4 py-3 text-center text-sm font-semibold text-white">{{ __('Contact Us') }}</a>
            <a href="{{ route('admin.dashboard') }}" class="rounded-xl border border-white/25 px-4 py-3 text-center text-sm font-medium text-white/80">{{ __('Admin Panel') }}</a>
        </nav>
    </div>
</header>
