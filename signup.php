<?php
require 'config/const.php';

// Recuperar datos de envío previo si existen
$nombre = $_SESSION['signup_datos']['nombre'] ?? null;
$apellido = $_SESSION['signup_datos']['apellido'] ?? null;
$usuario = $_SESSION['signup_datos']['usuario'] ?? null;
$email = $_SESSION['signup_datos']['email'] ?? null;
$crearpass = $_SESSION['signup_datos']['crearpass'] ?? null;
$confirmarpass = $_SESSION['signup_datos']['confirmarpass'] ?? null;

unset($_SESSION['signup_datos']);
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
  <section class="form__seccion">
    <div class="contenedor form__seccion-contenedor">
      <h2>Registro</h2>
      <?php if (isset($_SESSION['signup'])) : ?>
        <div class="mensaje__alerta error">
          <p>
            <?php echo $_SESSION['signup'];
            unset($_SESSION['signup']); ?>
          </p>
        </div>
      <?php endif ?>
      <form action="<?= ROOT_URL ?>signup-logica.php" method="POST" class="formulario" enctype="multipart/form-data">
        <input type="text" name="nombre" value="<?= $nombre ?>" placeholder="Nombre" />
        <input type="text" name="apellido" value="<?= $apellido ?>" placeholder="Apellido" />
        <input type="text" name="usuario" value="<?= $usuario ?>" placeholder="Nombre de usuario" />
        <input type="email" name="email" value="<?= $email ?>" placeholder="Correo" />
        <input type="password" name="crearpass" value="<?= $crearpass ?>" placeholder="Contraseña" />
        <input type="password" name="confirmarpass" value="<?= $confirmarpass ?>" placeholder="Confirmar contraseña" />
        <div class="form__subir">
          <label for="avatar">Avatar</label>
          <input type="file" name="avatar" id="avatar" />
        </div>
        <button type="submit" name="submit" class="btn">Registrar</button>
        <small><a href="signin.php">Ya tengo cuenta una de bloguéalo</a></small>
      </form>
    </div>
  </section>
</body>

</html>