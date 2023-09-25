<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 45%, rgba(0,212,255,1) 100%);
        }
        .login-form {
            background: #fff;
            margin-top: 35%;
            padding: 30px;
            border-radius: 10%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }
        .login-form:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }
    </style>
    <title>Login</title>
</head>
<body>
<div class="container">
    <div class="row h-100 justify-content-center">
        <div class="col-lg-5 col-12">
            <div class="text-center login-form">
                <h1 class="auth-title">Hai Phong Travel Admin</h1>
                <p class="auth-subtitle mb-5">
                    Please login to continue.
                </p>
                <form action="{{route('loginPost')}}" method="post">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="email" class="form-control form-control-xl" placeholder="Email"
                               name="email" required>
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-xl" placeholder="Password"
                               name="password" required>
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
