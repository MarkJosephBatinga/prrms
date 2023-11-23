<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Successfuly Registered</title>
    <link rel="stylesheet" href="{{ asset('css/registered.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <img id="success-image" src="{{ asset('images/registered.svg') }}" />
        <h2></h2>

        <div class="text-container">
            <p class="sub-heading-text">Temporary Student ID:</p>
            <p>{{$student_id}}</p>
            <p class="sub-heading-text">Password</p>
            <p>{{$password}}</p>
        </div>

        <div class="button-container">
            <a type="button" class="form-button" href="{{ route('login')}}">Go to Login</a>
        </div>
    </div>
</body>
</html>
