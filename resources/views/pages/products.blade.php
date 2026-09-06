@extends('layouts.app')

@section('title', __('Products & Services').' | '.($settings['company_fa'] ?? __('Omar Hamidi Trading Ltd')))

@section('content')
    @include('partials.page-hero', [
        'title' => __('Products & Services'),
        'subtitle' => __('Products page subtitle'),
    ])
    @include('sections.products-grid')
    @include('sections.quality')
    @include('sections.goals')
@endsection
