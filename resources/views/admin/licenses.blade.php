@extends('layouts.admin')

@section('title', 'جوازها')
@section('heading', 'جوازها')

@section('content')
    @include('admin.partials.flash')

    <form method="POST" action="{{ route('admin.licenses.update') }}" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <x-admin.form-actions :preview="route('licenses')" />

        <x-admin.card title="تصاویر جوازها" description="تصاویر برای هر دو زبان مشترک هستند">
            <div class="space-y-4">
                <x-admin.image-field label="تصویر جواز تجارت" name="commerce_image" :current="$fa['commerce_image'] ?? ($en['commerce_image'] ?? null)" />
                <x-admin.image-field label="تصویر جواز صحت" name="moph_image" :current="$fa['moph_image'] ?? ($en['moph_image'] ?? null)" />
            </div>
        </x-admin.card>

        <x-admin.locale-tabs>
            <x-slot:fa>
                <x-admin.card title="جوازها (فارسی)">
                    <x-admin.textarea label="توضیح" name="fa[intro]" rows="3" :value="old('fa.intro', $fa['intro'] ?? '')" />
                    <div class="grid gap-4 sm:grid-cols-2">
                        <x-admin.input label="شماره جواز" name="fa[license_no]" :value="old('fa.license_no', $fa['license_no'] ?? '')" />
                        <x-admin.input label="TIN" name="fa[tin]" :value="old('fa.tin', $fa['tin'] ?? '')" dir="ltr" />
                        <x-admin.input label="مدیرعامل" name="fa[ceo_name]" :value="old('fa.ceo_name', $fa['ceo_name'] ?? '')" />
                        <x-admin.input label="معاون" name="fa[vice_name]" :value="old('fa.vice_name', $fa['vice_name'] ?? '')" />
                    </div>
                    <x-admin.input label="عنوان جواز تجارت" name="fa[commerce_caption]" :value="old('fa.commerce_caption', $fa['commerce_caption'] ?? '')" />
                    <x-admin.input label="عنوان جواز صحت" name="fa[moph_caption]" :value="old('fa.moph_caption', $fa['moph_caption'] ?? '')" />
                </x-admin.card>
            </x-slot:fa>
            <x-slot:en>
                <x-admin.card title="Licenses (English)">
                    <x-admin.textarea label="Intro" name="en[intro]" rows="3" :value="old('en.intro', $en['intro'] ?? '')" />
                    <div class="grid gap-4 sm:grid-cols-2">
                        <x-admin.input label="License no." name="en[license_no]" :value="old('en.license_no', $en['license_no'] ?? '')" />
                        <x-admin.input label="TIN" name="en[tin]" :value="old('en.tin', $en['tin'] ?? '')" />
                        <x-admin.input label="CEO" name="en[ceo_name]" :value="old('en.ceo_name', $en['ceo_name'] ?? '')" />
                        <x-admin.input label="Vice CEO" name="en[vice_name]" :value="old('en.vice_name', $en['vice_name'] ?? '')" />
                    </div>
                    <x-admin.input label="Commerce license caption" name="en[commerce_caption]" :value="old('en.commerce_caption', $en['commerce_caption'] ?? '')" />
                    <x-admin.input label="MoPH license caption" name="en[moph_caption]" :value="old('en.moph_caption', $en['moph_caption'] ?? '')" />
                </x-admin.card>
            </x-slot:en>
        </x-admin.locale-tabs>
    </form>
@endsection
