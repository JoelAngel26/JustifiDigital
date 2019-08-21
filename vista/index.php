<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Login-JustifiDigital</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="assets/css/main.css">
    </head>
    <style>
        .anima:hover{
            -webkit-transform: scale(0.8);transform: scale(0.8);
            filter: opacity(.5);
           
        }
        .animaboton:hover{
              -webkit-transform: scale(1.2);transform: scale(1.2);
        }
        
    </style>
    <body class="cover" style="background-image: url(./assets/img/edificio.jpg);">
        <form  id="loginForm" action="validarCode.php" method="POST" autocomplete="off" class="full-box logInForm" role="form" >
            <p class="text-center text-muted"><i class="">
                    <img class="img-thumbnail img-rounded img-responsive anima" src="assets/img/Imagen1.png" alt="Logo"/>

                </i></p>
            <p class="text-center text-muted text-uppercase">Inicia sesión con tu cuenta</p>
            <div class="form-group label-floating">
                <label class="control-label" for="txtUsuario">E-mail</label>
                <input class="form-control" id="txtUsuario" type="email" name="txtUsuario" required>
                <p class="help-block">Escribe tú E-mail</p>
            </div>
            <div class="form-group label-floating">
                <label class="control-label" for="UserPass">Contraseña</label>
                <input class="form-control" id="UserPass" type="password" name="txtPassword" required>
                <p class="help-block">Escribe tú contraseña</p>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-raised btn-danger">Ingresar</button>
            </div>
            <br>
          <div class="form-group text-center" style="background-color: #6699ff">
                <p style="font-size:10px">Perido de Registro abierto se cerrara el 30/08/2019</p>
                <a class="btn btn-link"  href="registro.php">Registro</a>
            </div> 
            
        </form>
        <!--====== Scripts -->
        
      
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <script src="assets/js/overhang.min.js" type="text/javascript"></script>
     	
        <script src="assets/js/material.min.js"></script>
        <script src="assets/js/ripples.min.js"></script>
        <script src="assets/js/sweetalert2.min.js"></script>
        <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="assets/js/main.js"></script>
      
    <script src="assets/js/app.js"></script>
        <script>
            $.material.init();
        </script>
    </body>
</html>