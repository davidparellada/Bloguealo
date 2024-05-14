<?php
require 'config/bd.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog responsivo</title>
    <!--Estilos-->
    <link rel="stylesheet" href="<?= ROOT_URL?>css/styles.css" />
    <!--CDN Iconscout-->
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.8/css/line.css"
    />
    <!--Fuente de google Montserrat-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- ===== Inicio de la sección del nav ===== -->
    <nav>
      <div class="contenedor nav__contenedor">
        <a href="<?= ROOT_URL?>" class="nav__logo">Bloguéalo</a>
        <ul class="nav__items">
          <li><a href="<?= ROOT_URL?>blog.php">Blog</a></li>
          <li><a href="<?= ROOT_URL?>about.php">Acerca de</a></li>
          <li><a href="<?= ROOT_URL?>servicios.php">Servicios</a></li>
          <li><a href="<?= ROOT_URL?>contacto.php">Contacto</a></li>
          <!--<li><a href="<?= ROOT_URL?>signin.php">Iniciar sesión</a></li>-->
          <li class="nav__perfil">
            <div class="avatar">
              <img src="images/avatar1.jpg" />
            </div>
            <ul>
              <li><a href="<?= ROOT_URL?>admin/index.php">Panel</a></li>
              <li><a href="<?= ROOT_URL?>logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>

        <button id="abrir__nav-btn"><i class="uil uil-bars"></i></button>
        <button id="cerrar__nav-btn"><i class="uil uil-multiply"></i></button>
      </div>
    </nav>
    <!--======== Fin de la sección del nav ========-->
