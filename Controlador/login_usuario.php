<?php
session_start();

include_once '../Modelo/conexion.php';
include_once '../Modelo/userModelo.php';
$usModel= new userModelo();

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$contrasena = hash('sha512',$contrasena);


$usuario = $usModel->verificarCorreo($correo);
if (!$usuario) {
    echo '
        <script>
            alert("Usuario no existe");
            window.location = "../index.php";
        </script>
    ';
    exit;
}


$validar = $usModel->getUser($correo,$contrasena);
if($validar){
    $_SESSION['usuario'] = $correo;
    header("location:../Vista/Inicio.php");
}else{
    echo '
        <script>
                alert("Credenciales incorrectas")
                window.location = "../index.php";
        </script>
    ';
    exit;
}
?>