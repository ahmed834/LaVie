@extends('layout')
@section('Title')
products
@endsection

@section('Content')
<div class="container my-5">
<h1 class="text-center">All products </h1>

<h2 class="text-center my-3 "> <a href="{{ url("products/create") }}" >Create New Product</a> </h2>

@foreach($products as $product )
<h3> 
    <a href=" {{ url("/products/$product->id") }}" > 

    {{$product ->name }}

    </a>
  

</h3>
<h3> {{$product ->description }} </h3>
<hr>

@endforeach

{{$products->links()}}
</div>
@endsection

