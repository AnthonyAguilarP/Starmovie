<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Película</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="frontend/css/detalle pelicula style.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">

<div class="container-fluid">

    <a class="navbar-brand" href="pagina principal.php">
        <img class="rounded-image" src="frontend/image/Logo.jpg" alt="NexoWeb">
    </a>


    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mynavbar">

        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="perfil.php">Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="acerca de.html">Acerca de</a>
            </li>
        </ul>
        <form class="d-flex">
            <input class="form-control me-2" type="text" id="search-input" placeholder="Buscar">
            <button class="btn btn-primary me-2" id="search-button" type="button">Buscar</button>
        </form>
    </div>

</div>

</nav>
    

    <div class="container my-4">
        <h1 class="text-center">Detalles de la Película</h1>
        <div class="card mb-4">
            <img id="movie-poster" class="card-img-top" alt="Poster de la Película">
            <div class="card-body">
                <h2 class="card-title" id="movie-title"></h2>
                <p class="card-text" id="movie-overview"></p>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-primary btn-sm float-right btn-votar" id="vote-button">Votar</a>
            </div>
        </div>
        <div id="actors-list" class="card mb-4">
            <div class="card-body">
                <h3 class="card-title">Actores</h3>
                <p class="card-text" id="actors-list-content"></p>
            </div>
        </div>
    </div>

    <div class="container my-4">
    <h2>Comentarios</h2>
    <div id="comments-container"></div>
    <?php 
    include("backend/php/dol/person.php");
    $prueba = new Person();
    $array = $prueba->getCommentary($_GET['id']); 
    foreach($array as $row){
        echo '<div class="fake-comment">';
            echo '<img src= "frontend/image/perfil/'. $row["FPerfil"] .'" alt="Foto de perfil">';
            echo '<p><strong>' . $row["NUsuario"] . '</strong> - Puntuación: ' . $row["Puntuacion"] . '</p>';
            echo '<p>' . $row["Comentario"] . '</p>';
        echo '</div>';
    }
?>

    </div>
    <!-- Comentarios Falsos 
    <div class="container my-4">
        <h2>Comentarios</h2>
        <div id="comments-container"></div>
        <div class="fake-comment">
            <img src="frontend/image/perfil/DefaultFPerfil.jpg" alt="Foto de perfil">
            <p><strong>${comment.username}</strong> - Puntuación: ${comment.score}</p>
            <p>${comment.comment}</p>
        </div>
    </div>
    -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="frontend/js/detalle pelicula script.js"></script>
    
</body>
</html>
