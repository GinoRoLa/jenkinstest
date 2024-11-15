<?php
include_once 'conexion.php';

class userModelo{

    public function getUser($correo, $contrasena){
        $obj = new Conexion;
        $query = "SELECT * FROM usuarios where correo='$correo' and contrasena='$contrasena'";
        $resultado = mysqli_query($obj->conecta(), $query) or die(mysqli_error($obj->conecta()));
        $vec = [];
        if (mysqli_num_rows($resultado) > 0) {
            $fila = mysqli_fetch_array($resultado);
            $vec = $fila;
        }
        return $vec;
    }

    public function verificarCorreo($correo) {   
        $obj = new Conexion;    
        $query = "SELECT * FROM usuarios WHERE correo = '$correo'";
        $resultado = mysqli_query($obj->conecta(), $query)or die(mysqli_error($obj->conecta()));
        return mysqli_fetch_array($resultado); 
        
    }


    public function addUser($nombre, $correo, $usuario, $contrasena) {
        $obj = new Conexion();
        $query = "insert into usuarios(nombre, correo, usuario, contrasena)
             values('$nombre','$correo','$usuario','$contrasena') ";
        $resultado = mysqli_query($obj->conecta(), $query) or die(mysqli_error($obj->conecta()));

            if ($resultado) {
                return true;
            } else {
                die("Error al ejecutar la consulta: ");
            }
    }


    

}
