@extends('mytemplate')

@section('title', 'Insert new flower')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name"><br>
        <input type="text" name="price" placeholder="Price"><br>
        <input type="submit" value="Insert">
    </form>
@endsection
