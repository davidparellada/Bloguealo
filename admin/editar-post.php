<?php
include 'partials/header.php';

// Coge id de la url o devuelve a gestionar usuarios
if (isset($_GET['id'])) {
  // Fetch categorías para el select
  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
  $categorias_fetch_query = "SELECT * FROM categorias";
  $categorias_fetch_resultado = mysqli_query($con, $categorias_fetch_query);

  // Fetch datos del post
  $post_fetch_query = "SELECT * FROM posts WHERE id=$id";
  $post_fetch_resultado = mysqli_query($con, $post_fetch_query);
  $post = mysqli_fetch_assoc($post_fetch_resultado);
} else {
  header('location: ' . ROOT_URL . 'admin/');
  die();
}
?>
<section class="form__seccion">
  <div class="contenedor form__seccion-contenedor">
    <h2>Editar publicación</h2>
    <form class="formulario" action="<?= ROOT_URL ?>admin/editar-post-logica.php" enctype="multipart/form-data" method="POST">
      <input type="hidden" name="id" value="<?= $post['id'] ?>" />
      <input type="hidden" name="thumbnail_antigua" value="<?= $post['thumbnail'] ?>">
      <input type="text" name="titulo" value="<?= $post['titulo'] ?>" placeholder="Título" />
      <label for="select">Selecciona categoría</label>
      <select name="categoria">
        <?php while ($categoria = mysqli_fetch_assoc($categorias_fetch_resultado)) : ?>
          <option value="<?= $categoria['id'] ?>"><?= $categoria['titulo'] ?></option>
        <?php endwhile ?>
      </select>
      <textarea rows="12" name="cuerpo" placeholder="Cuerpo"><?= $post['body'] ?></textarea>
      <div class="form__subir">
        <label for="foto">Cambiar foto</label>
        <input type="file" name="thumbnail" id="foto" accept="image/jpg,image/png,image/jpeg">
      </div>
      <div class="form__marcar">
        <input type="checkbox" name="destacado" id="destacado" value="1" checked>
        <label for "destacado">Mostrar como destacado</label>
      </div>
      <button type="submit" name="submit" class="btn">Editar</button>
    </form>
  </div>
</section>
<?php
include '../partials/footer.php'
?>