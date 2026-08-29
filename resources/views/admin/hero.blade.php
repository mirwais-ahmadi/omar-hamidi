@extends('layouts.admin')

@section('title', 'صفحه اصلی')
@section('heading', 'صفحه اصلی / Hero')

@section('content')
    @include('admin.partials.flash')

    <form method="POST" action="{{ route('admin.hero.update') }}" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <x-admin.form-actions :preview="route('home')" />

        <x-admin.card title="تصویر Hero" description="این تصویر در بخش اصلی صفحه خانه نمایش داده می‌شود">
            <x-admin.image-field label="تصویر اصلی" name="image" :current="$fa['image'] ?? ($en['image'] ?? null)" />
        </x-admin.card>

        <x-admin.locale-tabs>
            <x-slot:fa>
                <x-admin.card title="متن Hero (فارسی)">
                    <x-admin.input label="عنوان اصلی" name="fa[title]" :value="old('fa.title', $fa['title'] ?? '')" />
                    <x-admin.input label="شعار" name="fa[tagline]" :value="old('fa.tagline', $fa['tagline'] ?? '')" />
                    <x-admin.textarea label="توضیح کوتاه" name="fa[text]" rows="4" :value="old('fa.text', $fa['text'] ?? '')" />
                    <x-admin.input label="متن دکمه اول" name="fa[cta_primary]" :value="old('fa.cta_primary', $fa['cta_primary'] ?? '')" />
                    <x-admin.input label="متن دکمه دوم" name="fa[cta_secondary]" :value="old('fa.cta_secondary', $fa['cta_secondary'] ?? '')" />
                    <div class="grid gap-4 sm:grid-cols-2">
                        <x-admin.input label="آمار ۱" name="fa[stat_1_value]" :value="old('fa.stat_1_value', $fa['stat_1_value'] ?? '')" />
                        <x-admin.input label="برچسب ۱" name="fa[stat_1_label]" :value="old('fa.stat_1_label', $fa['stat_1_label'] ?? '')" />
                        <x-admin.input label="آمار ۲" name="fa[stat_2_value]" :value="old('fa.stat_2_value', $fa['stat_2_value'] ?? '')" />
                        <x-admin.input label="برچسب ۲" name="fa[stat_2_label]" :value="old('fa.stat_2_label', $fa['stat_2_label'] ?? '')" />
                        <x-admin.input label="آمار ۳" name="fa[stat_3_value]" :value="old('fa.stat_3_value', $fa['stat_3_value'] ?? '')" />
                        <x-admin.input label="برچسب ۳" name="fa[stat_3_label]" :value="old('fa.stat_3_label', $fa['stat_3_label'] ?? '')" />
                    </div>
                </x-admin.card>
            </x-slot:fa>
            <x-slot:en>
                <x-admin.card title="Hero Content (English)">
                    <x-admin.input label="Main title" name="en[title]" :value="old('en.title', $en['title'] ?? '')" />
                    <x-admin.input label="Tagline" name="en[tagline]" :value="old('en.tagline', $en['tagline'] ?? '')" />
                    <x-admin.textarea label="Short description" name="en[text]" rows="4" :value="old('en.text', $en['text'] ?? '')" />
                    <x-admin.input label="Primary CTA" name="en[cta_primary]" :value="old('en.cta_primary', $en['cta_primary'] ?? '')" />
                    <x-admin.input label="Secondary CTA" name="en[cta_secondary]" :value="old('en.cta_secondary', $en['cta_secondary'] ?? '')" />
                    <div class="grid gap-4 sm:grid-cols-2">
                        <x-admin.input label="Stat 1 value" name="en[stat_1_value]" :value="old('en.stat_1_value', $en['stat_1_value'] ?? '')" />
                        <x-admin.input label="Stat 1 label" name="en[stat_1_label]" :value="old('en.stat_1_label', $en['stat_1_label'] ?? '')" />
                        <x-admin.input label="Stat 2 value" name="en[stat_2_value]" :value="old('en.stat_2_value', $en['stat_2_value'] ?? '')" />
                        <x-admin.input label="Stat 2 label" name="en[stat_2_label]" :value="old('en.stat_2_label', $en['stat_2_label'] ?? '')" />
                        <x-admin.input label="Stat 3 value" name="en[stat_3_value]" :value="old('en.stat_3_value', $en['stat_3_value'] ?? '')" />
                        <x-admin.input label="Stat 3 label" name="en[stat_3_label]" :value="old('en.stat_3_label', $en['stat_3_label'] ?? '')" />
                    </div>
                </x-admin.card>
            </x-slot:en>
        </x-admin.locale-tabs>
    </form>
@endsection
