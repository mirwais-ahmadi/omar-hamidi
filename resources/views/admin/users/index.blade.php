@extends('layouts.admin')

@section('title', 'مدیریت کاربران')
@section('heading', 'مدیریت کاربران')

@section('content')
    @include('admin.partials.flash')

    @if ($errors->has('user'))
        <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            {{ $errors->first('user') }}
        </div>
    @endif

    <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
        <div>
            <p class="text-sm text-ink-soft">کاربران بر اساس نقش در دو بخش جداگانه نمایش داده می‌شوند.</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="rounded-xl bg-brand px-4 py-2.5 text-sm font-semibold text-white hover:bg-brand-deep">
            کاربر جدید
        </a>
    </div>

    <div class="grid gap-5 lg:grid-cols-2 lg:items-start">
        <x-admin.card title="مدیران کاربران" :description="'تعداد: '.$admins->count().' — دسترسی کامل به کاربران و سایت'">
            <div class="space-y-3">
                @include('admin.users._group', [
                    'items' => $admins,
                    'empty' => 'هنوز مدیر کاربری ثبت نشده است.',
                ])
            </div>
        </x-admin.card>

        <x-admin.card title="مدیران سایت" :description="'تعداد: '.$siteManagers->count().' — فقط مدیریت محتوای سایت'">
            <div class="space-y-3">
                @include('admin.users._group', [
                    'items' => $siteManagers,
                    'empty' => 'هنوز مدیر سایتی ثبت نشده است.',
                ])
            </div>
        </x-admin.card>
    </div>
@endsection
