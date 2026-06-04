<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login | System</title>

    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ url('css/adminlte.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="login-page bg-body-secondary">

<div class="login-box">

    <!-- Logo -->
    <div class="login-logo">
        <b>Adminlte</b>
    </div>

    <div class="card card-outline card-primary">

        <div class="card-body">

            <p class="login-box-msg">
                Sign in to start your session
            </p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="input-group mb-3">
                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="Email"
                           value="{{ old('email') }}"
                           required>

                    <div class="input-group-text">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>

                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <!-- Password -->
                <div class="input-group mb-3">
                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Password"
                           required>

                    <div class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </div>
                </div>

                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <!-- Remember -->
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label for="remember" class="form-check-label">
                                Remember Me
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Button -->
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary">
                        Sign In
                    </button>
                </div>

            </form>

            <!-- Links -->
            <p class="mb-1 text-center">
                <a href="{{ route('password.request') }}">I forgot my password</a>
            </p>

            <p class="mb-0 text-center">
                <a href="{{ route('register') }}">
                    Register a new account
                </a>
            </p>

        </div>

    </div>

</div>

<!-- AdminLTE JS -->
<script src="{{ url('js/adminlte.js') }}"></script>

</body>
</html>