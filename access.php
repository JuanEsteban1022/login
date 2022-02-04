<?php
// Conexion con la BD mediante la funcion mysqli_connect(servidor, user, password, name_bd)  
$conexion = mysqli_connect("localhost", "root", "Admin", "login"); 

// Declaracion de variables para almacenar los datos del formulario
$usuario = $_POST['usuario'];
$password = $_POST['passwords'];

// Inicio de sesion
session_start();
// Globalizar una variable 
$_SESSION['usuario'] = $usuario;
// Se realiza peticion a la BD mediante el lenguaje SQL
$request = "SELECT * FROM usuarios WHERE usuario='$usuario' AND passwords='$password'";

// Validacion de los datos recogidos 
$valid = mysqli_query($conexion, $request);
// se almacenan los datos en un array
$row = mysqli_fetch_row($valid);

// Verificación de los datos con los de la BD para realizar el login
if ($row > 0) {
    header('location: index.html');
} else {
    echo "Error en inicio de sesion";    
}
mysqli_free_result($valid);
