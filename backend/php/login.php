<?php
session_start();
include("dol/person.php"); 

$prueba = new Person();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prueba->setNUsuario($_POST["nombre_usuario"]);
    $prueba->setPass($_POST["contrasena"]);
    
    if ($prueba->userExist($prueba)) {
        $prueba = $prueba->getUser($prueba);
        
        // Almacena los datos del usuario en una variable de sesión
        $_SESSION['usuario_activo'] = json_encode($prueba);
        
        // Redirige a la página principal
        if($prueba->getCFavorita()!=null)header("Location: ../../../pagina%20principal.php");
        else header("Location: ../../../categoria.php");
        exit;
    }    
}

?>
