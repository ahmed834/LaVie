@extends('layout')
@section('Title')
Show
@endsection

@section('Content')


<h1>Shop {{$Nearbyshop ->name }} </h1>

<img src="{{ asset( str_replace( 'public/','storage/',$Nearbyshop->image) ) }}" class="rounded mx-auto d-block" width="400">


<h3> Address : {{$Nearbyshop ->address }} </h3>
<h3> Phone {{$Nearbyshop ->phone }} </h3>
<p>Created at: {{ $Nearbyshop->created_at->format('d : m : y , h : m :s')}}  </p>


<a href="{{ url("Nearbyshops/$Nearbyshop->id /edit") }}" >Edit</a>

<form action="{{ url("Nearbyshops/$Nearbyshop->id") }}" method="POST">
@csrf
@method('delete')

<input type="submit" value="Delete" >

</form>





    
@endsection

