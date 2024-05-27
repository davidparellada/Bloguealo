<?php
require 'config/bd.php';

if (isset($_POST['submit'])) {
    $titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cuerpo = filter_var($_POST['cuerpo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $categoria_id = filter_var($_POST['categoria'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];

    $destacado = filter_var($_POST['destacado'], FILTER_SANITIZE_NUMBER_INT);
    // destacado = 0 si el checkbox no estaba marcado y se envía unset
    $destacado = ($destacado == 1) ?: 0;
    // Autor id de la sesión iniciada
    $autor_id = $_SESSION['usuario-id'];

    //Validar inputs
    if (!$titulo) {
        $_SESSION['add-post'] = "Por favor, introduce un título";
    } elseif (!$categoria_id) {
        $_SESSION['add-post'] = "Por favor, selecciona una categoría";
    } elseif (!$cuerpo) {
        $_SESSION['add-post'] = "Por favor, introduce el texto de tu post.";
    } elseif (!$thumbnail['name']) {
        $_SESSION['add-post'] = "Por favor, sube una foto para el post";
    } else {
        $time = time(); // Generamos número random para nombrar las imágenes subidas
        $thumbnail_nombre = $time . $thumbnail['name'];
        $thumbnail_tmp_nombre = $thumbnail['tmp_name'];
        $thumbnail_ruta_destino = '../images/' . $thumbnail_nombre;
        // 1mb tamaño máximo
        if ($thumbnail['size'] < 2000000) {
            // Subir imagen
            move_uploaded_file($thumbnail_tmp_nombre, $thumbnail_ruta_destino);
        } else {
            $_SESSION['add-post'] = "Por favor, sube un archivo con tamaño inferior a 2mb";
        }
    }

    // Si hay error redirigimos a la página de añadir post
    if (isset($_SESSION['add-post'])) {
        $_SESSION['add-post_datos'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-post.php');
        die();
    } else {
        // Quitar otros destacados si  se quiere destacar este
        if ($destacado == 1) {
            $destacado_limpiar_query = "UPDATE posts SET destacado_check=0";
            $destacado_limpiar_resultado = mysqli_query($con, $destacado_limpiar_query);
        }
        // Añadimos el post
        $post_insertar_query = "INSERT INTO posts (titulo, body, thumbnail, categoria_id, autor_id, destacado_check) VALUES ('$titulo', '$cuerpo', '$thumbnail_nombre', $categoria_id, $autor_id, $destacado)";
        $post_insertar_result = mysqli_query($con, $post_insertar_query);
        if (!mysqli_errno($con)) {
            // Se ha añadido correctamente y redirecciona a gestionar categorías
            $_SESSION['add-post-ok'] = "Se ha añadido la publicación";
            header('location: ' . ROOT_URL . 'admin/');
            die();
        }
    }
} else {
    // Vuelve a la página de añadir post
    header('location: ' . ROOT_URL . 'admin/add-post.php');
    die();
}
