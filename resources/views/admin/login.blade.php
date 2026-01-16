<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="icon" href="{{ asset('assets/images/aria-kcs_logo.jpg') }}">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />

    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}" />
</head>

<body>
    <div class="container">
        <div class="login-info">
            <h1>Login</h1>
            <p>Please insert your credentials</p>
            <a href="{{ route('home') }}"><i class="fa-solid fa-arrow-left"></i> Home</a>
        </div>
        <form action="{{ route('admin.login') }}" method="POST" class="login-form">
            @csrf
            <div class="form-control">
                <label for="user-name">User Name</label>
                <input type="text" name="username" id="user-name" class="input" value="{{ old('username') }}" />
            </div>
            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="input" />
            </div>
            <div class="form-control">
                <input type="submit" value="submit" class="submit-btn" />
            </div>
            @if ($errors->any())
                <div class="form-control" style="color: red; margin-top: 0.5rem;">
                    {{ $errors->first() }}
                </div>
            @endif
        </form>
    </div>
</body>

</html>
