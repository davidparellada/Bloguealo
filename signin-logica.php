<?php
require 'config/bd.php';

if (isset($_POST['submit'])) {
    $usuario_email = filter_var($_POST['usuario_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $pass = filter_var($_POST['pass'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (!$usuario_email) {
        $_SESSION['signin'] = "Introduce tu nombre de usuario o email.";
    } elseif (!$pass) {
        $_SESSION['signin'] = "Introduce tu contraseña.";
    } else {
        // Buscamos el usuario en la bd
        $usuario_fetch_query = "SELECT * from usuarios where usuario='$usuario_email' OR email='$usuario_email'";
        $usuario_fetch_result = mysqli_query($con, $usuario_fetch_query);

        // Recogemos los datos del usuario si hay coincidencias
        if (mysqli_num_rows($usuario_fetch_result) === 1) {
            $usuario_leer = mysqli_fetch_assoc($usuario_fetch_result);
            $bd_pass = $usuario_leer['pass'];
            // Verificación contraseña introducida vs fetch de la bd
            if (password_verify($pass, $bd_pass)) {
                // Iniciar sesión
                $_SESSION['usuario-id'] = $usuario_leer['id'];
                if ($usuario_leer['admin_check'] == 1) {
                    $_SESSION['usuario_admin'] = true;
                }
                header('location: ' . ROOT_URL . 'admin/');
            } else {
                $_SESSION['signin'] = "Contraseña incorrecta.";
            }
        } else {
            $_SESSION['signin'] = "No se ha encontrado un usuario con esas credenciales.";
        }
    }
    if (isset($_SESSION['signin'])) {
        $_SESSION['signin_datos'] = $_POST;
        header('location: ' . ROOT_URL . 'signin.php');
        die();
    }
} else {
    header('location: ' . ROOT_URL . 'signin.php');
    die();
}
