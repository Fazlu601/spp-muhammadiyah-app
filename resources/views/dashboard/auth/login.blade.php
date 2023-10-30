<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Freelancer - Start Bootstrap Theme</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('guest/css/styles.css') }}" rel="stylesheet">
        <!-- Fonts CSS-->
        <link rel="stylesheet" href="{{ asset('css/heading.css') }}">
        <link rel="stylesheet" href="{{ asset('css/body.css') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body id="page-top">

        <main  class="masthead container-fluid p-0 d-flex align-items-center text-white text-center">
            <div class="col-7 d-flex align-items-center bg-primary" style="height: 100vh">
                <div class="card col-7 text-left px-2 py-4 mx-auto">
                    <h4 class="text-dark text-center">LOG-IN ADMIN</h4>
                  <div class="card-body">
                    <form action="/admin/login" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="text-danger" for="username">*Username</label>
                            <input type="text" name="username" placeholder="Masukan Username" id="username" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-danger" for="password">*Password</label>
                            <input type="password" name="password" placeholder="Masukan Password" id="password" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-secondary w-100">Login</button>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
            <div class="col-5 d-flex align-items-center bg-secondary" style="height: 100vh">
                    <div class="col-10">
                         <!-- Masthead Avatar Image--><img class="masthead-avatar mb-5 img-fluid" src="{{ asset('guest/assets/img/smk.png') }}" alt="">
                         <h3 class="text-light">SISTEM INFORMASI <span class="text-primary">SPP</span></h3>
                         <p class="text-light">SMK Muhammadiyah</p>
                    </div>
            </div>
        </main>
  
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="{{ asset('guest/assets/mail/jqBootstrapValidation.js') }}"></script>
        <script src="{{ ('guest/assets/mail/contact_me.js') }}"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('guest/js/scripts.js') }}"></script>
    </body>
</html>