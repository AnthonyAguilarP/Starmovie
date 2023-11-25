<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_COOKIE["Respuesta"] === $_POST["respuesta"]) {
        $contrasena = $_COOKIE["Contrasena"];
        $correo = $_COOKIE["Correo"];
        
        require("PHPMailer-6.8.1/src/PHPMailer.php");
        require("PHPMailer-6.8.1/src/SMTP.php");

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->isHTML(true);
        
        $mail->Username = "starmovieweb@gmail.com";
        $mail->Password = "zzquxoljrayziang"; // Cambia 'tu_contraseña' a la contraseña real

        $mail->SetFrom("starmovieweb@gmail.com");
        $mail->Subject = "Contraseña Recuperada";

        // Cuerpo del correo más elaborado
        $mail->Body = "
            <html>
            <head>
                <style>
                    body {
                        font-family: 'Arial', sans-serif;
                        background-color: #f5f5f5;
                        color: #333;
                    }
                    .container {
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 20px;
                        background-color: #fff;
                        border-radius: 5px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }
                    h1 {
                        color: #007bff;
                    }
                    p {
                        font-size: 16px;
                        line-height: 1.5;
                    }
                </style>
            </head>
            <body>
                <div class='container'>
                    <h1>¡Contraseña Recuperada!</h1>
                    <p>Estimado Usuario,</p>
                    <p>Su contraseña ha sido recuperada exitosamente. A continuación, encontrará los detalles:</p>
                    <p><strong>Contraseña:</strong> <a href='http://localhost:3000/login.html'>Cambiar Contraseña</a></p>
                    <p>Gracias por utilizar nuestros servicios.</p>
                    <p>Atentamente,<br>El equipo de StarMovie</p>
                </div>
            </body>
            </html>
        ";

        $mail->CharSet = 'UTF-8';  // Establecer la codificación de caracteres a UTF-8
        $mail->AddAddress($correo);

        // Verificar si el correo se envió correctamente
        if ($mail->Send()) {
            echo "Correo enviado correctamente";
            header("Location: ../../../login.html");
        } else {
            echo "Error al enviar el correo: " . $mail->ErrorInfo;
            header("Location: ../../../recuperar contrasena.html");
        }
    }
}
?>

