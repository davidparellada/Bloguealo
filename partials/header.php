<?php
require $_SERVER['DOCUMENT_ROOT'] . '/Bloguealo/config/bd.php';

// Fetch el campo avatar que tiene el nombre del archivo
if (isset($_SESSION['usuario-id'])) {
  $id = filter_var($_SESSION['usuario-id'], FILTER_SANITIZE_NUMBER_INT);
  $avatar_fetch_query = "SELECT avatar from usuarios where id=$id";
  $avatar_fetch_result = mysqli_query($con, $avatar_fetch_query);
  $avatar = mysqli_fetch_assoc($avatar_fetch_result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blog responsivo</title>
  <!--Estilos-->
  <link rel="stylesheet" href="<?= ROOT_URL ?>css/styles.css" />
  <!--CDN Iconscout-->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
  <!--Fuente de google Montserrat-->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
</head>

<body>
  <!-- ===== Inicio de la sección del nav ===== -->
  <nav>
    <div class="contenedor nav__contenedor">
      <a href="<?= ROOT_URL ?>" class="nav__logo">Bloguéalo</a>
      <ul class="nav__items">
        <li><a href="<?= ROOT_URL ?>blog.php">Blog</a></li>
        <li><a href="<?= ROOT_URL ?>about.php">Acerca de</a></li>
        <li><a href="<?= ROOT_URL ?>servicios.php">Servicios</a></li>
        <li><a href="<?= ROOT_URL ?>contacto.php">Contacto</a></li>
        <?php if (isset($_SESSION['usuario-id'])) : ?>
          <li class="nav__perfil">
            <div class="avatar">
              <img src="<?= ROOT_URL . 'images/' . $avatar['avatar'] ?>" />
            </div>
            <ul>
              <li><a href="<?= ROOT_URL ?>admin/index.php">Panel</a></li>
              <li><a href="<?= ROOT_URL ?>logout.php">Logout</a></li>
            </ul>
          </li>
        <?php else : ?>
          <li><a href="<?= ROOT_URL ?>signin.php">Iniciar sesión</a></li>
        <?php endif ?>
      </ul>

      <button id="abrir__nav-btn"><i class="uil uil-bars"></i></button>
      <button id="cerrar__nav-btn"><i class="uil uil-multiply"></i></button>
    </div>
  </nav>
  <!--======== Fin de la sección del nav ========-->