@extends('layouts.app')

@section('title', __('Distribution Network').' | '.($settings['company_fa'] ?? __('Omar Hamidi Trading Ltd')))

@section('content')
    @include('partials.page-hero', [
        'title' => __('Distribution Network'),
        'subtitle' => __('Network page subtitle'),
    ])
    @include('sections.network')
    @include('sections.competitive')
@endsection
