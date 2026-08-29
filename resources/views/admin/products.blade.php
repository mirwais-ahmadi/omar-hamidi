@extends('layouts.admin')

@section('title', 'محصولات')
@section('heading', 'محصولات و خدمات')

@section('content')
    @include('admin.partials.flash')

    <form method="POST" action="{{ route('admin.products.update') }}" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <x-admin.form-actions :preview="route('products')" />

        <x-admin.locale-tabs>
            <x-slot:fa>
                <x-admin.card title="محصولات (فارسی)" description="برای هر محصول می‌توانید تصویر جداگانه انتخاب کنید">
                    <x-admin.input label="عنوان" name="fa[title]" :value="old('fa.title', $fa['title'] ?? '')" />
                    <x-admin.textarea label="توضیح" name="fa[intro]" rows="3" :value="old('fa.intro', $fa['intro'] ?? '')" />

                    <div data-repeater-list id="product-items-fa" class="space-y-3">
                        @php
                            $itemsFa = $faItems->values();
                            $titles = old('fa.product_title', $itemsFa->pluck('title')->all());
                            $descs = old('fa.product_desc', $itemsFa->pluck('description')->all());
                            $images = old('fa.product_image_current', $itemsFa->pluck('image')->all());
                            if (empty($titles)) { $titles = ['']; $descs = ['']; $images = ['']; }
                        @endphp
                        @foreach ($titles as $i => $title)
                            <div data-repeater-item class="rounded-xl border border-line bg-mist/30 p-4">
                                <div class="grid gap-3 sm:grid-cols-[1fr_2fr_auto]">
                                    <input class="admin-input" name="fa[product_title][]" value="{{ $title }}" placeholder="عنوان">
                                    <input class="admin-input" name="fa[product_desc][]" value="{{ $descs[$i] ?? '' }}" placeholder="توضیح">
                                    <button type="button" data-repeater-remove class="rounded-xl border border-line bg-white px-3 py-2 text-sm text-ink-soft">حذف</button>
                                </div>
                                <div class="mt-3 flex flex-wrap items-center gap-3">
                                    <div class="h-16 w-24 overflow-hidden rounded-lg border border-line bg-white" data-image-preview>
                                        @if (! empty($images[$i] ?? null))
                                            <img src="{{ asset($images[$i]) }}" alt="" class="h-full w-full object-cover">
                                        @else
                                            <div class="flex h-full items-center justify-center text-[10px] text-ink-soft">بدون تصویر</div>
                                        @endif
                                    </div>
                                    <input type="hidden" name="fa[product_image_current][]" value="{{ $images[$i] ?? '' }}" data-image-current>
                                    <label class="min-w-[12rem] flex-1">
                                        <span class="mb-1 block text-xs text-ink-soft">تصویر این محصول</span>
                                        <input type="file" name="fa[product_image][]" accept="image/png,image/jpeg,image/webp,image/gif" class="admin-input w-full" data-image-input>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" data-repeater-add="#product-items-fa" class="mt-3 rounded-xl border border-dashed border-line px-4 py-2 text-sm font-medium text-brand-deep">+ افزودن محصول</button>

                    <x-admin.textarea label="کیفیت" name="fa[quality_items]" rows="6" :value="old('fa.quality_items', $fa['quality_items'] ?? '')" />
                    <x-admin.textarea label="مزایا" name="fa[advantage_items]" rows="6" :value="old('fa.advantage_items', $fa['advantage_items'] ?? '')" />
                    <x-admin.textarea label="اهداف" name="fa[goals]" rows="6" :value="old('fa.goals', $fa['goals'] ?? '')" />
                </x-admin.card>
            </x-slot:fa>
            <x-slot:en>
                <x-admin.card title="Products (English)" description="Each product can have its own image">
                    <x-admin.input label="Title" name="en[title]" :value="old('en.title', $en['title'] ?? '')" />
                    <x-admin.textarea label="Intro" name="en[intro]" rows="3" :value="old('en.intro', $en['intro'] ?? '')" />

                    <div data-repeater-list id="product-items-en" class="space-y-3">
                        @php
                            $itemsEn = $enItems->values();
                            $titlesEn = old('en.product_title', $itemsEn->pluck('title')->all());
                            $descsEn = old('en.product_desc', $itemsEn->pluck('description')->all());
                            $imagesEn = old('en.product_image_current', $itemsEn->pluck('image')->all());
                            if (empty($titlesEn)) { $titlesEn = ['']; $descsEn = ['']; $imagesEn = ['']; }
                        @endphp
                        @foreach ($titlesEn as $i => $title)
                            <div data-repeater-item class="rounded-xl border border-line bg-mist/30 p-4">
                                <div class="grid gap-3 sm:grid-cols-[1fr_2fr_auto]">
                                    <input class="admin-input" name="en[product_title][]" value="{{ $title }}" placeholder="Title">
                                    <input class="admin-input" name="en[product_desc][]" value="{{ $descsEn[$i] ?? '' }}" placeholder="Description">
                                    <button type="button" data-repeater-remove class="rounded-xl border border-line bg-white px-3 py-2 text-sm text-ink-soft">Remove</button>
                                </div>
                                <div class="mt-3 flex flex-wrap items-center gap-3">
                                    <div class="h-16 w-24 overflow-hidden rounded-lg border border-line bg-white" data-image-preview>
                                        @if (! empty($imagesEn[$i] ?? null))
                                            <img src="{{ asset($imagesEn[$i]) }}" alt="" class="h-full w-full object-cover">
                                        @else
                                            <div class="flex h-full items-center justify-center text-[10px] text-ink-soft">No image</div>
                                        @endif
                                    </div>
                                    <input type="hidden" name="en[product_image_current][]" value="{{ $imagesEn[$i] ?? '' }}" data-image-current>
                                    <label class="min-w-[12rem] flex-1">
                                        <span class="mb-1 block text-xs text-ink-soft">Product image</span>
                                        <input type="file" name="en[product_image][]" accept="image/png,image/jpeg,image/webp,image/gif" class="admin-input w-full" data-image-input>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" data-repeater-add="#product-items-en" class="mt-3 rounded-xl border border-dashed border-line px-4 py-2 text-sm font-medium text-brand-deep">+ Add product</button>

                    <x-admin.textarea label="Quality items" name="en[quality_items]" rows="6" :value="old('en.quality_items', $en['quality_items'] ?? '')" />
                    <x-admin.textarea label="Advantages" name="en[advantage_items]" rows="6" :value="old('en.advantage_items', $en['advantage_items'] ?? '')" />
                    <x-admin.textarea label="Goals" name="en[goals]" rows="6" :value="old('en.goals', $en['goals'] ?? '')" />
                </x-admin.card>
            </x-slot:en>
        </x-admin.locale-tabs>
    </form>
@endsection
