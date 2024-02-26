<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>WhatChav Register</title>
        <link rel="icon" type="image/x-icon" href="{{url('assets/favicon.ico')}}" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <link href="{{ url('css/styles.css')}}" rel="stylesheet" />
        <style>
            form
            {
                margin: 0 30%
            }
            input:hover
            {
                box-shadow: 1px 1px 5px blue;
            }
            input:focus
            {
                border: solid 3px;
                border-color: black !important;
                box-shadow: 1px 1px 7px blue;
            }
        </style>
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
            <div class="container px-5">
                <a class="navbar-brand" href="<?= Session::get('base_url') ?>/">WhatChav</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="#!">Sign Up</a></li>
                        <li class="nav-item "><a class="nav-link" href="<?= Session::get('base_url') ?>/login">Log In</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="masthead text-center text-white">
            <div class="masthead-content">
                <form action="<?= Session::get('base_url') ?>/createA" method="get">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label" style="font-size: 2rem" >Usuario</label>
                        <input type="text" class="form-control" placeholder="Ponga aquí su usuario" id="exampleInputEmail1" name="usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label" style="font-size: 2rem" >Password</label>
                        <input type="password" class="form-control" placeholder="Ponga aquí su contraseña" id="exampleInputPassword1" name="password"required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword2" class="form-label" style="font-size: 2rem">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Repite tu contraseña" id="exampleInputPassword2" name="passwordConfirm"required>
                    </div>
                    <button type="submit" class="btn btn-warning" style="font-size: 1.5rem">Submit</button>
                </form>
                
            </div>
            <div class="bg-circle-1 bg-circle"></div>
            <div class="bg-circle-2 bg-circle"></div>
            <div class="bg-circle-3 bg-circle"></div>
            <div class="bg-circle-4 bg-circle"></div>
        </header>
        <footer class="py-5 bg-black fixed-bottom">
            <div class="container px-5">
                <p class="m-0 text-center text-white small">Copyright &copy; WhatChav</p>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        @if(Session::has('mensaje'))
            <script>
                alert("{{ Session::get('mensaje') }}");
            </script>
        @endif

    </body>
</html>
