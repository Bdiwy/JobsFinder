@extends('layout')

@section('content')
@include('partials._hero')
@include('partials._search ')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

    @unless (count($Listings)==0)

    @foreach($Listings as $listing)

    <x-Listing-card :listing="$listing" />

    @endforeach

    @else
    <p>nothing to see</p>
    @endunless
</div>
@endsection
