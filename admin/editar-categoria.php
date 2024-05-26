<?php
include 'partials/header.php';
// Coge id de la url o devuelve a gestionar categorías
if (isset($_GET['id'])) {
  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
  $query = "SELECT * FROM categorias WHERE id=$id";
  $result = mysqli_query($con, $query);
  if (mysqli_num_rows($result) == 1) {
    $categoria = mysqli_fetch_assoc($result);
  }
} else {
  header('location: ' . ROOT_URL . 'admin/gestionar-categorias.php');
  die();
}

?>
<section class="form__seccion">
  <div class="contenedor form__seccion-contenedor">
    <h2>Editar categoría</h2>
    <form class="formulario" action="<?= ROOT_URL ?>admin/editar-categoria-logica.php" method="POST">
      <input type="hidden" name="id" value="<?= $categoria['id'] ?>" />
      <input type="text" name="titulo" value="<?= $categoria['titulo'] ?>" placeholder="Nombre de la categoría" />
      <textarea rows="4" name="descripcion" placeholder="Descripción"><?= $categoria['descripcion'] ?></textarea>
      <button type="submit" name="submit" class="btn">Editar</button>
    </form>
  </div>
</section>
<?php
include '../partials/footer.php'
?>