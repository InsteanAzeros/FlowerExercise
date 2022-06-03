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
        @method('PUT')
        <input type="text" name="name" placeholder="Name" value="{{ $flower->name }}"><br>
        <input type="text" name="price" placeholder="Price" value="{{ $flower->getAttributes()['price'] }}"><br>
        <input type="submit" value="Update">
    </form>
@endsection
