@extends('layout')
@section('Title')
products
@endsection

@section('Content')
<div class="container my-5">
<h1 class="text-center">All Orders </h1>



@foreach($orders as $order )

    <h3 class="text-primary">Name : {{$order ->name }}</h3>
    <h3>Email : {{$order ->email }} </h3>
    <h3>The order : {{$order ->the_order }} </h3>
    <h3>Country : {{$order ->country }} </h3>
    <h3>City : {{$order ->city }} </h3>
    <h3>Adress : {{$order ->adress }} </h3>
    <h3>Phone: {{$order ->phone }} </h3>
    <h3>Shipping: {{$order ->shipping }} </h3>
    

    <form action="{{ url("orders/$order->id") }}" method="POST">
        @csrf
        @method('delete')
        
        <input type="submit" value="Delete" >
        
        </form>
        

<hr>

@endforeach

{{$orders->links()}}
</div>
@endsection

