<?php
require 'config/bd.php';

if (isset($_POST['submit'])) {
    $titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $descripcion = filter_var($_POST['descripcion'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$titulo) {
        $_SESSION['add-categoria'] = "Por favor, introduce un título";
    } elseif (!$descripcion) {
        $_SESSION['add-categoria'] = "Por favor, introduce la descripción.";
    }

    // Si hay error redirigimos a la página de añadir categoría
    if (isset($_SESSION['add-categoria'])) {
        $_SESSION['add-categoria_datos'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-categoria.php');
        die();
    } else {
        // Insertamos la categoría en la bd
        $categoria_insertar_query = "INSERT INTO categorias (titulo, descripcion) VALUES ('$titulo', '$descripcion')";
        $categoria_insertar_resultado = mysqli_query($con, $categoria_insertar_query);
        if (!mysqli_errno($con)) {
            // Se ha añadido correctamente y redirecciona a gestionar categorías
            $_SESSION['add-categoria-ok'] = "Se ha añadido la categoria $titulo";
            header('location: ' . ROOT_URL . 'admin/gestionar-categorias.php');
            die();
        }
    }
} else {
    // Vuelve a la página de añadir categoría
    header('location: ' . ROOT_URL . 'admin/add-categoria.php');
    die();
}
