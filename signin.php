<?php
require 'config/bd.php';

// Recuperar datos de envío previo si existen
$usuario_email = $_SESSION['signin_datos']['usuario_email'] ?? null;
$pass = $_SESSION['signin_datos']['pass'] ?? null;

unset($_SESSION['signin_datos']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blog responsivo</title>
  <!--Estilos-->
  <link rel="stylesheet" href="css/styles.css" />
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
      <h2>Iniciar sesión</h2>
      <?php if (isset($_SESSION['signup-ok'])) : ?>
        <div class="mensaje__alerta ok">
          <p>
            <?= [$_SESSION['signup-ok']];
            unset($_SESSION['signup-ok']);
            ?>
          </p>
        </div>

      <?php elseif (isset($_SESSION['signin'])) : ?>
        <div class="mensaje__alerta error">
          <p>
            <?php echo $_SESSION['signin'];
            unset($_SESSION['signin']); ?>
          </p>
        </div>
      <?php endif ?>

      <form class="formulario" action="<?= ROOT_URL ?>signin-logica.php" method="POST">
        <input type="text" name="usuario_email" value="<?= $usuario_email ?>" placeholder="Nombre de usuario o correo" />
        <input type="password" name="pass" value="<?= $pass ?>" placeholder="Contraseña" />
        <button type="submit" name="submit" class="btn">Iniciar sesión</button>
        <small><a href="signup.php">No tengo cuenta de bloguéalo</a></small>
      </form>
    </div>
  </section>
</body>

</html>