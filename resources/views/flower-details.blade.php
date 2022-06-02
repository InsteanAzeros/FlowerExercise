@extends('mytemplate')

@section('title', 'Flowers Details')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" style="color: green">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-success" style="color: red">
            {{ session('error') }}
        </div>
    @endif

    <strong>Name : </strong> {{ $flower->name }}<br>
    <strong>Price : </strong> {{ $flower->price }}<br>
    <a href="{{ route('flowers.edit', [$flower->id]) }}">Edit</a>
    <a href="{{ route('flowers.delete', [$flower->id]) }}">Delete</a>
    <hr>
@endsection
