@extends('mytemplate')

@section('title', 'Login')

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

    <h2>Login</h2>

    <form method="POST">
        @csrf
        <input type="text" name="email" placeholder="Email"><br>
        <input type="text" name="password" placeholder="Password"><br>
        <input type="submit" value="Login">
    </form>
@endsection
