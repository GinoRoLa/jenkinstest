<?php
include_once '../Modelo/userModelo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena1 = $_POST['contrasena'];
    $contrasena = hash('sha512', $contrasena1);

    $userModel = new userModelo();

    // Verificar si el correo ya está registrado
    $validar = $userModel->verificarCorreo($correo);
    if ($validar) {
        echo '
            <script>
                alert("Intente con otro correo");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }

    // Intentar registrar al usuario
    $adicion = $userModel->addUser($nombre, $correo, $usuario, $contrasena);
    if ($adicion) {
        echo '
            <script>
                alert("Almacenado exitosamente");
                window.location = "../index.php";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("Inténtalo de nuevo");
                window.location = "../index.php";
            </script>
        ';
    }
}
?>
