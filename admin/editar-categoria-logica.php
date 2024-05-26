<?php
require 'config/bd.php';

if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $descripcion = filter_var($_POST['descripcion'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Validar inputs no falsy
    if (!$titulo) {
        $_SESSION['editar-categoria'] = "No se pudo actualizar la categoria. Por favor, proporciona un título.";
    } elseif (!$descripcion) {
        $_SESSION['editar-categoria'] = "No se pudo actualizar el categoria. Por favor, proporciona una descripción.";
    } else {
        // Editar categoría
        $categoria_editar_query = "UPDATE categorias SET titulo='$titulo', descripcion='$descripcion' WHERE id=$id LIMIT 1";
        $categoria_editar_resultado = mysqli_query($con, $categoria_editar_query);

        if (mysqli_errno($con)) {
            $_SESSION['editar-categoria'] = "No se pudo actualizar la categoría.";
        } else {
            $_SESSION['editar-categoria-ok'] = "Se ha actualizado la categoría $titulo.";
        }
    }
}
header('location: ' . ROOT_URL . 'admin/gestionar-categorias.php');
die();
