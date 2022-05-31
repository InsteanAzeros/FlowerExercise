@extends('mytemplate')

@section('title', 'Insert new flower')

@section('content')
    <form action="" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name" value="{{ $flower->name }}"><br>
        <input type="text" name="price" placeholder="Price" value="{{ $flower->price }}"><br>
        <input type="submit" value="Update">
    </form>
@endsection
