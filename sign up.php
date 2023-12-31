<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <link href="frontend/css/sign up style.css" rel="stylesheet">

</head>

<body>
    
    <?php

        include("backend/php/sign up1.php");

    ?>

    <header>

        <div class="container text-center">

            <h1>Registro</h1>

        </div>

    </header>

    <main class="py-5">

        <div class="container">

            <section class="bg-white p-5 rounded shadow-lg" style="max-width: 400px; margin: 0 auto;">

                <h2 class="text-center">Crear una cuenta</h2>

                <form action="backend/php/sign up1.php" method="post">

                    <div class="mb-3">

                        <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo Electrónico" required>

                    </div>

                    <div class="mb-3">

                        <input type="password" name="contrasena" id="contrasena" class="form-control" placeholder="Contraseña" required>

                    </div>

                    <div class="mb-3">

                        <input type="text" name="primer_nombre" id="primer_nombre" class="form-control" placeholder="Primer Nombre" required>

                    </div>

                    <div class="mb-3">

                        <input type="text" name="segundo_nombre" id="segundo_nombre" class="form-control" placeholder="Segundo Nombre">

                    </div>

                    <div class="mb-3">

                        <input type="text" name="primer_apellido" id="primer_apellido" class="form-control" placeholder="Primer Apellido" required>
                    
                    </div>

                    <div class="mb-3">

                        <input type="text" name="segundo_apellido" id="segundo_apellido" class="form-control" placeholder="Segundo Apellido">

                    </div>

                    <div class="mb-3">
                        
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" placeholder="Fecha de Nacimiento" required>
                    
                    </div>


                    <div class="mb-3">

                        <select name="pregunta_secreta" id="pregunta_secreta" class="form-select" required>
                            
                            <?php

                                $prueba->getQuestion();

                            ?>
                            
                        </select>

                    </div>

                    <div class="mb-3">

                        <input type="text" name="respuesta_secreta" id="respuesta_secreta" class="form-control" placeholder="Respuesta a la pregunta secreta" required>
                    
                    </div>

                    <div class="mb-3">

                        <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control" placeholder="Nombre de Usuario" required>
                    
                    </div>
<!--
                    <div class="mb-3">
                        <label for="pais">País:</label>
                        <span id="user-country"></span>
                    </div>    

                    <div class="mb-3">
                        <label for="ciudad">Ciudad:</label>
                        <span id="user-city"></span>
                    </div>    
-->
                    <div class="text-center">

                        <button type="submit" name="btn1" id="btn1" class="btn btn-primary btn-block">Registrarse</button>

                    </div>

                </form>

                <p class="mt-3 text-center"><a href="login.html" style="text-decoration: none; color: #4285f4;">¿Ya tienes una cuenta? Inicia sesión aquí</a></p>
            
            </section>

        </div>

    </main>

    <footer>

        <div class="container text-center">

            <p>&copy; StarMovie</p>

        </div>

    </footer>

    <script src="frontend/js/sign up script.js"></script>

</body>

</html>