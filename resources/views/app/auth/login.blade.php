<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Multitenant</title>

    <!-- Meta -->
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:title" content="Admin Templates - Dashboard Templates">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    {{-- <link rel="shortcut icon" href="{{ url('assets/images/favicon.svg') }}"> --}}

    <!-- *************
   ************ CSS Files *************
  ************* -->
    <link rel="stylesheet" href="{{ url('assets/fonts/remix/remixicon.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/main.min.css') }}">
    <style>
        .login-bg {
            margin: 0;
            height: 100vh;
            background: linear-gradient(160deg,
                    #133d53 0%,
                    #066279 30%,
                    #2b4369 65%,
                    #5e6c8b 100%);
        }

        .btn-primary {
            background-color: #28456a;
            border-color: #0a6786;
        }

        .btn-primary:hover {
            /* background-color: #28456a; */
            background-color: #0a6786;
        }

        .text-primary{
            color: #28456a !important;
        }
    </style>

</head>

<body class="login-bg">

    <!-- Container starts -->
    <div class="container">

        <!-- Auth wrapper starts -->
        <div class="auth-wrapper">

            <!-- Form starts -->
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="auth-box">
                    {{-- <a href="#" class="auth-logo mb-4">
                        <img src="{{ url('assets/images/logo-dark.svg') }}" alt="Bootstrap Gallery">
                    </a> --}}

                    <div class="text-center">
                        <h4 class="mb-4">Login</h4>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="email">Your email <span class="text-danger">*</span></label>
                        <input type="text" id="email" name="email" class="form-control"
                            placeholder="Enter your email">
                    </div>

                    <div class="mb-2">
                        <label class="form-label" for="pwd">Your password <span
                                class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="password" id="pwd" name="password" class="form-control"
                                placeholder="Enter password">
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="ri-eye-line text-primary" id="toggleIcon"></i>
                            </button>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('password.request') }}" class="text-decoration-underline">Forgot password?</a>
                    </div>

                    <div class="mb-3 d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>

            </form>
            <!-- Form ends -->

        </div>
        <!-- Auth wrapper ends -->

    </div>
    <!-- Container ends -->

    <script>
        const passwordInput = document.getElementById('pwd');
        const togglePassword = document.getElementById('togglePassword');
        const toggleIcon = document.getElementById('toggleIcon');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Toggle icon class
            if (type === 'password') {
                toggleIcon.classList.remove('ri-eye-off-line');
                toggleIcon.classList.add('ri-eye-line');
            } else {
                toggleIcon.classList.remove('ri-eye-line');
                toggleIcon.classList.add('ri-eye-off-line');
            }
        });
    </script>

</body>

</html>
