@extends('layouts.admin')

@section('title', 'شرکا')
@section('heading', 'شرکای استراتژیک')

@section('content')
    @include('admin.partials.flash')

    <form method="POST" action="{{ route('admin.partners.update') }}" class="space-y-5">
        @csrf
        <x-admin.form-actions :preview="route('licenses')" />

        <x-admin.locale-tabs>
            <x-slot:fa>
                <x-admin.card title="شرکا (فارسی)">
                    <x-admin.input label="عنوان" name="fa[title]" :value="old('fa.title', $fa['title'] ?? '')" />
                    <x-admin.textarea label="توضیح" name="fa[intro]" rows="3" :value="old('fa.intro', $fa['intro'] ?? '')" />
                    <div data-repeater-list id="partner-items-fa" class="space-y-3">
                        @php $partners = old('fa.partners', $faItems->pluck('title')->all()); if (empty($partners)) $partners = ['']; @endphp
                        @foreach ($partners as $partner)
                            <div data-repeater-item class="flex gap-3">
                                <input class="admin-input flex-1" name="fa[partners][]" value="{{ $partner }}" placeholder="نام شریک">
                                <button type="button" data-repeater-remove class="rounded-xl border border-line bg-white px-3 py-2 text-sm">حذف</button>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" data-repeater-add="#partner-items-fa" class="mt-3 rounded-xl border border-dashed border-line px-4 py-2 text-sm font-medium text-brand-deep">+ افزودن</button>
                </x-admin.card>
            </x-slot:fa>
            <x-slot:en>
                <x-admin.card title="Partners (English)">
                    <x-admin.input label="Title" name="en[title]" :value="old('en.title', $en['title'] ?? '')" />
                    <x-admin.textarea label="Intro" name="en[intro]" rows="3" :value="old('en.intro', $en['intro'] ?? '')" />
                    <div data-repeater-list id="partner-items-en" class="space-y-3">
                        @php $partnersEn = old('en.partners', $enItems->pluck('title')->all()); if (empty($partnersEn)) $partnersEn = ['']; @endphp
                        @foreach ($partnersEn as $partner)
                            <div data-repeater-item class="flex gap-3">
                                <input class="admin-input flex-1" name="en[partners][]" value="{{ $partner }}" placeholder="Partner name">
                                <button type="button" data-repeater-remove class="rounded-xl border border-line bg-white px-3 py-2 text-sm">Remove</button>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" data-repeater-add="#partner-items-en" class="mt-3 rounded-xl border border-dashed border-line px-4 py-2 text-sm font-medium text-brand-deep">+ Add</button>
                </x-admin.card>
            </x-slot:en>
        </x-admin.locale-tabs>
    </form>
@endsection
