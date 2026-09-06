@extends('layouts.app')

@section('title', __('Licenses & Partners').' | '.($settings['company_fa'] ?? __('Omar Hamidi Trading Ltd')))

@section('content')
    @include('partials.page-hero', [
        'title' => __('Licenses & partnerships'),
        'subtitle' => __('Licenses page subtitle'),
    ])
    @include('sections.licenses')
    @include('sections.partners')
@endsection
