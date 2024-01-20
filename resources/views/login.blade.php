<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Sign In</title>
    <link rel="stylesheet" href="{{ asset('css/sign_in.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
</head>
<body>
    <div class="container">
        <form action="{{ route('login_post') }}" method="POST" class="login-form-container">
            @csrf
            <div class="login-box">
                <img id="logo" src="images/logo.png" alt="Login Image">
                <p id="heading-text">Welcome Back!</p>
                <p id="sub-heading-text">Sign in to access your account</p>
                @if(Session::has('error'))
                    <div class="error-text" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <input name="id_number" id="id_number" type="text" placeholder="ID Number" class="login-text-box"/>
                <input name="password" id="password" type="password" placeholder="Password" class="login-text-box" />
                <button type="submit" id="signin-btn">Sign In</button>
                <p id="below-login-text"></a> Don't have an account yet? <a id="signup-nav" href="{{ route('register') }}">Create an account here.</a></p>
            </div>
        </form>
        <div class="login-image-container">
            <img id="login-image" src="{{ asset('images/login-image.svg') }}" alt="Login Image">
        </div>
    </div>
</body>
</html>
