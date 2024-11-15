<?php 
session_start();
if(!isset($_SESSION['usuario'])){
    echo'
        <script>
            alert("Iniciar sesion")
            window.location = "login.php";
        </script>
    ';
    session_destroy();
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO</title>
</head>
<body>
    <h1>¡HOLA MUNDO!</h1>
    <a href="../Controlador/cerrar_sesion.php">Cerrar sesion</a>
</body>
</html>