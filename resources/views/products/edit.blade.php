@extends('layout')
@section('Title')
Edit
@endsection

@section('Content')

<h1>Edit Product </h1>
@if($errors-> any() )
    @foreach( $errors -> all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif


<form action=" {{ url("/products/$product->id") }}" method="POST"  enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $product -> name }}">
    <br>
    <br>
    <input type="text" name="description" value="{{ $product -> description }}" >
    <br>
    <br>
    <input type="file" name="image" id="">
    <br>
    <br>
    <input type="submit" value="EDIT" >





</form>



@endsection

