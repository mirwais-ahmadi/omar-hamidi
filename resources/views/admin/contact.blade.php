@extends('layouts.admin')

@section('title', 'تماس')
@section('heading', 'تماس و اطلاعات')

@section('content')
    @include('admin.partials.flash')

    <form method="POST" action="{{ route('admin.contact.update') }}" class="space-y-5">
        @csrf
        <x-admin.form-actions :preview="route('contact')" />

        <x-admin.locale-tabs>
            <x-slot:fa>
                <x-admin.card title="تماس (فارسی)">
                    <x-admin.input label="عنوان" name="fa[title]" :value="old('fa.title', $fa['title'] ?? '')" />
                    <x-admin.textarea label="توضیح" name="fa[intro]" rows="3" :value="old('fa.intro', $fa['intro'] ?? '')" />
                    <x-admin.input label="ایمیل" name="fa[email]" :value="old('fa.email', $fa['email'] ?? '')" dir="ltr" />
                    <x-admin.input label="تلفن ۱" name="fa[phone_1]" :value="old('fa.phone_1', $fa['phone_1'] ?? '')" dir="ltr" />
                    <x-admin.input label="تلفن ۲" name="fa[phone_2]" :value="old('fa.phone_2', $fa['phone_2'] ?? '')" dir="ltr" />
                    <x-admin.input label="عنوان دفتر" name="fa[hq_title]" :value="old('fa.hq_title', $fa['hq_title'] ?? '')" />
                    <x-admin.textarea label="آدرس" name="fa[hq_address]" rows="2" :value="old('fa.hq_address', $fa['hq_address'] ?? '')" />
                    <x-admin.input label="آدرس تکمیلی" name="fa[hq_address_extra]" :value="old('fa.hq_address_extra', $fa['hq_address_extra'] ?? '')" />
                    <x-admin.input label="دفاتر منطقه‌ای" name="fa[regional_offices]" :value="old('fa.regional_offices', $fa['regional_offices'] ?? '')" />
                </x-admin.card>
            </x-slot:fa>
            <x-slot:en>
                <x-admin.card title="Contact (English)">
                    <x-admin.input label="Title" name="en[title]" :value="old('en.title', $en['title'] ?? '')" />
                    <x-admin.textarea label="Intro" name="en[intro]" rows="3" :value="old('en.intro', $en['intro'] ?? '')" />
                    <x-admin.input label="Email" name="en[email]" :value="old('en.email', $en['email'] ?? '')" />
                    <x-admin.input label="Phone 1" name="en[phone_1]" :value="old('en.phone_1', $en['phone_1'] ?? '')" />
                    <x-admin.input label="Phone 2" name="en[phone_2]" :value="old('en.phone_2', $en['phone_2'] ?? '')" />
                    <x-admin.input label="HQ title" name="en[hq_title]" :value="old('en.hq_title', $en['hq_title'] ?? '')" />
                    <x-admin.textarea label="Address" name="en[hq_address]" rows="2" :value="old('en.hq_address', $en['hq_address'] ?? '')" />
                    <x-admin.input label="Address extra" name="en[hq_address_extra]" :value="old('en.hq_address_extra', $en['hq_address_extra'] ?? '')" />
                    <x-admin.input label="Regional offices" name="en[regional_offices]" :value="old('en.regional_offices', $en['regional_offices'] ?? '')" />
                </x-admin.card>
            </x-slot:en>
        </x-admin.locale-tabs>
    </form>
@endsection
