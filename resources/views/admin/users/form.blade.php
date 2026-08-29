@extends('layouts.admin')

@section('title', $mode === 'create' ? 'کاربر جدید' : 'ویرایش کاربر')
@section('heading', $mode === 'create' ? 'کاربر جدید' : 'ویرایش کاربر')

@section('content')
    @include('admin.partials.flash')

    @if ($errors->any())
        <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            <p class="font-semibold">لطفاً این موارد را اصلاح کنید:</p>
            <ul class="mt-2 list-disc space-y-1 ps-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        method="POST"
        action="{{ $mode === 'create' ? route('admin.users.store') : route('admin.users.update', $user) }}"
        class="space-y-5"
        novalidate
    >
        @csrf
        @if ($mode === 'edit')
            @method('PUT')
        @endif

        <div class="flex flex-wrap items-center justify-between gap-3 rounded-2xl border border-dashed border-line bg-mist/50 px-4 py-3">
            <p class="text-sm text-ink-soft">
                @if ($mode === 'create')
                    کاربر جدید را با نقش مناسب بسازید. رمز حداقل ۸ کاراکتر باشد.
                @else
                    در صورت خالی گذاشتن رمز، رمز فعلی بدون تغییر می‌ماند.
                @endif
            </p>
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('admin.users.index') }}" class="rounded-xl border border-line bg-white px-4 py-2 text-sm font-medium text-ink-soft hover:text-brand-deep">
                    انصراف
                </a>
                <button type="submit" class="rounded-xl bg-brand px-4 py-2 text-sm font-semibold text-white transition hover:bg-brand-deep">
                    {{ $mode === 'create' ? 'ایجاد کاربر' : 'ذخیره تغییرات' }}
                </button>
            </div>
        </div>

        <x-admin.card title="اطلاعات حساب" description="رمز عبور به‌صورت هش‌شده در پایگاه داده ذخیره می‌شود">
            <div class="grid gap-4 sm:grid-cols-2">
                <x-admin.input label="نام" name="name" :value="old('name', $user->name)" required />
                <x-admin.input label="ایمیل" name="email" type="email" :value="old('email', $user->email)" dir="ltr" required />
            </div>

            <div class="mt-4">
                <label class="mb-1.5 block text-sm font-medium text-ink" for="role">نقش کاربر</label>
                <select
                    id="role"
                    name="role"
                    class="w-full rounded-xl border border-line bg-white px-4 py-3 text-sm outline-none focus:border-brand"
                    required
                >
                    <option value="site_manager" @selected(old('role', $user->role ?: 'site_manager') === 'site_manager')>مدیر سایت — فقط تنظیمات و محتوای سایت</option>
                    <option value="admin" @selected(old('role', $user->role) === 'admin')>مدیر کاربران — مدیریت کاربران و سایت</option>
                </select>
                @error('role')
                    <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4 grid gap-4 sm:grid-cols-2">
                <x-admin.input
                    :label="$mode === 'create' ? 'رمز عبور' : 'رمز عبور جدید (اختیاری)'"
                    name="password"
                    type="password"
                    dir="ltr"
                    autocomplete="new-password"
                    hint="حداقل ۸ کاراکتر"
                    :required="$mode === 'create'"
                />
                <x-admin.input
                    label="تکرار رمز عبور"
                    name="password_confirmation"
                    type="password"
                    dir="ltr"
                    autocomplete="new-password"
                    :required="$mode === 'create'"
                />
            </div>
        </x-admin.card>
    </form>
@endsection
