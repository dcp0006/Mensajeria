<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>WhatChav chatPage</title>
        <link rel="icon" type="image/x-icon" href="{{url('assets/favicon.ico')}}" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <link href="{{ url('css/styles.css')}}" rel="stylesheet" />
        <script src="{{ url('js/jquery-3.7.1.min.js')}}"></script>
        <style>
            form
            {
                margin: 0 30%
            }
            
            header
            {
                position: relative;
                overflow: hidden;
                padding-bottom: 7rem;
                background: linear-gradient(0deg, #ff6a00 0%, #ee0979 100%);
                background-repeat: no-repeat;
                background-position: center center;
                background-attachment: scroll;
                background-size: cover;
                height: 100vh;
            }
            #container
            {
                height: 70vh;
                width: 80vw;
                background-color: white;
                margin: 12vh 10vw;
                border: solid 1px;
                border-radius: 1%;
                position: relative;
            }
            #container form
            {
                position: absolute;
                bottom: 10px;
                margin: 0 10%;
                width: 100%;
            }
            #container form input[type = text]
            {
                margin:0;
                width: 80%;
                font-size: 1.2rem;
            }
            #container form input[type = text]::placeholder
            {
                text-align: center;
            }
            #container form input[type = submit]
            {
                margin:0;
                width: 5%;
                font-size: 1.2rem;
            }
            #container form input[type = submit]:hover
            {
               background-color: rgb(207, 198, 198);
            }
            #chats
            {
                padding: 10px;
                height: 64vh;
                width: 80vw;
                border: solid 1px;
                border-top-left-radius: 1%;
                border-top-right-radius: 1%;
                overflow-y: scroll;
            }
            ::-webkit-scrollbar
            {
                background-color: #FFB7B2;
                border: solid 1px;
                border-top-right-radius: 15%;
            }
            ::-webkit-scrollbar-thumb
            {
                background-color: #FFDAC1;
                border-radius: 15px;
                border: solid 1px;
            }
            #chats p
            {
                left: 0;
                width: 49%;
                padding: 10px;
                margin: 10px;
                border: solid 1px;
                border-radius: 15px;
                
            }
            .mine
            {
                background-color: #acfd86;
                text-align: right;
                float: right;
            }
            .others
            {
                float: left;
                background-color: #FFDAC1;
            }
            img
            {
                max-width: 200px;
                max-height: 200px;
            }
            img.mine {
                padding: 10px;
                margin-left:100%;
                margin-bottom: 10px;
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
                        <li class="nav-item"><a class="nav-link" href="<?= Session::get('base_url') ?>/">Log out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <header >
          <div id="container">
                <div id="chats">
                   
                    
                </div>
                <form action="">
                    <input type="text" id="writeboard" placeholder="Escriba aquí su mensaje" value="">
                    <input type="submit" value="↑" id="submit">
                </form>
          </div>
            
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
            <script>
                setInterval(() => {
                $.ajax({
                    url: '<?= Session::get('base_url') ?>/obtener/',
                    success: function(respuesta) {
                        $("#chats").empty();
                        console.log(respuesta);
                        var mensajes = JSON.parse(respuesta);
                        resp(mensajes);
                    }
            });
                }, 5000);
               $(document).ready(function() {
                $.ajax({
                    url: '<?= Session::get('base_url') ?>/obtener/',
                    success: function(respuesta) {
                        console.log(respuesta);
                        var mensajes = JSON.parse(respuesta);
                        resp(mensajes);
                    }
                });
            });

                console.log($("#writeboard").val());
                function clean() {
                    $("#chats").empty();
                   }
                $( "#submit" ).on( "click", function( event ) {
                event.preventDefault();
                clean();
                $.ajax({
                url : '<?= Session::get('base_url') ?>/obtener/',
                data: { enviado: $("#writeboard").val() },
                success : function (respuesta) {
                    console.log(respuesta);
                    var mensajes = JSON.parse(respuesta);
                    resp(mensajes);
                    
                }
                })
                });
                function resp(respuesta) {
                    let long = respuesta.length;
                    
                   for (let i = 0; i < long; i++) {
                    let end = respuesta[i]["mensaje"].substr(-3,3);
                    let init = respuesta[i]["mensaje"].substr(0,4);
                   if(init == 'http' && (end == "png" || end == "jpg" || end == "jpeg" || end == "gif"))
                   {
                    
                        if (respuesta[i]["id_user"] == <?= Session::get("user_id") ?>) {
                            var newElement = $("<img>",{
                            class: "mine",
                            src: respuesta[i]["mensaje"]
                            });
                            
                        }
                        else
                        {
                            var newElement = $("<img>",{
                            class: "others",
                            src: respuesta[i]["mensaje"]
                            });
                        }
                   }
                   else if(init == 'http' && (end == "mp4" || end == "avif" || end == "webp" || end == "wav"))
                   {
                    
                        if (respuesta[i]["id_user"] == <?= Session::get("user_id") ?>) {
                            var newElement = $("<video>",{
                            class: "mine",
                            src: respuesta[i]["mensaje"]
                            });
                            
                        }
                        else
                        {
                            var newElement = $("<video>",{
                            class: "others",
                            src: respuesta[i]["mensaje"]
                            });
                        }
                   }
                   else
                   {
                        if (respuesta[i]["id_user"] == <?= Session::get("user_id") ?>) {
                            var newElement = $("<p>",{
                            class: "mine",
                            text: respuesta[i]["mensaje"]
                            });
                        }
                        else
                        {
                            var newElement = $("<p>",{
                            class: "others",
                            text: respuesta[i]["mensaje"]
                            });
                        }
                   }
                   
                    
                    $("#chats").append(newElement);
                    
                   }
                   
                }
            </script>
    </body>
</html>
