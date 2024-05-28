<?php
require 'config/bd.php';

// Fetch
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $post = mysqli_fetch_assoc($result);
        $thumbnail = $post['thumbnail'];
        $thumbnail_ruta = '../images/' . $thumbnail;
        if (isset($thumbnail_ruta)) {
            unlink($thumbnail_ruta);
        }
        // Borrar categoría
        $post_eliminar_query = "DELETE from posts where id=$id LIMIT 1";
        $post_eliminar_resultado = mysqli_query($con, $post_eliminar_query);
        if (mysqli_errno($con)) {
            $_SESSION['eliminar-post'] = "Hubo un error al intentar eliminar la publicación";
        } else {
            $_SESSION['eliminar-post-ok'] = "Se ha eliminado la publicación.";
        }
    }
}

header('location: ' . ROOT_URL . 'admin/');
die();
