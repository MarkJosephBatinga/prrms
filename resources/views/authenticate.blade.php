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
        <div class="text-container">
            <p class="heading-text">You are now registered!</p>
            <p class="sub-heading-text">Temporary Student ID:</p>
            <p class="value-text">{{$student_id}}</p>
            <p class="sub-heading-text">Password:</p>
            <p class="value-text">{{$password}}</p>
        </div>

        <div class="button-container">
            <a type="button" class="form-button" href="{{ route('login')}}">Login Account</a>
        </div>
    </div>
</body>
</html>
