@extends('layouts.admin')

@section('title', 'درباره ما')
@section('heading', 'درباره ما')

@section('content')
    @include('admin.partials.flash')

    <form method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <x-admin.form-actions :preview="route('about')" />

        <x-admin.card title="تصاویر بخش درباره ما" description="تصاویر برای هر دو زبان مشترک هستند">
            <div class="space-y-4">
                <x-admin.image-field label="تصویر معرفی شرکت" name="image" :current="$fa['image'] ?? ($en['image'] ?? null)" />
                <x-admin.image-field label="تصویر مدیرعامل (پیام رهبری)" name="leadership_image" :current="$fa['leadership_image'] ?? ($en['leadership_image'] ?? null)" />
                <x-admin.image-field label="تصویر معاون (پیام رهبری)" name="vice_image" :current="$fa['vice_image'] ?? ($en['vice_image'] ?? null)" />
            </div>
        </x-admin.card>

        <x-admin.locale-tabs>
            <x-slot:fa>
                <x-admin.card title="معرفی شرکت (فارسی)">
                    <x-admin.input label="عنوان" name="fa[title]" :value="old('fa.title', $fa['title'] ?? '')" />
                    <x-admin.textarea label="پاراگراف ۱" name="fa[p1]" rows="3" :value="old('fa.p1', $fa['p1'] ?? '')" />
                    <x-admin.textarea label="پاراگراف ۲" name="fa[p2]" rows="3" :value="old('fa.p2', $fa['p2'] ?? '')" />
                    <x-admin.textarea label="پاراگراف ۳" name="fa[p3]" rows="3" :value="old('fa.p3', $fa['p3'] ?? '')" />
                </x-admin.card>
                <x-admin.card title="پیام رهبری (فارسی)">
                    <x-admin.input label="عنوان" name="fa[leadership_title]" :value="old('fa.leadership_title', $fa['leadership_title'] ?? '')" />
                    <x-admin.input label="نام نمایشی" name="fa[leadership_name]" :value="old('fa.leadership_name', $fa['leadership_name'] ?? '')" />
                    <x-admin.input label="مدیرعامل" name="fa[ceo_name]" :value="old('fa.ceo_name', $fa['ceo_name'] ?? '')" />
                    <x-admin.input label="معاون" name="fa[vice_name]" :value="old('fa.vice_name', $fa['vice_name'] ?? '')" />
                    <x-admin.textarea label="متن پیام" name="fa[leadership_message]" rows="7" :value="old('fa.leadership_message', $fa['leadership_message'] ?? '')" />
                </x-admin.card>
                <x-admin.card title="چشم‌انداز و فلسفه (فارسی)">
                    <x-admin.textarea label="چشم‌انداز" name="fa[vision]" rows="3" :value="old('fa.vision', $fa['vision'] ?? '')" />
                    <x-admin.textarea label="مأموریت" name="fa[mission]" rows="3" :value="old('fa.mission', $fa['mission'] ?? '')" />
                    <x-admin.textarea label="ارزش‌ها (هر خط یک مورد)" name="fa[values]" rows="5" :value="old('fa.values', $fa['values'] ?? '')" />
                    <x-admin.input label="عنوان فلسفه" name="fa[philosophy_title]" :value="old('fa.philosophy_title', $fa['philosophy_title'] ?? '')" />
                    <x-admin.textarea label="متن فلسفه" name="fa[philosophy_text]" rows="4" :value="old('fa.philosophy_text', $fa['philosophy_text'] ?? '')" />
                    <x-admin.textarea label="تعهدات (هر خط یک مورد)" name="fa[commitments]" rows="4" :value="old('fa.commitments', $fa['commitments'] ?? '')" />
                </x-admin.card>
            </x-slot:fa>
            <x-slot:en>
                <x-admin.card title="About (English)">
                    <x-admin.input label="Title" name="en[title]" :value="old('en.title', $en['title'] ?? '')" />
                    <x-admin.textarea label="Paragraph 1" name="en[p1]" rows="3" :value="old('en.p1', $en['p1'] ?? '')" />
                    <x-admin.textarea label="Paragraph 2" name="en[p2]" rows="3" :value="old('en.p2', $en['p2'] ?? '')" />
                    <x-admin.textarea label="Paragraph 3" name="en[p3]" rows="3" :value="old('en.p3', $en['p3'] ?? '')" />
                </x-admin.card>
                <x-admin.card title="Leadership (English)">
                    <x-admin.input label="Title" name="en[leadership_title]" :value="old('en.leadership_title', $en['leadership_title'] ?? '')" />
                    <x-admin.input label="Display name" name="en[leadership_name]" :value="old('en.leadership_name', $en['leadership_name'] ?? '')" />
                    <x-admin.input label="CEO" name="en[ceo_name]" :value="old('en.ceo_name', $en['ceo_name'] ?? '')" />
                    <x-admin.input label="Vice CEO" name="en[vice_name]" :value="old('en.vice_name', $en['vice_name'] ?? '')" />
                    <x-admin.textarea label="Message" name="en[leadership_message]" rows="7" :value="old('en.leadership_message', $en['leadership_message'] ?? '')" />
                </x-admin.card>
                <x-admin.card title="Vision & Philosophy (English)">
                    <x-admin.textarea label="Vision" name="en[vision]" rows="3" :value="old('en.vision', $en['vision'] ?? '')" />
                    <x-admin.textarea label="Mission" name="en[mission]" rows="3" :value="old('en.mission', $en['mission'] ?? '')" />
                    <x-admin.textarea label="Values (one per line)" name="en[values]" rows="5" :value="old('en.values', $en['values'] ?? '')" />
                    <x-admin.input label="Philosophy title" name="en[philosophy_title]" :value="old('en.philosophy_title', $en['philosophy_title'] ?? '')" />
                    <x-admin.textarea label="Philosophy text" name="en[philosophy_text]" rows="4" :value="old('en.philosophy_text', $en['philosophy_text'] ?? '')" />
                    <x-admin.textarea label="Commitments (one per line)" name="en[commitments]" rows="4" :value="old('en.commitments', $en['commitments'] ?? '')" />
                </x-admin.card>
            </x-slot:en>
        </x-admin.locale-tabs>
    </form>
@endsection
