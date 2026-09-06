@extends('layouts.admin')

@section('title', 'رهنما')
@section('heading', 'رهنمای مدیریت محتوا')

@section('page_header')
    <div>
        <h1 class="text-2xl font-extrabold text-ink">رهنمای مدیریت محتوا</h1>
        <p class="mt-1 max-w-2xl text-sm leading-7 text-ink-soft">
            این صفحه راهنمای کامل کار با پنل است: از نوع داده‌ها و زبان‌ها تا فرمت و نسبت تصاویر هر بخش.
        </p>
    </div>
@endsection

@section('content')
    @php
        $toc = [
            ['id' => 'basics', 'label' => 'اصول کلی'],
            ['id' => 'images', 'label' => 'قوانین تصاویر'],
            ['id' => 'hero', 'label' => 'صفحه اصلی / Hero'],
            ['id' => 'about', 'label' => 'درباره ما'],
            ['id' => 'why', 'label' => 'چرا عمر حمیدی'],
            ['id' => 'products', 'label' => 'محصولات و خدمات'],
            ['id' => 'network', 'label' => 'شبکه توزیع'],
            ['id' => 'licenses', 'label' => 'جوازها'],
            ['id' => 'partners', 'label' => 'شرکا'],
            ['id' => 'contact', 'label' => 'تماس'],
            ['id' => 'settings', 'label' => 'تنظیمات'],
            ['id' => 'users', 'label' => 'کاربران'],
            ['id' => 'workflow', 'label' => 'روند کار'],
        ];
    @endphp

    <div class="grid gap-6 xl:grid-cols-[16rem_minmax(0,1fr)]">
        <aside class="xl:sticky xl:top-20 xl:self-start">
            <div class="rounded-2xl border border-line bg-white p-4">
                <p class="mb-3 text-xs font-semibold uppercase tracking-wide text-ink-soft">فهرست</p>
                <nav class="flex flex-wrap gap-2 xl:flex-col xl:gap-1" aria-label="فهرست رهنما">
                    @foreach ($toc as $item)
                        <a href="#{{ $item['id'] }}" class="rounded-lg px-3 py-2 text-sm text-ink-soft transition hover:bg-brand-soft hover:text-brand-deep">
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </nav>
            </div>
        </aside>

        <div class="guide-doc space-y-5">
            <section id="basics" class="scroll-mt-24 rounded-2xl border border-line bg-white p-5 sm:p-6">
                <h2 class="text-lg font-extrabold text-ink">اصول کلی پنل</h2>
                <ul class="mt-4 list-disc space-y-2 pe-5 text-sm leading-7 text-ink-soft">
                    <li>سایت دو زبانه است: <strong class="text-ink">فارسی (fa)</strong> و <strong class="text-ink">انگلیسی (en)</strong>. در هر فرم محتوا، تب زبان را عوض کنید و هر دو را ذخیره کنید.</li>
                    <li>متن‌های رابط کاربری ثابت (مثل نام منوها) از فایل‌های ترجمه می‌آیند؛ محتوای قابل ویرایش در همین پنل ذخیره می‌شود.</li>
                    <li>پس از ذخیره، با دکمه <strong class="text-ink">پیش‌نمایش</strong> صفحه عمومی مربوطه را در تب جدید ببینید.</li>
                    <li>نقش <strong class="text-ink">مدیر سایت</strong> فقط محتوا را ویرایش می‌کند. نقش <strong class="text-ink">مدیر کاربران</strong> علاوه بر آن، حساب‌های ورود را مدیریت می‌کند.</li>
                    <li>لینک ورود به پنل در فوتر سایت عمومی قرار دارد؛ در نوار بالای سایت نمایش داده نمی‌شود.</li>
                </ul>
            </section>

            <section id="images" class="scroll-mt-24 rounded-2xl border border-line bg-white p-5 sm:p-6">
                <h2 class="text-lg font-extrabold text-ink">قوانین مشترک تصاویر</h2>
                <div class="mt-4 overflow-x-auto">
                    <table class="w-full min-w-[36rem] border-collapse text-sm">
                        <thead>
                            <tr class="border-b border-line text-start text-ink">
                                <th class="py-2 pe-3 font-semibold">مورد</th>
                                <th class="py-2 font-semibold">مقدار مجاز</th>
                            </tr>
                        </thead>
                        <tbody class="text-ink-soft">
                            <tr class="border-b border-line/70">
                                <td class="py-2.5 pe-3">فرمت فایل</td>
                                <td class="py-2.5 font-latin">JPG / JPEG / PNG / WEBP / GIF</td>
                            </tr>
                            <tr class="border-b border-line/70">
                                <td class="py-2.5 pe-3">حداکثر حجم</td>
                                <td class="py-2.5">۵ مگابایت (۵۱۲۰ کیلوبایت) برای هر فایل</td>
                            </tr>
                            <tr class="border-b border-line/70">
                                <td class="py-2.5 pe-3">پیشنهاد کیفیت</td>
                                <td class="py-2.5">تصاویر واضح، بدون تاری؛ ترجیحاً WebP یا JPG فشرده‌شده برای سرعت سایت</td>
                            </tr>
                            <tr class="border-b border-line/70">
                                <td class="py-2.5 pe-3">تصاویر مشترک بین زبان‌ها</td>
                                <td class="py-2.5">تصویر Hero، درباره ما، رهبری، شبکه و جوازها برای هر دو زبان یکی است؛ یک‌بار آپلود کافی است</td>
                            </tr>
                            <tr>
                                <td class="py-2.5 pe-3">تصاویر محصول</td>
                                <td class="py-2.5">برای هر زبان می‌تواند جدا باشد (تب فارسی / انگلیسی)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3 class="mt-6 text-base font-bold text-ink">نسبت و اندازه پیشنهادی تصاویر</h3>
                <div class="mt-3 overflow-x-auto">
                    <table class="w-full min-w-[40rem] border-collapse text-sm">
                        <thead>
                            <tr class="border-b border-line text-start text-ink">
                                <th class="py-2 pe-3 font-semibold">تصویر</th>
                                <th class="py-2 pe-3 font-semibold">نسبت</th>
                                <th class="py-2 pe-3 font-semibold">ابعاد پیشنهادی</th>
                                <th class="py-2 font-semibold">نکته نمایش</th>
                            </tr>
                        </thead>
                        <tbody class="text-ink-soft">
                            <tr class="border-b border-line/70">
                                <td class="py-2.5 pe-3">Hero (صفحه اصلی)</td>
                                <td class="py-2.5 pe-3 font-latin">۴∶۳</td>
                                <td class="py-2.5 pe-3 font-latin">۱۶۰۰ × ۱۲۰۰</td>
                                <td class="py-2.5">برش از مرکز؛ سوژه مهم را وسط کادر نگه دارید</td>
                            </tr>
                            <tr class="border-b border-line/70">
                                <td class="py-2.5 pe-3">معرفی شرکت (درباره ما)</td>
                                <td class="py-2.5 pe-3 font-latin">۴∶۳</td>
                                <td class="py-2.5 pe-3 font-latin">۱۴۰۰ × ۱۰۵۰</td>
                                <td class="py-2.5">عکس محیط دفتر / انبار / تیم</td>
                            </tr>
                            <tr class="border-b border-line/70">
                                <td class="py-2.5 pe-3">پیام رهبری</td>
                                <td class="py-2.5 pe-3 font-latin">۱∶۱ مربع</td>
                                <td class="py-2.5 pe-3 font-latin">۸۰۰ × ۸۰۰</td>
                                <td class="py-2.5">چهره در بالای کادر؛ از بالا برش می‌خورد</td>
                            </tr>
                            <tr class="border-b border-line/70">
                                <td class="py-2.5 pe-3">محصول / دسته محصول</td>
                                <td class="py-2.5 pe-3 font-latin">۳∶۲ افقی</td>
                                <td class="py-2.5 pe-3 font-latin">۱۲۰۰ × ۸۰۰</td>
                                <td class="py-2.5">پس‌زمینه ساده؛ محصول واضح در مرکز</td>
                            </tr>
                            <tr class="border-b border-line/70">
                                <td class="py-2.5 pe-3">شبکه توزیع</td>
                                <td class="py-2.5 pe-3 font-latin">۴∶۳</td>
                                <td class="py-2.5 pe-3 font-latin">۱۴۰۰ × ۱۰۵۰</td>
                                <td class="py-2.5">تصویر لجستیک / پوشش جغرافیایی</td>
                            </tr>
                            <tr>
                                <td class="py-2.5 pe-3">تصاویر جواز</td>
                                <td class="py-2.5 pe-3 font-latin">A4 افقی ≈ ۳∶۲ / √۲</td>
                                <td class="py-2.5 pe-3 font-latin">۱۶۰۰ × ۱۱۳۰ یا ۲۹۷۰ × ۲۱۰۰</td>
                                <td class="py-2.5">اسکن افقی (landscape)؛ متن سند راست و خوانا؛ بدون چرخش</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="mt-4 rounded-xl bg-brand-soft/60 px-4 py-3 text-sm leading-7 text-brand-deep">
                    اگر نسبت تصویر با کادر سایت یکی نباشد، سیستم آن را برش می‌دهد (به‌جز جوازها که کامل نشان داده می‌شوند). قبل از آپلود، در فتوشاپ یا ابزار مشابه کراپ کنید.
                </p>
            </section>

            <section id="hero" class="scroll-mt-24 rounded-2xl border border-line bg-white p-5 sm:p-6">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <h2 class="text-lg font-extrabold text-ink">صفحه اصلی / Hero</h2>
                    <a href="{{ route('admin.hero') }}" class="text-sm font-semibold text-brand hover:text-brand-deep">رفتن به ویرایش ←</a>
                </div>
                <p class="mt-2 text-sm leading-7 text-ink-soft">اولین چیزی که بازدیدکننده در صفحه اصلی می‌بیند. مسیر عمومی: <span class="font-latin text-ink">/</span></p>
                <div class="mt-4 overflow-x-auto">
                    <table class="w-full min-w-[32rem] border-collapse text-sm">
                        <thead>
                            <tr class="border-b border-line text-start text-ink">
                                <th class="py-2 pe-3 font-semibold">فیلد</th>
                                <th class="py-2 pe-3 font-semibold">نوع</th>
                                <th class="py-2 font-semibold">راهنما</th>
                            </tr>
                        </thead>
                        <tbody class="text-ink-soft">
                            <tr class="border-b border-line/70"><td class="py-2 pe-3">عنوان</td><td class="py-2 pe-3">متن کوتاه</td><td class="py-2">نام برند / شرکت (حداکثر حدود ۲۵۵ کاراکتر)</td></tr>
                            <tr class="border-b border-line/70"><td class="py-2 pe-3">شعار (Tagline)</td><td class="py-2 pe-3">متن کوتاه</td><td class="py-2">یک جمله جذاب زیر عنوان</td></tr>
                            <tr class="border-b border-line/70"><td class="py-2 pe-3">متن معرفی</td><td class="py-2 pe-3">پاراگراف</td><td class="py-2">۲ تا ۴ جمله درباره فعالیت شرکت</td></tr>
                            <tr class="border-b border-line/70"><td class="py-2 pe-3">دکمه اصلی / ثانویه</td><td class="py-2 pe-3">برچسب دکمه</td><td class="py-2">متن کوتاه مثل «محصولات» یا «تماس با ما»</td></tr>
                            <tr class="border-b border-line/70"><td class="py-2 pe-3">آمار ۱ تا ۳</td><td class="py-2 pe-3">مقدار + برچسب</td><td class="py-2">مثال: مقدار «۲۹» و برچسب «نمایندگی رسمی»</td></tr>
                            <tr><td class="py-2 pe-3">تصویر</td><td class="py-2 pe-3">فایل تصویر</td><td class="py-2">نسبت ۴∶۳ — مشترک برای FA و EN</td></tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <section id="about" class="scroll-mt-24 rounded-2xl border border-line bg-white p-5 sm:p-6">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <h2 class="text-lg font-extrabold text-ink">درباره ما</h2>
                    <a href="{{ route('admin.about') }}" class="text-sm font-semibold text-brand hover:text-brand-deep">رفتن به ویرایش ←</a>
                </div>
                <p class="mt-2 text-sm leading-7 text-ink-soft">مسیر عمومی: <span class="font-latin text-ink">/about</span> — همچنین بخشی از صفحه اصلی را تغذیه می‌کند.</p>
                <ul class="mt-4 list-disc space-y-2 pe-5 text-sm leading-7 text-ink-soft">
                    <li><strong class="text-ink">عنوان و پاراگراف‌های ۱–۳:</strong> معرفی شرکت، ثبت قانونی، تاریخچه.</li>
                    <li><strong class="text-ink">پیام رهبری:</strong> عنوان، نام نمایشی، نام مدیرعامل و معاون، متن پیام (می‌تواند چند پاراگراف باشد).</li>
                    <li><strong class="text-ink">چشم‌انداز / مأموریت:</strong> متن آزاد.</li>
                    <li><strong class="text-ink">ارزش‌ها و تعهدات:</strong> هر مورد در یک خط جدا (با Enter). سیستم هر خط را به‌صورت یک آیتم نشان می‌دهد.</li>
                    <li><strong class="text-ink">فلسفه:</strong> عنوان + متن توضیحی.</li>
                    <li><strong class="text-ink">تصویر معرفی:</strong> ۴∶۳ | <strong class="text-ink">تصویر رهبری:</strong> مربع ۱∶۱.</li>
                </ul>
            </section>

            <section id="why" class="scroll-mt-24 rounded-2xl border border-line bg-white p-5 sm:p-6">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <h2 class="text-lg font-extrabold text-ink">چرا عمر حمیدی</h2>
                    <a href="{{ route('admin.why') }}" class="text-sm font-semibold text-brand hover:text-brand-deep">رفتن به ویرایش ←</a>
                </div>
                <p class="mt-2 text-sm leading-7 text-ink-soft">مسیر عمومی: <span class="font-latin text-ink">/why</span></p>
                <ul class="mt-4 list-disc space-y-2 pe-5 text-sm leading-7 text-ink-soft">
                    <li><strong class="text-ink">عنوان صفحه</strong> و <strong class="text-ink">مقدمه</strong> در بالای صفحه نمایش داده می‌شوند.</li>
                    <li><strong class="text-ink">دلایل:</strong> لیست داینامیک — برای هر دلیل یک عنوان و توضیح کوتاه. با دکمه «افزودن دلیل» ردیف جدید بسازید یا حذف کنید.</li>
                    <li><strong class="text-ink">متن پایانی:</strong> دعوت به همکاری همراه با دکمه تماس.</li>
                    <li>این بخش تصویر ندارد؛ تمرکز روی متن و کارت‌های دلیل است.</li>
                </ul>
            </section>

            <section id="products" class="scroll-mt-24 rounded-2xl border border-line bg-white p-5 sm:p-6">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <h2 class="text-lg font-extrabold text-ink">محصولات و خدمات</h2>
                    <a href="{{ route('admin.products') }}" class="text-sm font-semibold text-brand hover:text-brand-deep">رفتن به ویرایش ←</a>
                </div>
                <p class="mt-2 text-sm leading-7 text-ink-soft">مسیر عمومی: <span class="font-latin text-ink">/products</span></p>
                <ul class="mt-4 list-disc space-y-2 pe-5 text-sm leading-7 text-ink-soft">
                    <li><strong class="text-ink">عنوان و توضیح:</strong> معرفی کلی بخش.</li>
                    <li><strong class="text-ink">لیست محصولات:</strong> هر ردیف = عنوان + توضیح + تصویر اختیاری. تعداد نامحدود؛ با «افزودن محصول» گسترش دهید.</li>
                    <li><strong class="text-ink">کیفیت / مزایا / اهداف:</strong> فیلدهای چندخطی — <em>هر خط یک مورد</em>.</li>
                    <li>تصاویر محصول بهتر است افقی (۳∶۲) باشند. اگر تصویر نگذارید، کارت بدون عکس نمایش داده می‌شود.</li>
                    <li>محتوای فارسی و انگلیسی را جداگانه کامل کنید تا در سوییچ زبان سایت خالی نماند.</li>
                </ul>
            </section>

            <section id="network" class="scroll-mt-24 rounded-2xl border border-line bg-white p-5 sm:p-6">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <h2 class="text-lg font-extrabold text-ink">شبکه توزیع</h2>
                    <a href="{{ route('admin.network') }}" class="text-sm font-semibold text-brand hover:text-brand-deep">رفتن به ویرایش ←</a>
                </div>
                <p class="mt-2 text-sm leading-7 text-ink-soft">مسیر عمومی: <span class="font-latin text-ink">/network</span></p>
                <ul class="mt-4 list-disc space-y-2 pe-5 text-sm leading-7 text-ink-soft">
                    <li><strong class="text-ink">عنوان، پاراگراف ۱ و ۲، دفاتر:</strong> متن معرفی شبکه و مکان دفاتر.</li>
                    <li><strong class="text-ink">مزیت‌های رقابتی و بازار هدف:</strong> هر مورد در یک خط جدا.</li>
                    <li><strong class="text-ink">تصویر:</strong> نسبت ۴∶۳، مشترک بین زبان‌ها.</li>
                </ul>
            </section>

            <section id="licenses" class="scroll-mt-24 rounded-2xl border border-line bg-white p-5 sm:p-6">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <h2 class="text-lg font-extrabold text-ink">جوازها</h2>
                    <a href="{{ route('admin.licenses') }}" class="text-sm font-semibold text-brand hover:text-brand-deep">رفتن به ویرایش ←</a>
                </div>
                <p class="mt-2 text-sm leading-7 text-ink-soft">مسیر عمومی: <span class="font-latin text-ink">/licenses</span></p>
                <ul class="mt-4 list-disc space-y-2 pe-5 text-sm leading-7 text-ink-soft">
                    <li>متن معرفی، شماره جواز، TIN، نام مدیرعامل و معاون، و عنوان زیر هر تصویر جواز.</li>
                    <li><strong class="text-ink">تصویر جواز تجارت</strong> و <strong class="text-ink">جواز وزارت صحت</strong>: اسکن واضح به‌صورت <strong class="text-ink">A4 افقی (landscape)</strong>؛ متن سند باید راست و خوانا باشد.</li>
                    <li>این تصاویر در کادر افقی کامل نمایش داده می‌شوند و برش نمی‌خورند.</li>
                </ul>
            </section>

            <section id="partners" class="scroll-mt-24 rounded-2xl border border-line bg-white p-5 sm:p-6">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <h2 class="text-lg font-extrabold text-ink">شرکای استراتژیک</h2>
                    <a href="{{ route('admin.partners') }}" class="text-sm font-semibold text-brand hover:text-brand-deep">رفتن به ویرایش ←</a>
                </div>
                <p class="mt-2 text-sm leading-7 text-ink-soft">در صفحه جوازها نمایش داده می‌شود.</p>
                <ul class="mt-4 list-disc space-y-2 pe-5 text-sm leading-7 text-ink-soft">
                    <li><strong class="text-ink">عنوان و توضیح</strong> بخش شرکا.</li>
                    <li><strong class="text-ink">لیست نام شرکا:</strong> داینامیک؛ فقط نام (بدون تصویر). با افزودن/حذف ردیف مدیریت کنید.</li>
                </ul>
            </section>

            <section id="contact" class="scroll-mt-24 rounded-2xl border border-line bg-white p-5 sm:p-6">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <h2 class="text-lg font-extrabold text-ink">تماس و اطلاعات</h2>
                    <a href="{{ route('admin.contact') }}" class="text-sm font-semibold text-brand hover:text-brand-deep">رفتن به ویرایش ←</a>
                </div>
                <p class="mt-2 text-sm leading-7 text-ink-soft">مسیر عمومی: <span class="font-latin text-ink">/contact</span> — در فوتر هم استفاده می‌شود.</p>
                <ul class="mt-4 list-disc space-y-2 pe-5 text-sm leading-7 text-ink-soft">
                    <li>عنوان، مقدمه، ایمیل، دو شماره تماس، عنوان و آدرس دفتر مرکزی، آدرس تکمیلی، دفاتر منطقه‌ای.</li>
                    <li>شماره‌ها را با فرمت بین‌المللی وارد کنید، مثال: <span class="font-latin text-ink">+93 798 303 024</span></li>
                    <li>ایمیل باید معتبر باشد چون لینک <span class="font-latin">mailto:</span> و فرم همکاری به آن وابسته است.</li>
                    <li>این بخش تصویر ندارد.</li>
                </ul>
            </section>

            <section id="settings" class="scroll-mt-24 rounded-2xl border border-line bg-white p-5 sm:p-6">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <h2 class="text-lg font-extrabold text-ink">تنظیمات سایت</h2>
                    <a href="{{ route('admin.settings') }}" class="text-sm font-semibold text-brand hover:text-brand-deep">رفتن به ویرایش ←</a>
                </div>
                <ul class="mt-4 list-disc space-y-2 pe-5 text-sm leading-7 text-ink-soft">
                    <li><strong class="text-ink">نام فارسی / انگلیسی شرکت:</strong> در نوار بالا، فوتر و عنوان صفحات.</li>
                    <li><strong class="text-ink">شعار سایت، سال تأسیس، متن کپی‌رایت فوتر.</strong></li>
                    <li><strong class="text-ink">توضیح متا (meta description):</strong> برای موتورهای جستجو؛ یک تا دو جمله خلاصه فعالیت شرکت.</li>
                </ul>
            </section>

            <section id="users" class="scroll-mt-24 rounded-2xl border border-line bg-white p-5 sm:p-6">
                <h2 class="text-lg font-extrabold text-ink">مدیریت کاربران</h2>
                <p class="mt-2 text-sm leading-7 text-ink-soft">فقط برای نقش مدیر کاربران (admin) در منو دیده می‌شود.</p>
                <ul class="mt-4 list-disc space-y-2 pe-5 text-sm leading-7 text-ink-soft">
                    <li>می‌توانید کاربر جدید بسازید، ویرایش کنید یا حذف کنید.</li>
                    <li>نقش‌ها: <strong class="text-ink">admin</strong> (مدیریت کاربران + محتوا) و <strong class="text-ink">site_manager</strong> (فقط محتوا).</li>
                    <li>رمز عبور هنگام ذخیره به‌صورت امن هش می‌شود؛ رمز را در جای امن نگه دارید.</li>
                    <li>هرگز حساب آخرین مدیر را حذف نکنید تا دسترسی پنل از دست نرود.</li>
                </ul>
            </section>

            <section id="workflow" class="scroll-mt-24 rounded-2xl border border-line bg-white p-5 sm:p-6">
                <h2 class="text-lg font-extrabold text-ink">روند پیشنهادی ویرایش</h2>
                <ol class="mt-4 list-decimal space-y-2 pe-5 text-sm leading-7 text-ink-soft">
                    <li>از منوی کناری بخش مورد نظر را باز کنید.</li>
                    <li>ابتدا تصاویر مشترک را آپلود کنید (در صورت وجود).</li>
                    <li>تب فارسی را کامل کنید، سپس تب انگلیسی را با محتوای معادل پر کنید.</li>
                    <li>در فیلدهای لیستی، هر مورد را در خط جدا بنویسید.</li>
                    <li>ذخیره کنید و با پیش‌نمایش، ظاهر فارسی و انگلیسی را روی موبایل و دسکتاپ چک کنید.</li>
                    <li>اگر متن خیلی بلند است، آن را کوتاه‌تر کنید تا در کارت‌ها و موبایل نریزد.</li>
                </ol>
                <div class="mt-5 grid gap-3 sm:grid-cols-2">
                    <div class="rounded-xl border border-line bg-mist/50 px-4 py-3 text-sm text-ink-soft">
                        <p class="font-semibold text-ink">چک‌لیست قبل از انتشار</p>
                        <ul class="mt-2 list-disc space-y-1 pe-4">
                            <li>هر دو زبان تکمیل شده</li>
                            <li>تصاویر با نسبت درست</li>
                            <li>شماره‌ها و ایمیل صحیح</li>
                            <li>لینک‌های پیش‌نمایش باز می‌شوند</li>
                        </ul>
                    </div>
                    <div class="rounded-xl border border-line bg-mist/50 px-4 py-3 text-sm text-ink-soft">
                        <p class="font-semibold text-ink">اشتباهات رایج</p>
                        <ul class="mt-2 list-disc space-y-1 pe-4">
                            <li>فقط فارسی ذخیره و انگلیسی خالی</li>
                            <li>عکس خیلی سنگین یا نسبت اشتباه</li>
                            <li>چند مورد در یک خط بدون Enter</li>
                            <li>فراموش کردن دکمه ذخیره</li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
