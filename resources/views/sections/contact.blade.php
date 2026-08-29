@php
    $phone1Digits = preg_replace('/\D+/', '', $contact['phone_1'] ?? '93798303024');
    $phone2Digits = preg_replace('/\D+/', '', $contact['phone_2'] ?? '93799870375');
@endphp

<section class="relative overflow-hidden bg-brand-soft py-20 sm:py-28">
    <div class="pointer-events-none absolute -start-16 top-10 h-56 w-56 rounded-full bg-brand/20 blur-3xl"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal grid gap-10 lg:grid-cols-2">
            <div>
                <p class="text-sm font-semibold text-brand">{{ __('Contact Us') }}</p>
                <h2 class="mt-3 text-3xl font-extrabold text-ink sm:text-4xl">{{ $contact['title'] ?? '' }}</h2>
                <p class="mt-4 text-base leading-8 text-ink-soft">{{ $contact['intro'] ?? '' }}</p>
                <div class="mt-8 space-y-4">
                    <div class="rounded-3xl border border-line bg-white p-6">
                        <h3 class="font-semibold text-ink">{{ $contact['hq_title'] ?? '' }}</h3>
                        <p class="mt-2 text-sm leading-7 text-ink-soft">{{ $contact['hq_address'] ?? '' }}</p>
                        <p class="mt-1 text-sm text-ink-soft">{{ $contact['hq_address_extra'] ?? '' }}</p>
                    </div>
                    <div class="rounded-3xl border border-line bg-white p-6">
                        <h3 class="font-semibold text-ink">{{ __('Phone numbers') }}</h3>
                        <div class="mt-3 flex flex-wrap gap-4 text-sm font-medium" dir="ltr">
                            <a href="https://wa.me/{{ $phone1Digits }}" class="text-brand hover:text-brand-deep">{{ $contact['phone_1'] ?? '' }}</a>
                            <a href="https://wa.me/{{ $phone2Digits }}" class="text-brand hover:text-brand-deep">{{ $contact['phone_2'] ?? '' }}</a>
                        </div>
                        <a href="mailto:{{ $contact['email'] ?? '' }}" class="mt-3 inline-block text-sm text-ink-soft hover:text-brand">{{ $contact['email'] ?? '' }}</a>
                    </div>
                    <div class="rounded-3xl border border-line bg-white p-6">
                        <h3 class="font-semibold text-ink">{{ __('Regional offices') }}</h3>
                        <p class="mt-2 text-sm text-ink-soft">{{ $contact['regional_offices'] ?? '' }}</p>
                    </div>
                </div>
            </div>
            <div class="reveal reveal-delay-1">
                <div class="rounded-[2rem] border border-line bg-white p-7 sm:p-9">
                    <h3 class="text-xl font-bold text-ink">{{ __('Partnership request') }}</h3>
                    <p class="mt-2 text-sm text-ink-soft">{{ __('Message goes to company email') }}</p>
                    <form class="mt-6 space-y-4" action="mailto:{{ $contact['email'] ?? 'omarhamidi380@gmail.com' }}" method="get" enctype="text/plain">
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-ink">{{ __('Name / Organization') }}</span>
                            <input name="subject" required type="text"
                                   class="w-full rounded-xl border border-line bg-mist/50 px-4 py-3 text-sm outline-none focus:border-brand focus:bg-white">
                        </label>
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-ink">{{ __('Phone') }}</span>
                            <input type="tel" required dir="ltr"
                                   class="w-full rounded-xl border border-line bg-mist/50 px-4 py-3 text-sm outline-none focus:border-brand focus:bg-white">
                        </label>
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-ink">{{ __('Subject') }}</span>
                            <select class="w-full rounded-xl border border-line bg-mist/50 px-4 py-3 text-sm outline-none focus:border-brand focus:bg-white">
                                <option>{{ __('Pharmaceutical supply') }}</option>
                                <option>{{ __('Medical equipment') }}</option>
                                <option>{{ __('Provincial agency') }}</option>
                                <option>{{ __('Strategic partnership') }}</option>
                            </select>
                        </label>
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-ink">{{ __('Message') }}</span>
                            <textarea name="body" rows="4"
                                      class="w-full resize-none rounded-xl border border-line bg-mist/50 px-4 py-3 text-sm outline-none focus:border-brand focus:bg-white"></textarea>
                        </label>
                        <button type="submit" class="w-full rounded-xl bg-brand py-3.5 text-sm font-semibold text-white transition hover:bg-brand-deep">
                            {{ __('Send request') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
