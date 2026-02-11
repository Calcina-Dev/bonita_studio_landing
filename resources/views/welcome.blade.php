@extends('layouts.app')

@section('content')
@include('partials.hero')

@include('partials.services')
@include('partials.products')
@include('partials.about')
@include('partials.testimonials')
@include('partials.videos')
@include('partials.news-section')
@include('partials.map')

<x-shared.modal name="details" :settings="$settings" />

@include('partials.promo-modal')
@include('partials.news-modal')
@endsection