@extends('mytemplate')

@section('title', 'Flowers List')

@section('content')
    @if (session('message'))
        <div class="alert alert-success" style="color: green">
            {{ session('message') }}
        </div>
    @endif

    @foreach ($flo as $flower)
        <strong>Name : </strong> {{ $flower->name }}<br>
        <strong>Price : </strong> {{ $flower->price }}<br>
        <hr>
    @endforeach
@endsection
