<?php
include 'partials/header.php';

// Recuperar datos de envío previo si existen
$titulo = $_SESSION['add-post_datos']['titulo'] ?? null;
$cuerpo = $_SESSION['add-post_datos']['cuerpo'] ?? null;
unset($_SESSION['add-post_datos']);

// Fetch categorías de la bd
$gestionarcategorias_fetch_query = "SELECT * FROM categorias ORDER BY titulo";
$gestionarcategorias_fetch_result = mysqli_query($con, $gestionarcategorias_fetch_query);
?>

<!-- Mostrar errores -->
<section class="form__seccion">
  <div class="contenedor form__seccion-contenedor">
    <h2>Añadir publicación</h2>
    <?php if (isset($_SESSION['add-post'])) : ?>
      <div class="mensaje__alerta error">
        <p>
          <?php echo $_SESSION['add-post'];
          unset($_SESSION['add-post']); ?>
        </p>
      </div>
    <?php endif ?>

    <form class="formulario" action="<?= ROOT_URL ?>admin/add-post-logica.php" enctype="multipart/form-data" method="POST">
      <input type="text" name="titulo" value="<?= $titulo ?>" placeholder="Título" />
      <label for="select">Selecciona categoría</label>
      <select name="categoria">
        <?php while ($categoria = mysqli_fetch_assoc($gestionarcategorias_fetch_result)) : ?>
          <option value="<?= $categoria['id'] ?>"><?= $categoria['titulo'] ?></option>
        <?php endwhile ?>
      </select>
      <textarea name="cuerpo" rows=" 12" placeholder="Cuerpo"><?= $cuerpo ?></textarea>
      <div class="form__subir">
        <label for="thumbnail">Añadir foto</label>
        <input type="file" name="thumbnail" id="thumbnail" accept="image/jpg,image/png,image/jpeg">
      </div>
      <!-- Podemos marcar destacado si el usuario logueado es admin -->
      <?php if (isset($_SESSION['usuario_admin'])) : ?>
        <div class="form__marcar">
          <input type="checkbox" name="destacado" id="destacado" value="1" checked>
          <label for "destacado">Mostrar como destacado</label>
        </div>
      <?php endif ?>
      <button type="submit" name="submit" class="btn">Añadir</button>
    </form>
  </div>
</section>
<?php
include '../partials/footer.php'
?>