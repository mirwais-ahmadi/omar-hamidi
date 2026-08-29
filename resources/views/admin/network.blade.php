@extends('layouts.admin')

@section('title', 'شبکه توزیع')
@section('heading', 'شبکه توزیع')

@section('content')
    @include('admin.partials.flash')

    <form method="POST" action="{{ route('admin.network.update') }}" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <x-admin.form-actions :preview="route('network')" />

        <x-admin.card title="تصویر شبکه توزیع">
            <x-admin.image-field label="تصویر بخش" name="image" :current="$fa['image'] ?? ($en['image'] ?? null)" />
        </x-admin.card>

        <x-admin.locale-tabs>
            <x-slot:fa>
                <x-admin.card title="شبکه توزیع (فارسی)">
                    <x-admin.input label="عنوان" name="fa[title]" :value="old('fa.title', $fa['title'] ?? '')" />
                    <x-admin.textarea label="توضیح ۱" name="fa[p1]" rows="4" :value="old('fa.p1', $fa['p1'] ?? '')" />
                    <x-admin.textarea label="توضیح ۲" name="fa[p2]" rows="3" :value="old('fa.p2', $fa['p2'] ?? '')" />
                    <x-admin.input label="دفاتر" name="fa[offices]" :value="old('fa.offices', $fa['offices'] ?? '')" />
                    <x-admin.textarea label="مزیت‌های رقابتی" name="fa[competitive]" rows="8" :value="old('fa.competitive', $fa['competitive'] ?? '')" />
                    <x-admin.textarea label="بازار هدف" name="fa[markets]" rows="8" :value="old('fa.markets', $fa['markets'] ?? '')" />
                </x-admin.card>
            </x-slot:fa>
            <x-slot:en>
                <x-admin.card title="Network (English)">
                    <x-admin.input label="Title" name="en[title]" :value="old('en.title', $en['title'] ?? '')" />
                    <x-admin.textarea label="Paragraph 1" name="en[p1]" rows="4" :value="old('en.p1', $en['p1'] ?? '')" />
                    <x-admin.textarea label="Paragraph 2" name="en[p2]" rows="3" :value="old('en.p2', $en['p2'] ?? '')" />
                    <x-admin.input label="Offices" name="en[offices]" :value="old('en.offices', $en['offices'] ?? '')" />
                    <x-admin.textarea label="Competitive advantages" name="en[competitive]" rows="8" :value="old('en.competitive', $en['competitive'] ?? '')" />
                    <x-admin.textarea label="Target markets" name="en[markets]" rows="8" :value="old('en.markets', $en['markets'] ?? '')" />
                </x-admin.card>
            </x-slot:en>
        </x-admin.locale-tabs>
    </form>
@endsection
