@extends('mytemplate')

@section('title', 'Flowers List')

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

    @foreach ($flo as $flower)
        <strong>Name : </strong> {{ $flower->name }}<br>
        <strong>Price : </strong> {{ $flower->price }}<br>
        <hr>
    @endforeach
@endsection
