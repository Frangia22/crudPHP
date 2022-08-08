<?php
// Call file conection
include('./conexion.php');
//Star session
session_start();
//Pregunto si la variable de sesion existe
if (isset($_SESSION['user'])) {
    header("Location: ../pages/main.php");
}
// Recupero los datos del formulario
$username = $_POST['username'];
$pass = $_POST['password'];
// Pregunto que los campos no esten vacios
$sql = "SELECT username, password FROM users WHERE username= '$username'";
$result = $con->query($sql);
$findPass = mysqli_fetch_array($result);
//Aquí comprobamos:
$findPassOld = $findPass['password'];
//echo $findPass;
//Consulto si la session no existe
if(!isset($_SESSION['user'])){
    if(password_verify($pass, $findPassOld) === TRUE){
        //Datos correctos
        //echo $findPassOld;
        //echo "Logueo existoso";
        $_SESSION['user'] = $username;
        header("Location: ../pages/main.php");
        exit;
    }else{
        //Datos incorrectos
        //echo $findPassOld;
        echo '<script>alert("El email o password es incorrecto");
            window.location = "../index.html";
        </script>';
        exit;
    }
}
    
?>
