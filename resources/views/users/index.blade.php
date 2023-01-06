@extends('layout')
@section('Title')
products
@endsection

@section('Content')
<div class="container my-5">
<h1 class="text-center">All users </h1>



@foreach($users as $user )

    <h3 class="text-primary">{{$user ->name }}</h3>
  
    <h3>Name : {{$user ->email }} </h3>
    <h3>Qualification : {{$user ->qualification }} </h3>
    <h3>Phone: {{$user ->phone }} </h3>
    <h3>Adress : {{$user ->adress }} </h3>

    <form action="{{ url("users/$user->id") }}" method="POST">
        @csrf
        @method('delete')
        
        <input type="submit" value="Delete" >
        
        </form>
        

<hr>

@endforeach

{{$users->links()}}
</div>
@endsection

