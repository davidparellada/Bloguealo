<?php
session_start();
require 'config/bd.php';

// Comprobar si se ha envíado el formulario
if (isset($_POST['submit'])) {
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $crearpass = filter_var($_POST['crearpass'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmarpass = filter_var($_POST['confirmarpass'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];

    //Validar inputs
    if (!$nombre) {
        $_SESSION['signup'] = "Por favor, ingresa tu nombre para completar el registro.";
    } elseif (!$apellido) {
        $_SESSION['signup'] = "Por favor, ingresa tu apellido para completar el registro.";
    } elseif (!$usuario) {
        $_SESSION['signup'] = "Por favor, ingresa un nombre de usuario para completar el registro.";
    } elseif (!$email) {
        $_SESSION['signup'] = "Por favor, ingresa una dirección de email válida.";
    } elseif (strlen($crearpass) < 8 || strlen($confirmarpass) < 8) {
        $_SESSION['signup'] = "La contraseña debe tener al menos 8 caracteres.";
    } elseif (!$avatar['name']) {
        $_SESSION['signup'] = "Por favor, sube una foto de avatar.";
    } else {
        // Confirmación de contraseña
        if ($crearpass !== $confirmarpass) {
            $_SESSION['signup'] = "Las contraseñas no coinciden.";
        } else {
            $pass_hash = password_hash($crearpass, PASSWORD_DEFAULT);

            // Comprobar duplicados
            $usuario_check_query = "SELECT * FROM usuarios WHERE usuario='$usuario' OR email='$email'";
            $usuario_check_result = mysqli_query($con, $usuario_check_query);
            if (mysqli_num_rows($usuario_check_result) > 0) {
                $_SESSION['signup'] = "Ya existe una cuenta con ese nombre de usuario o email.";
            } else {
                // Comprobar avatar
                $time = time(); // Generamos número random para nombrar las imágenes subidas
                $avatar_nombre = $time . $avatar['name'];
                $avatar_tmp_nombre = $avatar['tmp_name'];
                $avatar_ruta_destino = 'images/' . $avatar_nombre;

                // Comprobamos que tenga extensión válida
                $avatar_extensiones = ['png', 'jpg', 'jpeg'];
                $extension = explode('.', $avatar_nombre);
                $extension = end($extension);
                if (in_array($extension, $avatar_extensiones)) {
                    // 1mb tamaño máximo
                    if ($avatar['size'] < 1000000) {
                        // Subir imagen
                        move_uploaded_file($avatar_tmp_nombre, $avatar_ruta_destino);
                    } else {
                        $_SESSION['signup'] = "Por favor, sube un archivo con tamaño inferior a 1mb";
                    }
                } else {
                    $_SESSION['signup'] = "El archivo debe tener una extensión png, jpg o jpeg.";
                }
            }
        }
    }
    // Si hay error redirecciona a la página de registro
    if (isset($_SESSION['signup'])) {
        $_SESSION['signup_datos'] = $_POST;
        header('location: ' . ROOT_URL . 'signup.php');
        die();
    } else {
        // Añadir el usuario a la tabla "usuarios"
        $usuario_insertar_query = "INSERT INTO usuarios (nombre, apellido, usuario, email, pass, avatar, admin_check) values ('$nombre', '$apellido', '$usuario', '$email', '$pass_hash', '$avatar_nombre', 0)";
        $usuario_insertar_result = mysqli_query($con, $usuario_insertar_query);
        // Redirecciona a signin (éxito)
        if (!mysqli_errno($con)) {
            $_SESSION['signup-ok'] = "Registro completado.";
            header('location: ' . ROOT_URL . 'signin.php');
            die();
        }
    }
} else {
    // Vuelve a la página de registro
    header('location: ' . ROOT_URL . 'signup.php');
    die();
}
