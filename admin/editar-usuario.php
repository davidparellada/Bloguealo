<?php
include 'partials/header.php';

// Coge id de la url o devuelve a gestionar usuarios
if (isset($_GET['id'])) {
  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
  $query = "SELECT * FROM usuarios WHERE id=$id";
  $result = mysqli_query($con, $query);
  $usuario = mysqli_fetch_assoc($result);
} else {
  header('location: ' . ROOT_URL . 'admin/gestionar-usuarios.php');
  die();
}
?>


<section class="form__seccion">
  <div class="contenedor form__seccion-contenedor">
    <h2>Editar usuario</h2>
    <form class="formulario" action="<?= ROOT_URL ?>admin/editar-usuario-logica.php" method="POST">
      <input type="hidden" name="id" value="<?= $usuario['id'] ?>" />
      <input type="text" value="<?= $usuario['nombre'] ?>" name="nombre" placeholder="Nombre" />
      <input type="text" value="<?= $usuario['apellido'] ?>" name="apellido" placeholder="Apellidos" />
      <select name="rol">
        <option value="0">Autor</option>
        <option value="1">Admin</option>
      </select>
      <button type="submit" name="submit" class="btn">Editar</button>
    </form>
  </div>
</section>
<?php
include '../partials/footer.php'
?>