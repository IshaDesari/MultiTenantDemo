<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Multitenant Demo</title>

    <!-- Meta -->
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:title" content="Admin Templates - Dashboard Templates">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    
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
        <form method="POST" action="{{ route('password.email') }}">
        @csrf

          <div class="auth-box">
            <a href="#" class="auth-logo mb-4">
              {{-- <img src="{{ asset('assets/images/logo-dark.svg') }}" alt="Bootstrap Gallery"> --}}
              <h4>Forgot Password </h4>
            </a>

            <h6 class="fw-light mb-4">In order to access your dashboard, please enter the email ID you provided during
              the
              registration process.</h6>

            <div class="mb-3">
              <label class="form-label" for="email">Your email <span class="text-danger">*</span></label>
              <input type="text" id="email" class="form-control" placeholder="Enter your email">
            </div>

            <div class="mb-3 d-grid">
              <button type="submit" class="btn btn-primary">
                Submit
              </button>
            </div>
          </div>

        </form>
        <!-- Form ends -->

      </div>
      <!-- Auth wrapper ends -->

    </div>
    <!-- Container ends -->

  </body>

</html>