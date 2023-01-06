@extends('layout')
@section('Title')
Edit
@endsection

@section('Content')

<h1>Edit Nearby shops </h1>
@if($errors-> any() )
    @foreach( $errors -> all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif


<form action=" {{ url("/Nearbyshops/$Nearbyshop->id") }}" method="POST"  enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $Nearbyshop -> name }}">
    <br>
    <br>
    <input type="text" name="address" value="{{ $Nearbyshop -> address }}" >
    <br>
    <br>
    <input type="text" name="phone" value="{{ $Nearbyshop -> phone }}" >
    <br>
    <br>
    <input type="file" name="image" id="">
    <br>
    <br>
    <input type="submit" value="EDIT" >





</form>



@endsection

