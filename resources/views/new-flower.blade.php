@extends('mytemplate')

@section('title', 'Insert new flower')

@section('content')
    <form action="" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name"><br>
        <input type="text" name="price" placeholder="Price"><br>
        <input type="submit" value="Insert">
    </form>
@endsection
