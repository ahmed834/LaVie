@extends('layout')
@section('Title')
Nearby Shops
@endsection

@section('Content')
<div class="container my-5">
<h1 class="text-center">Nearby Shops </h1>

<h2 class="text-center my-3 "> <a href="{{ url("Nearbyshops/create") }}" >Create New Shop</a> </h2>

@foreach($Nearbyshops as $Nearbyshop )
<h3> 
    <a href=" {{ url("/Nearbyshops/$Nearbyshop->id") }}" > 

     Name : {{$Nearbyshop ->name }}

    </a>
  
</h3>
<h3> Address : {{$Nearbyshop ->address }} </h3>
<h3> Phone : {{$Nearbyshop ->phone }} </h3>


<hr>

@endforeach

{{$Nearbyshops->links()}}
</div>
@endsection

