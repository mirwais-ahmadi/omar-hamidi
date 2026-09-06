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
    <div class="mx-auto flex h-16 max-w-7xl items-center justify-between gap-3 px-4 sm:h-[4.25rem] sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="flex min-w-0 shrink-0 items-center gap-2.5">
            <img
                src="{{ asset('logo/logo.jpeg') }}"
                alt="{{ $brandName }}"
                class="h-10 w-auto shrink-0 rounded-md bg-white object-contain p-0.5 shadow-sm ring-1 ring-white/40 sm:h-11"
            >
            <div class="hidden min-w-0 max-w-[10rem] leading-tight 2xl:block 2xl:max-w-[13rem]">
                <span class="nav-brand-title block truncate text-sm font-bold">{{ $brandName }}</span>
                <span @class(['nav-brand-sub block truncate text-[11px] font-semibold tracking-wide', 'font-latin' => $currentLocale === 'fa'])>{{ $brandSub }}</span>
            </div>
        </a>

        <nav class="hidden min-w-0 flex-1 items-center justify-center gap-0.5 xl:flex" aria-label="{{ __('Quick access') }}">
            @foreach ($links as $link)
                <a
                    href="{{ route($link['route']) }}"
                    @class([
                        'nav-link whitespace-nowrap rounded-lg px-2 py-2 text-[13px] font-medium transition 2xl:px-2.5',
                        'is-active' => request()->routeIs($link['route']),
                    ])
                >
                    {{ $link['label'] }}
                </a>
            @endforeach
        </nav>

        <div class="flex shrink-0 items-center gap-2">
            <div class="nav-locale flex items-center rounded-lg border p-0.5 text-xs font-semibold">
                <a
                    href="{{ route('locale.switch', 'fa') }}"
                    @class([
                        'rounded-md px-2 py-1.5 transition',
                        'is-active' => $currentLocale === 'fa',
                    ])
                    hreflang="fa"
                    lang="fa"
                    title="{{ __('Persian') }}"
                >فا</a>
                <a
                    href="{{ route('locale.switch', 'en') }}"
                    @class([
                        'rounded-md px-2 py-1.5 font-latin transition',
                        'is-active' => $currentLocale === 'en',
                    ])
                    hreflang="en"
                    lang="en"
                    title="{{ __('English') }}"
                >EN</a>
            </div>

            <a href="{{ route('contact') }}" class="hidden rounded-lg bg-brand px-3.5 py-2 text-sm font-semibold text-white transition hover:bg-brand-deep 2xl:inline-flex">
                {{ __('Contact Us') }}
            </a>

            <button id="menu-toggle" type="button" class="nav-menu-btn inline-flex h-10 w-10 items-center justify-center rounded-lg border xl:hidden" aria-controls="mobile-menu" aria-expanded="false" aria-label="Menu">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M4 7h16M4 12h16M4 17h16" stroke-linecap="round"/>
                </svg>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden border-t border-white/15 bg-brand-deep/95 backdrop-blur-md xl:hidden">
        <nav class="mx-auto flex max-h-[min(70vh,28rem)] max-w-7xl flex-col gap-0.5 overflow-y-auto px-4 py-3 sm:px-6" aria-label="Mobile">
            @foreach ($links as $link)
                <a
                    href="{{ route($link['route']) }}"
                    @class([
                        'nav-mobile-link rounded-lg px-3 py-3 text-base font-medium',
                        'is-active' => request()->routeIs($link['route']),
                    ])
                >
                    {{ $link['label'] }}
                </a>
            @endforeach
            <a href="{{ route('contact') }}" class="nav-mobile-cta mt-2 rounded-xl bg-accent px-4 py-3 text-center text-sm font-semibold text-white">
                {{ __('Contact Us') }}
            </a>
        </nav>
    </div>
</header>
