<?php
session_start();
include("dol/person.php");

$prueba = new Person();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // Obtenemos los datos del usuario activo
    $datos = json_decode($_SESSION["usuario_activo"], true);
    $id_usuario = $datos["NUsuario"];

    // Consultamos la base de datos para obtener el nombre de la foto de perfil anterior
    $consulta = $prueba->connection->prepare("SELECT FPerfil FROM usuario WHERE NUsuario = :id_usuario");
    $consulta->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $consulta->execute();

    $registro = $consulta->fetch(PDO::FETCH_OBJ);
    $nombre_anterior = $registro->FPerfil;

    // Verificamos si hay una foto de perfil anterior y no es la foto predeterminada
    if ($nombre_anterior && $nombre_anterior != "DefaultFPerfil.jpg") {
        // Eliminamos la foto de perfil anterior
        unlink('../../../frontend/image/perfil/' . $nombre_anterior);
    }

    // Llamamos a la función para subir la nueva foto de perfil
    subirFotoPerfil($prueba->connection, $id_usuario);
    $prueba->setNUsuario($datos["NUsuario"]);
    $prueba->setPass($datos["Pass"]);
    $prueba = $prueba->getUser($prueba);
        
    // Almacena los datos del usuario en una variable de sesión
    $_SESSION['usuario_activo'] = json_encode($prueba);
    header("Location: ../../../pagina principal.php");
} else {
    echo 'Error al procesar la solicitud';
}

function subirFotoPerfil($base, $id_usuario) {
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $archivo_nombre = $_FILES['file']['name'];
        $archivo_temporal = $_FILES['file']['tmp_name'];
        $archivo_tamano = $_FILES['file']['size'];

        if ($archivo_tamano <= 2 * 1024 * 1024) {
            $archivo_extension = pathinfo($archivo_nombre, PATHINFO_EXTENSION);
            $nombre_archivo = $id_usuario . '_' . uniqid() . '.' . $archivo_extension;

            // Antes de move_uploaded_file, verificamos si el directorio existe
            if (!file_exists('../../frontend/image/perfil/')) {
                mkdir('../../frontend/image/perfil/', 0777, true);
            }

            // Movemos la nueva foto de perfil al directorio correspondiente
            move_uploaded_file($archivo_temporal, '../../frontend/image/perfil/' . $nombre_archivo);

            // Actualizamos el nombre de la foto de perfil en la base de datos
            $consulta = $base->prepare("UPDATE usuario SET FPerfil = :nombre_archivo WHERE NUsuario = :id_usuario");
            $consulta->bindParam(':nombre_archivo', $nombre_archivo, PDO::PARAM_STR);
            $consulta->bindParam(':id_usuario', $id_usuario, PDO::PARAM_STR);
            $consulta->execute();
            
        } else {
            echo "El archivo es demasiado grande. Por favor, seleccione un archivo de menos de 2 MB.";
        }
    }
}
?>
