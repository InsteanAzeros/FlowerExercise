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

    <hr>

    <strong>Comments :</strong>

    @foreach ($flower->comments as $comment)
        <br>{{ $comment->comment }}
    @endforeach
@endsection
