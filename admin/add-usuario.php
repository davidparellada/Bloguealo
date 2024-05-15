<?php
include 'partials/header.php';

// Recuperar datos de envío previo si existen
$nombre = $_SESSION['add-usuario_datos']['nombre'] ?? null;
$apellido = $_SESSION['add-usuario_datos']['apellido'] ?? null;
$usuario = $_SESSION['add-usuario_datos']['usuario'] ?? null;
$email = $_SESSION['add-usuario_datos']['email'] ?? null;
$crearpass = $_SESSION['add-usuario_datos']['crearpass'] ?? null;
$confirmarpass = $_SESSION['add-usuario_datos']['confirmarpass'] ?? null;

unset($_SESSION['add-usuario_datos'])
?>

<section class="form__seccion">
  <div class="contenedor form__seccion-contenedor">
    <h2>Crear usuario</h2>
    <?php if (isset($_SESSION['add-usuario'])) : ?>
      <div class="mensaje__alerta error">
        <p>
          <?php echo $_SESSION['add-usuario'];
          unset($_SESSION['add-usuario']); ?>
        </p>
      </div>
    <?php endif ?>
    <form action="<?= ROOT_URL ?>admin/add-usuario-logica.php" class="formulario" enctype="multipart/form-data" method="POST">
      <input type="text" name="nombre" placeholder="Nombre" value="<?= $nombre ?>" />
      <input type="text" name="apellido" placeholder="Apellidos" value="<?= $apellido ?>" />
      <input type="text" name="usuario" placeholder="Nombre de usuario" value="<?= $usuario ?>" />
      <input type="text" name="email" placeholder="Correo" value="<?= $email ?>" />
      <input type="password" name="crearpass" placeholder="Contraseña" value="<?= $crearpass ?>" />
      <input type="password" name="confirmarpass" placeholder="Confirmar contraseña" value="<?= $confirmarpass ?>" />
      <select name="rol">
        <option value="0">Autor</option>
        <option value="1">Admin</option>
      </select>
      <div class="form__subir">
        <label for="avatar">Avatar</label>
        <input type="file" name="avatar" accept="image/jpg,image/png,image/jpeg" id="avatar" />
      </div>
      <button type="submit" name="submit" class="btn">Registrar</button>
    </form>
  </div>
</section>
<?php
include '../partials/footer.php'
?>