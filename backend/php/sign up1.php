<?php

    include("dol/person.php");

    $prueba=new Person();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $prueba->setMail($_POST["correo"]);
        $prueba->setPass($_POST["contrasena"]);
        $prueba->setPNombre($_POST["primer_nombre"]);
        $prueba->setSNombre($_POST["segundo_nombre"]);
        $prueba->setPApellido($_POST["primer_apellido"]);
        $prueba->setSApellido($_POST["segundo_apellido"]);
        $prueba->setFNacimiento($_POST["fecha_nacimiento"]);
        $prueba->setIdPregunta($_POST["pregunta_secreta"]);
        $prueba->setRespuesta($_POST["respuesta_secreta"]);
        $prueba->setNUsuario($_POST["nombre_usuario"]);

        if($prueba->personExist($prueba->getNUsuario()))echo "Usuario existente";
        else $prueba->addUser($prueba);
        
    }
?>