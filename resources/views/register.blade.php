@extends('mytemplate')

@section('title', 'Register')

@section('content')
    <h2>Register</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="username" placeholder="Username"><br>
        <input type="file" name="poster"><br>
        <input type="text" name="email" placeholder="Email"><br>
        <input type="text" name="password" placeholder="Password"><br>
        <input type="submit" value="Register">
    </form>
@endsection
