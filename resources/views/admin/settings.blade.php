@extends('layouts.admin')

@section('title', 'تنظیمات')
@section('heading', 'تنظیمات سایت')

@section('content')
    @include('admin.partials.flash')

    @if (auth()->user()?->canManageUsers())
        <x-admin.card title="تنظیمات کاربران" description="این بخش فقط برای مدیر کاربران نمایش داده می‌شود">
            <p class="text-sm leading-7 text-ink-soft">
                از اینجا می‌توانید کاربران پنل را ایجاد، ویرایش یا حذف کنید. رمز عبور کاربران همیشه به‌صورت هش‌شده در پایگاه داده ذخیره می‌شود.
            </p>
            <div class="mt-4 flex flex-wrap gap-3">
                <a href="{{ route('admin.users.index') }}" class="rounded-xl bg-brand px-4 py-2.5 text-sm font-semibold text-white hover:bg-brand-deep">
                    مدیریت کاربران
                </a>
                <a href="{{ route('admin.users.create') }}" class="rounded-xl border border-line bg-white px-4 py-2.5 text-sm font-semibold text-ink hover:border-brand hover:text-brand-deep">
                    افزودن کاربر
                </a>
            </div>
        </x-admin.card>
        <div class="h-5"></div>
    @endif

    <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-5">
        @csrf
        <x-admin.form-actions />

        <x-admin.locale-tabs>
            <x-slot:fa>
                <x-admin.card title="تنظیمات فارسی" description="نام، شعار و متادیتای نسخه فارسی سایت">
                    <x-admin.input label="نام شرکت (نمایش فارسی)" name="fa[company_fa]" :value="old('fa.company_fa', $fa['company_fa'] ?? '')" />
                    <x-admin.input label="نام انگلیسی (ثابت)" name="fa[company_en]" :value="old('fa.company_en', $fa['company_en'] ?? '')" dir="ltr" />
                    <x-admin.input label="شعار سایت" name="fa[site_tagline]" :value="old('fa.site_tagline', $fa['site_tagline'] ?? '')" />
                    <x-admin.input label="سال تأسیس" name="fa[founded]" :value="old('fa.founded', $fa['founded'] ?? '')" />
                    <x-admin.textarea label="Meta Description" name="fa[meta_description]" rows="4" :value="old('fa.meta_description', $fa['meta_description'] ?? '')" />
                    <x-admin.input label="متن کپی‌رایت فوتر" name="fa[footer_copy]" :value="old('fa.footer_copy', $fa['footer_copy'] ?? '')" />
                </x-admin.card>
            </x-slot:fa>
            <x-slot:en>
                <x-admin.card title="English Settings" description="Brand name, tagline and metadata for the English site">
                    <x-admin.input label="Company name (Persian display)" name="en[company_fa]" :value="old('en.company_fa', $en['company_fa'] ?? '')" />
                    <x-admin.input label="Company name (English)" name="en[company_en]" :value="old('en.company_en', $en['company_en'] ?? '')" />
                    <x-admin.input label="Site tagline" name="en[site_tagline]" :value="old('en.site_tagline', $en['site_tagline'] ?? '')" />
                    <x-admin.input label="Founded" name="en[founded]" :value="old('en.founded', $en['founded'] ?? '')" />
                    <x-admin.textarea label="Meta Description" name="en[meta_description]" rows="4" :value="old('en.meta_description', $en['meta_description'] ?? '')" />
                    <x-admin.input label="Footer copyright" name="en[footer_copy]" :value="old('en.footer_copy', $en['footer_copy'] ?? '')" />
                </x-admin.card>
            </x-slot:en>
        </x-admin.locale-tabs>
    </form>
@endsection
