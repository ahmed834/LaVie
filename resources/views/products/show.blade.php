@extends('layout')
@section('Title')
Show
@endsection

@section('Content')


<h1>Product {{$product ->name }} </h1>

<img src="{{ asset( str_replace( 'public/','storage/',$product->image) ) }}" class="rounded mx-auto d-block" width="400">

<h3> {{$product ->name }} </h3>
<h3> {{$product ->email }} </h3>
<p>Created at: {{ $product->created_at->format('d : m : y , h : m :s')}}  </p>


<a href="{{ url("products/$product->id /edit") }}" >Edit</a>

<form action="{{ url("products/$product->id") }}" method="POST">
@csrf
@method('delete')

<input type="submit" value="Delete" >

</form>





    
@endsection

