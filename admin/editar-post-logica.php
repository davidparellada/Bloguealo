<?php
require 'config/bd.php';

if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cuerpo = filter_var($_POST['cuerpo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $categoria_id = filter_var($_POST['categoria'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];
    $thumbnail_antigua = filter_var($_POST['thumbnail_antigua'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $destacado = filter_var($_POST['destacado'], FILTER_SANITIZE_NUMBER_INT);
    // destacado = 0 si el checkbox no estaba marcado y se envía unset
    $destacado = ($destacado == 1) ?: 0;

    //Validar inputs
    if (!$titulo) {
        $_SESSION['editar-post'] = "Por favor, introduce un título";
    } elseif (!$categoria_id) {
        $_SESSION['editar-post'] = "Por favor, selecciona una categoría";
    } elseif (!$cuerpo) {
        $_SESSION['editar-post'] = "Por favor, introduce el texto de tu post.";
    } else {
        // Cambiar thumbnails si se añade una nueva
        if ($thumbnail['name']) {
            // Borramos thumbnail antigua
            $thumbnail_antigua_ruta = '../images/' . $thumbnail_antigua;
            unlink($thumbnail_antigua_ruta);

            // Nueva thumbnail
            $time = time(); // Generamos número random para nombrar las imágenes subidas
            $thumbnail_nombre = $time . $thumbnail['name'];
            $thumbnail_tmp_nombre = $thumbnail['tmp_name'];
            $thumbnail_ruta_destino = '../images/' . $thumbnail_nombre;
            // 2mb tamaño máximo
            if ($thumbnail['size'] < 2000000) {
                // Subir imagen
                move_uploaded_file($thumbnail_tmp_nombre, $thumbnail_ruta_destino);
            } else {
                $_SESSION['editar-post'] = "Por favor, sube un archivo con tamaño inferior a 2mb";
            }
        }
    }
    if (isset($_SESSION['editar-post'])) {
        header('location: ' . ROOT_URL . 'admin/');
        die();
    } else {
        // Quitar otros destacados si  se quiere destacar este
        if ($destacado == 1) {
            $destacado_limpiar_query = "UPDATE posts SET destacado_check=0";
            $destacado_limpiar_resultado = mysqli_query($con, $destacado_limpiar_query);
        }
        // Cogemos el nombre de la foto más reciente para actualizarlo en la bd
        $thumbnail_actual = $thumbnail_nombre ?? $thumbnail_antigua;

        // Editamos el post
        $post_editar_query = "UPDATE posts SET titulo='$titulo', body='$cuerpo', thumbnail='$thumbnail_actual', categoria_id=$categoria_id, destacado_check=$destacado WHERE id=$id LIMIT 1";
        $post_editar_resultado = mysqli_query($con, $post_editar_query);
        if (mysqli_errno($con)) {
            $_SESSION['editar-post'] = "No se pudo actualizar la la publicación.";
        } else {
            $_SESSION['editar-post-ok'] = "Se ha actualizado la publicación.";
        }
    }
}
header('location: ' . ROOT_URL . 'admin/');
die();
