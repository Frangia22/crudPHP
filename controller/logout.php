<?php
// Mostramos la sesion
session_start();
//Distruimos la sesion
session_destroy();
header('Location: ../index.html');
?>
