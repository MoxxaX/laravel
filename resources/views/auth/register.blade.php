<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Register</title>

    <link rel="stylesheet" href="{{ url('css/adminlte.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="register-page bg-body-secondary">

<div class="register-box">

    <div class="register-logo">
        <b>Adminlte</b>
    </div>

    <div class="card card-outline card-primary">

        <div class="card-body">

            <p class="register-box-msg">
                Register a new membership
            </p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Full name" required>
                    <div class="input-group-text"><i class="bi bi-person"></i></div>
                </div>

                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                    <div class="input-group-text"><i class="bi bi-envelope"></i></div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <div class="input-group-text"><i class="bi bi-lock"></i></div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                    <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                </div>

                <div class="d-grid">
                    <button class="btn btn-primary">
                        Register
                    </button>
                </div>

            </form>

            <p class="text-center mt-3">
                <a href="{{ route('login') }}">I already have a account</a>
            </p>

        </div>

    </div>

</div>

<script src="{{ url('js/adminlte.js') }}"></script>

</body>
</html>