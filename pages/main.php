<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Panel de control</title>
</head>
<body> 
    <!-- Si la variable existe muestro el nav -->
    <?php
    if(isset($_SESSION['user'])){
        $username = $_SESSION['user'];   
        echo '
        <nav class="navbar bg-deepChamp">
            <div class="container">
                <a class="navbar-brand" href="#">Bienvenido, ' .$username.'</a>
                <a class="navbar-brand" href="../controller/logout.php">Cerrar sesión</a>
            </div>
        </nav>
        <footer class="py-3 bg-deepChamp fixed-bottom">
            <p class="text-center text-black">© 2022 Company, Inc</p>
        </footer>
        ';
    }else{
        // Si la sesion expiro o no se creo  mostraremos el siguiente mensaje
        echo '<h1 class="position-absolute top-50 start-50 translate-middle">Acceso denegado</h1>';
    }
    ?>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>

