<?php
$usuario = $_POST['usuario'];
$password = $_POST['passwords'];
$conexion = mysqli_connect("localhost", "root", "Admin", "login");

session_start();
$_SESSION['usuario'] = $usuario;
$request = "SELECT * FROM usuarios WHERE usuario='$usuario' AND passwords='$password'";

$valid = mysqli_query($conexion, $request);
$row = mysqli_fetch_row($valid);

if ($row > 0) {
    header('location: index.html');
} else {
    echo "Error en inicio de sesion";    
}
mysqli_free_result($valid);
