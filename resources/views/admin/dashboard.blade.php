@extends('layouts.admin')

@section('title', 'داشبورد')
@section('heading', 'داشبورد')

@section('page_header')
    <div class="flex flex-wrap items-end justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-ink">خوش آمدید</h1>
            <p class="mt-1 text-sm text-ink-soft">مدیریت محتوای وبسایت شرکت تجارتی عمر حمیدی لمیتد</p>
        </div>
        <a href="{{ route('home') }}" target="_blank" class="rounded-xl bg-brand px-4 py-2.5 text-sm font-semibold text-white hover:bg-brand-deep">
            مشاهده سایت
        </a>
    </div>
@endsection

@section('content')
    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
            <div class="rounded-2xl border border-line bg-white p-5">
                <p class="text-sm text-ink-soft">صفحات سایت</p>
                <p class="mt-2 text-2xl font-extrabold text-ink">۷</p>
                <p class="mt-1 text-xs text-ink-soft">خانه تا تماس</p>
            </div>
            <div class="rounded-2xl border border-line bg-white p-5">
                <p class="text-sm text-ink-soft">دسته‌های محصول</p>
                <p class="mt-2 text-2xl font-extrabold text-ink">{{ $productCount }}</p>
                <p class="mt-1 text-xs text-ink-soft">در پایگاه داده</p>
            </div>
            <div class="rounded-2xl border border-line bg-white p-5">
                <p class="text-sm text-ink-soft">شرکای استراتژیک</p>
                <p class="mt-2 text-2xl font-extrabold text-ink">{{ $partnerCount }}</p>
                <p class="mt-1 text-xs text-ink-soft">در پایگاه داده</p>
            </div>
            <div class="rounded-2xl border border-line bg-white p-5">
                <p class="text-sm text-ink-soft">وضعیت بک‌اند</p>
                <p class="mt-2 text-2xl font-extrabold text-ink">فعال</p>
                <p class="mt-1 text-xs text-ink-soft">ذخیره در MySQL</p>
            </div>
    </div>

    <div class="mt-6 grid gap-4 lg:grid-cols-2">
        <x-admin.card title="میانبرهای مدیریت" description="دسترسی سریع به بخش‌های پرکاربرد">
            <div class="grid gap-2 sm:grid-cols-2">
                @foreach ([
                    ['route' => 'admin.hero', 'label' => 'ویرایش Hero'],
                    ['route' => 'admin.about', 'label' => 'درباره ما'],
                    ['route' => 'admin.why', 'label' => 'چرا عمر حمیدی'],
                    ['route' => 'admin.products', 'label' => 'محصولات'],
                    ['route' => 'admin.contact', 'label' => 'اطلاعات تماس'],
                    ...((auth()->user()?->canManageUsers() ?? false) ? [['route' => 'admin.users.index', 'label' => 'مدیریت کاربران']] : []),
                ] as $link)
                    <a href="{{ route($link['route']) }}" class="rounded-xl border border-line bg-mist/50 px-4 py-3 text-sm font-medium text-ink transition hover:border-brand/40 hover:bg-brand-soft/50">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>
        </x-admin.card>

        <x-admin.card title="وضعیت صفحات" description="نمای کلی از بخش‌های قابل مدیریت">
            <ul class="space-y-2 text-sm">
                @foreach ([
                    ['name' => 'صفحه اصلی', 'status' => 'آماده ویرایش'],
                    ['name' => 'درباره ما', 'status' => 'آماده ویرایش'],
                    ['name' => 'چرا عمر حمیدی', 'status' => 'آماده ویرایش'],
                    ['name' => 'محصولات و خدمات', 'status' => 'آماده ویرایش'],
                    ['name' => 'شبکه توزیع', 'status' => 'آماده ویرایش'],
                    ['name' => 'جوازها و شرکا', 'status' => 'آماده ویرایش'],
                    ['name' => 'تماس', 'status' => 'آماده ویرایش'],
                ] as $row)
                    <li class="flex items-center justify-between rounded-xl bg-mist/60 px-3 py-2.5">
                        <span class="font-medium text-ink">{{ $row['name'] }}</span>
                        <span class="text-xs text-brand-deep">{{ $row['status'] }}</span>
                    </li>
                @endforeach
            </ul>
        </x-admin.card>
    </div>
@endsection
