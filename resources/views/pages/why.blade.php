@extends('layouts.app')

@section('title', __('Why Omar Hamidi').' | '.($settings['company_fa'] ?? __('Omar Hamidi Trading Ltd')))

@section('content')
    @include('partials.page-hero', [
        'title' => $why['title'] ?? __('Why Omar Hamidi'),
        'subtitle' => $why['intro'] ?? __('Why page subtitle'),
    ])
    @include('sections.why')
@endsection
