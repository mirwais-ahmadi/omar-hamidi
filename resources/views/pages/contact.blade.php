@extends('layouts.app')

@section('title', __('Contact Us').' | '.($settings['company_fa'] ?? __('Omar Hamidi Trading Ltd')))

@section('content')
    @include('partials.page-hero', [
        'eyebrow' => __('Connect'),
        'title' => __('Contact Us'),
        'subtitle' => __('Contact page subtitle'),
    ])
    @include('sections.contact')
@endsection
