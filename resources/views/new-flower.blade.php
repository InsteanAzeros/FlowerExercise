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

    <h2>Create new flower</h2>
    <form action="" method="POST" id="myForm">
        @csrf
        <input type="text" name="name" placeholder="Name"><br>
        <input type="text" name="price" placeholder="Price"><br>
        <input type="submit" value="Insert">
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        /* Wait for the page to be loaded/ready */
        $(function() {
            $('#myForm').submit(function(e) {
                // Stop the default behavior of the form
                e.preventDefault();

                $.ajax({
                        url: "{{ url('/flowers/create') }}",
                        method: 'post',
                        data: $("form").serialize()
                    })
                    .done(function(result) {
                        console.log(result.success);
                        console.log(result.errors);
                    })
                    .fail(function(result) {
                        // Fail means : file not found, 500 errors.
                        // Fail doesnt mean : problem with php, syntax, db...
                        console.log('AJAX FAILED');
                    })

            });
        });
    </script>
@endsection
