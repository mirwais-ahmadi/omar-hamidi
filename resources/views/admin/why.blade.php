@extends('layouts.admin')

@section('title', 'چرا عمر حمیدی')
@section('heading', 'چرا عمر حمیدی')

@section('content')
    @include('admin.partials.flash')

    <form method="POST" action="{{ route('admin.why.update') }}" class="space-y-5">
        @csrf
        <x-admin.form-actions :preview="route('why')" />

        <x-admin.locale-tabs>
            <x-slot:fa>
                <x-admin.card title="صفحه چرا عمر حمیدی (فارسی)" description="عنوان، مقدمه و دلایل را می‌توانید به‌صورت داینامیک مدیریت کنید">
                    <x-admin.input label="عنوان صفحه" name="fa[title]" :value="old('fa.title', $fa['title'] ?? '')" />
                    <x-admin.textarea label="مقدمه" name="fa[intro]" rows="3" :value="old('fa.intro', $fa['intro'] ?? '')" />
                    <x-admin.textarea label="متن پایانی / دعوت به همکاری" name="fa[closing]" rows="3" :value="old('fa.closing', $fa['closing'] ?? '')" />

                    <p class="mt-4 text-sm font-semibold text-ink">دلایل انتخاب ما</p>
                    <div data-repeater-list id="why-items-fa" class="mt-3 space-y-3">
                        @php
                            $itemsFa = $faItems->values();
                            $titles = old('fa.reason_title', $itemsFa->pluck('title')->all());
                            $descs = old('fa.reason_desc', $itemsFa->pluck('description')->all());
                            if (empty($titles)) { $titles = ['']; $descs = ['']; }
                        @endphp
                        @foreach ($titles as $i => $title)
                            <div data-repeater-item class="rounded-xl border border-line bg-mist/30 p-4">
                                <div class="grid gap-3 sm:grid-cols-[1fr_2fr_auto]">
                                    <input class="admin-input" name="fa[reason_title][]" value="{{ $title }}" placeholder="عنوان دلیل">
                                    <input class="admin-input" name="fa[reason_desc][]" value="{{ $descs[$i] ?? '' }}" placeholder="توضیح کوتاه">
                                    <button type="button" data-repeater-remove class="rounded-xl border border-line bg-white px-3 py-2 text-sm text-ink-soft">حذف</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" data-repeater-add="#why-items-fa" class="mt-3 rounded-xl border border-dashed border-line px-4 py-2 text-sm font-medium text-brand-deep">+ افزودن دلیل</button>
                </x-admin.card>
            </x-slot:fa>
            <x-slot:en>
                <x-admin.card title="Why Omar Hamidi (English)" description="Manage title, intro, and dynamic reasons">
                    <x-admin.input label="Page title" name="en[title]" :value="old('en.title', $en['title'] ?? '')" />
                    <x-admin.textarea label="Intro" name="en[intro]" rows="3" :value="old('en.intro', $en['intro'] ?? '')" />
                    <x-admin.textarea label="Closing / CTA text" name="en[closing]" rows="3" :value="old('en.closing', $en['closing'] ?? '')" />

                    <p class="mt-4 text-sm font-semibold text-ink">Reasons</p>
                    <div data-repeater-list id="why-items-en" class="mt-3 space-y-3">
                        @php
                            $itemsEn = $enItems->values();
                            $titlesEn = old('en.reason_title', $itemsEn->pluck('title')->all());
                            $descsEn = old('en.reason_desc', $itemsEn->pluck('description')->all());
                            if (empty($titlesEn)) { $titlesEn = ['']; $descsEn = ['']; }
                        @endphp
                        @foreach ($titlesEn as $i => $title)
                            <div data-repeater-item class="rounded-xl border border-line bg-mist/30 p-4">
                                <div class="grid gap-3 sm:grid-cols-[1fr_2fr_auto]">
                                    <input class="admin-input" name="en[reason_title][]" value="{{ $title }}" placeholder="Reason title">
                                    <input class="admin-input" name="en[reason_desc][]" value="{{ $descsEn[$i] ?? '' }}" placeholder="Short description">
                                    <button type="button" data-repeater-remove class="rounded-xl border border-line bg-white px-3 py-2 text-sm text-ink-soft">Remove</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" data-repeater-add="#why-items-en" class="mt-3 rounded-xl border border-dashed border-line px-4 py-2 text-sm font-medium text-brand-deep">+ Add reason</button>
                </x-admin.card>
            </x-slot:en>
        </x-admin.locale-tabs>
    </form>
@endsection
