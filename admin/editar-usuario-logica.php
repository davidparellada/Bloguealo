<?php
require 'config/bd.php';

if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $rol = filter_var($_POST['rol'], FILTER_SANITIZE_NUMBER_INT);

    if (!$nombre) {
        $_SESSION['editar-usuario'] = "No se pudo actualizar el usuario. Por favor, proporciona un nombre válido.";
    } elseif (!$apellido) {
        $_SESSION['editar-usuario'] = "No se pudo actualizar el usuario. Por favor, proporciona un apellido válido.";
    } else {
        // Editar
        $usuario_editar_query = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', admin_check=$rol WHERE id=$id LIMIT 1";
        $usuario_editar_resultado = mysqli_query($con, $usuario_editar_query);

        if (mysqli_errno($con)) {
            $_SESSION['editar-usuario'] = "No se pudo actualizar el usuario.";
        } else {
            $_SESSION['editar-usuario-ok'] = "Se ha actualizado el usuario.";
        }
    }
}

header('location: ' . ROOT_URL . 'admin/gestionar-usuarios.php');
die();
