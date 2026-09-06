@php
    $currentLocale = app()->getLocale();
    $brandName = $currentLocale === 'en'
        ? ($settings['company_en'] ?? 'Omar Hamidi Trading Ltd')
        : ($settings['company_fa'] ?? 'شرکت تجارتی عمر حمیدی لمیتد');
    $brandSub = $currentLocale === 'en'
        ? ($settings['company_fa'] ?? 'شرکت تجارتی عمر حمیدی لمیتد')
        : ($settings['company_en'] ?? 'Omar Hamidi Trading Ltd');
@endphp

<footer class="border-t border-line bg-ink text-white">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 py-14 sm:px-6 lg:grid-cols-12 lg:px-8">
        <div class="lg:col-span-5">
            <p class="text-lg font-bold">{{ $brandName }}</p>
            <p @class(['mt-1 text-sm text-white/55', 'font-latin' => $currentLocale === 'fa'])>{{ $brandSub }}</p>
            <p class="mt-5 max-w-md text-sm leading-7 text-white/70">
                {{ $settings['site_tagline'] ?? '' }}
            </p>
        </div>
        <div class="lg:col-span-3">
            <h3 class="text-sm font-semibold text-white/90">{{ __('Quick access') }}</h3>
            <ul class="mt-4 space-y-2 text-sm text-white/65">
                <li><a href="{{ route('about') }}" class="hover:text-white">{{ __('About') }}</a></li>
                <li><a href="{{ route('why') }}" class="hover:text-white">{{ __('Why Omar Hamidi') }}</a></li>
                <li><a href="{{ route('products') }}" class="hover:text-white">{{ __('Products & Services') }}</a></li>
                <li><a href="{{ route('network') }}" class="hover:text-white">{{ __('Distribution Network') }}</a></li>
                <li><a href="{{ route('licenses') }}" class="hover:text-white">{{ __('Licenses') }}</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-white">{{ __('Contact') }}</a></li>
            </ul>
        </div>
        <div class="lg:col-span-4">
            <h3 class="text-sm font-semibold text-white/90">{{ __('Connect') }}</h3>
            <ul class="mt-4 space-y-2 text-sm text-white/65">
                <li><a href="mailto:{{ $contactInfo['email'] ?? 'omarhamidi380@gmail.com' }}" class="hover:text-white">{{ $contactInfo['email'] ?? 'omarhamidi380@gmail.com' }}</a></li>
                <li dir="ltr" class="text-start"><a href="tel:{{ preg_replace('/\s+/', '', $contactInfo['phone_1'] ?? '+93798303024') }}" class="hover:text-white">{{ $contactInfo['phone_1'] ?? '+93 798 303 024' }}</a></li>
                <li dir="ltr" class="text-start"><a href="tel:{{ preg_replace('/\s+/', '', $contactInfo['phone_2'] ?? '+93799870375') }}" class="hover:text-white">{{ $contactInfo['phone_2'] ?? '+93 799 870 375' }}</a></li>
                <li>{{ $contactInfo['hq_address'] ?? '' }}</li>
            </ul>
        </div>
    </div>
    <div class="border-t border-white/10">
        <div class="mx-auto flex max-w-7xl flex-col gap-2 px-4 py-5 text-xs text-white/45 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <p>© <span data-year></span> {{ $settings['footer_copy'] ?? 'Omar Hamidi Trading Ltd.' }}</p>
            <div class="flex flex-wrap items-center gap-3">
                <p>{{ __('Established') }} {{ $settings['founded'] ?? '' }}</p>
                <span class="hidden text-white/20 sm:inline">|</span>
                <a href="{{ route('admin.dashboard') }}" class="text-white/55 transition hover:text-white">{{ __('Admin Panel') }}</a>
            </div>
        </div>
    </div>
</footer>
