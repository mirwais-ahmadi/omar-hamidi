@extends('layouts.app')

@section('title', ($settings['company_fa'] ?? 'شرکت تجارتی عمر حمیدی لمیتد').' | '.($settings['company_en'] ?? 'Omar Hamidi Trading Ltd'))

@section('content')
    @include('sections.hero')
    @include('sections.home-about')
    @include('sections.home-products')
    @include('sections.home-quality')
    @include('sections.home-network')
    @include('sections.home-partners')
    @include('sections.home-cta')
@endsection
