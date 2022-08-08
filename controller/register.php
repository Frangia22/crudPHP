<?php
//Call file connection
include('./conexion.php');
// Recupero los datos del formulario
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$pass = $_POST['password']; 
//Variables para validar contraseña
$size = strlen($pass);
$uppercase = preg_match('@[A-Z]@', $pass);
$lowercase = preg_match('@[a-z]@', $pass);
$number    = preg_match('@[0-9]@', $pass);
// Pregunto que los campos no esten vacios
if (!empty($username) && !empty($email) && !empty($phone)) {
    //Encripto la contraseña
    $passEncriptada = password_hash($pass, PASSWORD_DEFAULT);
    //Valido seguridad contraseña
    if ($size < 9 || !$uppercase || !$lowercase || !$number) {
        echo "La contraseña debe tener 9 digitos, una mayuscula, una minuscula y un numero";
        die();
    }
    //Validar que username no exista en la tabla
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $results = $con->query($sql);
    $num_rows = mysqli_num_rows($results);
    if ($num_rows > 0) {
        echo "El usuario existe";
        die();
    }
    //Validar que username no exista en la tabla
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $results = $con->query($sql);
    $num_rows = mysqli_num_rows($results);
    if ($num_rows > 0) {
        echo "El correo existe";
        die();
    }
    //Inserto el registro a la base de datos
    $sql = "INSERT INTO users (username, email, phone, password) VALUES ('$username', '$email', '$phone', '$passEncriptada')";
    if ($con->query($sql) === TRUE) {
        //echo "New record created successfully";
        header("Location: ../index.html");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
      
    $con->close();
}
?>