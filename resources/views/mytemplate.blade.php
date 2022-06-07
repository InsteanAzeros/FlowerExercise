<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <style>
        .alert-danger {
            color: red;
        }

    </style>
</head>

<body>
    <nav>
        <ul>
            <li>
                <a href="/flowers">Flowers list</a>
            </li>
            <li>
                <a href="/flowers/create">Create new flower</a>
            </li>

            @if (session()->has('email'))
                <li>
                    <a href="/logout">Logout</a>
                </li>
            @else
                <li>
                    <a href="/login">Login</a>
                </li>
            @endif



        </ul>
    </nav>

    <main>
        @yield('content')
    </main>

</body>


</html>
