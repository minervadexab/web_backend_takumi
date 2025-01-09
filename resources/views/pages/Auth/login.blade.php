<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <title>Login Dashboard Admin Takumi</title>

    <!-- Tambahkan logo favicon -->
    <link rel="icon" type="image/png" href="{{ asset('logo/iconsbd.png') }}">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/components.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/dark-layout.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/bordered-layout.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/semi-dark-layout.min.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/authentication.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <form action="{{ route('proses') }}" class="space-y-6" method="POST">
    @csrf
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <div class="auth-wrapper auth-cover"> 
            <div class="auth-inner row m-0">
              <!-- Brand logo-->
              <h2 class="brand-text brand-logo text-primary ms-1" style="font-family: 'Poppins', sans-serif; font-weight: bold;">
                Dashboard Takumi
            </h2>
              <!-- /Brand logo-->
              <!-- Left Text-->
              <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src=" {{asset('logo/logo1.jpg') }} " alt="Login V2"></div>
              </div>
              <!-- /Left Text-->
              <!-- Login-->
              <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                  <!-- Tambahkan logo di sini -->
                  <div class="text-center mb-2">
                    <img src="{{ asset('logo/takumi.png') }}" alt="Smart Building Logo" class="img-fluid" style="width: 250px; height: auto;">
                  </div>
                  {{-- <h2 class="card-title fw-bold mb-1">Welcome to Smart Building! 👋</h2> --}}
                  {{-- <p class="card-text mb-2">Silahkan login ke akun admin smart building</p> --}}

                  <!-- Display Error Alert -->
                  @if(session('error'))
                  <div class="alert alert-danger">
                      {{ session('error') }}
                  </div>
                  @endif

                  <form class="auth-login-form mt-2" action="dashboard.html" method="POST">
                    <div class="mb-1">
                      <label class="form-label" for="email">Email :</label>
                      <input class="form-control" id="email" type="text" name="email" placeholder="write your email here.." aria-describedby="email" autofocus="" tabindex="1" value="{{ old('email', Cookie::get('email')) }}">
                    </div>
                    <div class="mb-1">
                      <div class="d-flex justify-content-between">
                      </div>
                      <label class="form-label" for="password">Password :</label>
                      <div class="input-group input-group-merge form-password-toggle">
                        <input class="form-control form-control-merge" id="password" type="password" name="password" placeholder="············" aria-describedby="password" tabindex="2"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                      </div>
                    </div>

                    <div class="mb-1">
                      <div class="form-check">
                          <input class="form-check-input" id="remember-me" type="checkbox" name="remember" tabindex="3" {{ old('remember') ? 'checked' : '' }}>
                          <label class="form-check-label" for="remember-me"> Remember Me</label>
                      </div>
                  </div>
                    
                    <button type="submit" class="btn btn-primary w-100" tabindex="4">Log in</button>
                  </form>
                  <div class="divider my-2"></div>
                </div>
              </div>
              <!-- /Login-->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>    
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>    
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.min.js') }}"></script>   
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/pages/auth-login.js') }}"></script>
    <!-- END: Page JS-->

    <script>
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      })
    </script>

    <script>
    setTimeout(function() {
        let alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            alert.classList.remove('show');
            alert.classList.add('fade');
        });
    }, 8000);
    </script>

  </body>
  <!-- END: Body-->
</html>