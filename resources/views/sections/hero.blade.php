<section id="top" class="hero-wash relative min-h-[100svh] overflow-hidden pt-24 text-white">
    <div class="pointer-events-none absolute inset-0 surface-dots opacity-50"></div>
    <div class="pointer-events-none absolute -start-24 top-24 h-72 w-72 rounded-full bg-accent/25 blur-3xl"></div>
    <div class="pointer-events-none absolute -end-20 bottom-10 h-64 w-64 rounded-full bg-warm/20 blur-3xl"></div>

    <div class="relative mx-auto grid min-h-[calc(100svh-6rem)] max-w-7xl items-center gap-10 px-4 pb-16 pt-6 sm:px-6 lg:grid-cols-12 lg:gap-10 lg:px-8 lg:pb-20">
        <div class="hero-copy lg:col-span-6">
            <p class="font-latin mb-4 text-xs font-semibold uppercase tracking-[0.24em] text-white/70">
                Est. {{ $settings['founded'] ?? '1385 / 2006' }} · Kabul, Afghanistan
            </p>
            <h1 class="text-4xl font-extrabold leading-[1.2] sm:text-5xl lg:text-[3.2rem]">
                {{ $hero['title'] ?? 'عمر حمیدی لمیتد' }}
            </h1>
            <p class="mt-4 max-w-xl text-lg font-medium text-white/90 sm:text-xl">
                {{ $hero['tagline'] ?? 'سلامتی شما، تعهد ما — با افتخار در خدمت جامعه ایم' }}
            </p>
            <p class="mt-5 max-w-lg text-base leading-8 text-white/70">
                {{ $hero['text'] ?? '' }}
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="{{ route('products') }}" class="rounded-xl bg-white px-6 py-3.5 text-sm font-semibold text-brand-deep transition hover:bg-brand-soft">
                    {{ $hero['cta_primary'] ?? 'محصولات و خدمات' }}
                </a>
                <a href="{{ route('contact') }}" class="rounded-xl border border-white/30 bg-white/5 px-6 py-3.5 text-sm font-semibold text-white backdrop-blur transition hover:bg-white/15">
                    {{ $hero['cta_secondary'] ?? 'درخواست همکاری' }}
                </a>
            </div>
            <dl class="mt-10 grid max-w-lg grid-cols-3 gap-4 border-t border-white/15 pt-8">
                <div>
                    <dt class="font-latin text-2xl font-bold">{{ $hero['stat_1_value'] ?? '۱۳۸۵' }}</dt>
                    <dd class="mt-1 text-xs text-white/60">{{ $hero['stat_1_label'] ?? 'سال تأسیس' }}</dd>
                </div>
                <div>
                    <dt class="font-latin text-2xl font-bold">{{ $hero['stat_2_value'] ?? '۲۹' }}</dt>
                    <dd class="mt-1 text-xs text-white/60">{{ $hero['stat_2_label'] ?? 'نمایندگی رسمی' }}</dd>
                </div>
                <div>
                    <dt class="font-latin text-2xl font-bold">{{ $hero['stat_3_value'] ?? '۳۴' }}</dt>
                    <dd class="mt-1 text-xs text-white/60">{{ $hero['stat_3_label'] ?? 'ولایت پوشش' }}</dd>
                </div>
            </dl>
        </div>

        <div class="hero-visual relative lg:col-span-6">
            <div class="animate-drift relative overflow-hidden rounded-[2rem] border border-white/15 shadow-[0_40px_80px_-30px_rgba(0,0,0,0.55)]">
                <img
                    src="{{ asset($hero['image'] ?? 'images/hamidi/warehouse.png') }}"
                    alt="{{ $settings['company_fa'] ?? __('Omar Hamidi Trading Ltd') }}"
                    class="aspect-[4/3] w-full object-cover"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-[#072f38]/70 via-transparent to-transparent"></div>
            </div>
        </div>
    </div>
</section>
