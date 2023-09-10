@extends('layout')


@section('content')
    

<b><h1>{{$heroes}}</h1></b>

@if (count($Listing)==0)
    <p>sory nothing there</p>


@endif


@foreach($Listing as $l) 

<a href="/listings/{{$l['id']}}"><h2>{{$l['title']}}</h2></a>
<p>{{$l['description']}}</p>





@endforeach


@endsection 