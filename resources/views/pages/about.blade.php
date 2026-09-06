@extends('layouts.app')

@section('title', __('About').' | '.($settings['company_fa'] ?? __('Omar Hamidi Trading Ltd')))

@section('content')
    @include('partials.page-hero', [
        'title' => __('About'),
        'subtitle' => __('About page subtitle'),
    ])
    @include('sections.about-intro')
    @include('sections.vision')
    @include('sections.philosophy')
    @include('sections.leadership')
@endsection
