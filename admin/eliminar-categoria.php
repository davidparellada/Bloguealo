<?php
require 'config/bd.php';

// Fetch
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);


    // Descategorizar los post de la categoría a eliminar
    $categoria_actualizar_query = "UPDATE posts SET categoria_id=5 WHERE categoria_id=$id";
    $categoria_actualizar_resultado = mysqli_query($con, $categoria_actualizar_query);
    if (!mysqli_errno($con)) {

        // Borrar categoría
        $query = "SELECT * FROM categorias WHERE id=$id";
        $result = mysqli_query($con, $query);
        $categoria = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) == 1) {
            $categoria_eliminar_query = "DELETE from categorias where id=$id LIMIT 1";
            $categoria_eliminar_resultado = mysqli_query($con, $categoria_eliminar_query);
            if (mysqli_errno($con)) {
                $_SESSION['eliminar-categoria'] = "Hubo un error al intentar eliminar la categoría.";
            } else {
                $_SESSION['eliminar-categoria-ok'] = "Se ha eliminado la categoría $titulo.";
            }
        }
    }
}

header('location: ' . ROOT_URL . 'admin/gestionar-categorias.php');
die();
