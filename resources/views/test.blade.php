@extends('layout')


@section('content')
@include('partials._hero') 
@include('partials._search')   

<div class="bg-gray-50 border border-gray-200 rounded p-6">

@if (count($Listing)==0)
    <p>sory nothing there</p>


@endif


@foreach($Listing as $l) 

<div class="flex">
    <img
        class="hidden w-48 mr-6 md:block"
        src="images/logo_transparent.png"
        alt=""
    />
    <div>
        <h3 class="text-2xl">
            <a href="/listings/{{$l->id}}">{{$l->title}}</a>
        </h3>
        <div class="text-xl font-bold mb-4">{{$l->company}}</div>
        <ul class="flex">
            <li
                class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
            >
                <a href="#">Laravel</a>
            </li>
            <li
                class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
            >
                <a href="#">API</a>
            </li>
            <li
                class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
            >
                <a href="#">Backend</a>
            </li>
            <li
                class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
            >
                <a href="#">Vue</a>
            </li>
        </ul>
        <div class="text-lg mt-4">
            <i class="fa-solid fa-location-dot"></i>  {{$l->location}}
        </div>
    </div>
</div>


@endforeach
</div>

@endsection 