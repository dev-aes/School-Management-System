<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script defer src="{{ asset('js/app.js') }}"></script>
    <title>Page not found</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="img mt-5">
                <img class="img-fluid" src="{{ asset('images/error/r3.gif') }}" alt="Error 404">
            </div>
        </div>
        <div class="text-center">
            <h2 class="text-uppercase text-muted font-weight-bold">We Couldn't find this page</h2>
            <a href="{{url()->previous()}}">Back to Homepage</a>
        </div>
    </div>
</body>
</html>