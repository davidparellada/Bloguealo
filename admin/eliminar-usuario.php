<?php
require 'config/bd.php';

// Fetch
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM usuarios WHERE id=$id";
    $result = mysqli_query($con, $query);
    $usuario = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) == 1) {
        // Borrar foto de la carpeta images
        $avatar_nombre = $usuario['avatar'];
        $avatar_ruta = '../images/' . $avatar_nombre;
        if (isset($avatar_ruta)) {
            unlink($avatar_ruta);
        }
        //Borrar thumbnails de los post
        $thumbnail_eliminar_query = "SELECT thumbnail FROM posts WHERE autor_id=$id";
        $thumbnail_eliminar_result = mysqli_query($con, $thumbnail_eliminar_query);

        if (mysqli_num_rows($thumbnail_eliminar_result) > 0) {
            while ($thumbnail = mysqli_fetch_assoc($thumbnail_eliminar_result)) {
                $thumbnail_ruta = '../images/' . $thumbnail['thumbnail'];
                if ($thumbnail_ruta) {
                    unlink($thumbnail_ruta);
                }
            }
        }



        // Borrar usuario de la bd
        $usuario_eliminar_query = "DELETE from usuarios where id=$id LIMIT 1";
        $usuario_eliminar_resultado = mysqli_query($con, $usuario_eliminar_query);
        if (mysqli_errno($con)) {
            $_SESSION['eliminar-usuario'] = "Hubo un error al intentar eliminar el usuario.";
        } else {
            $_SESSION['eliminar-usuario-ok'] = "Se ha eliminado el usuario.";
        }
    }
}

header('location: ' . ROOT_URL . 'admin/gestionar-usuarios.php');
die();
