@extends('layout')
@section('Title')
Create
@endsection

@section('Content')

<h1>Create shop </h1>
@if($errors-> any() )
    @foreach( $errors -> all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif

<form action=" {{ url('/Nearbyshops') }}" method="POST" enctype="multipart/form-data" >
    @csrf

    <input type="text" name="name" placeholder="name">
    <br>
    <br>
    <input type="text" name="address" placeholder="address" >
    <br>
    <br>
    <input type="text" name="phone" placeholder="phone" >
    <br>
    <br>
    <input type="file" name="image" id="">
    <br>
    <br>
    <input type="submit" value="ADD" >





</form>






@endsection

