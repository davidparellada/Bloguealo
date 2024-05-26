<?php
include 'partials/header.php';

// Recuperar datos de envío previo si existen
$titulo = $_SESSION['add-categoria_datos']['titulo'] ?? null;
$descripcion = $_SESSION['add-categoria_datos']['descripcion'] ?? null;

unset($_SESSION['add-categoria_datos'])
?>
<section class="form__seccion">
  <div class="contenedor form__seccion-contenedor">
    <h2>Añadir categoría</h2>
    <?php if (isset($_SESSION['add-categoria'])) : ?>
      <div class="mensaje__alerta error">
        <p><?= $_SESSION['add-categoria'];
            unset($_SESSION['add-categoria']); ?></p>
      </div>
    <?php endif ?>
    <form class="formulario" action="<?= ROOT_URL ?>admin/add-categoria-logica.php" method="POST">
      <input type="text" value="<?= $titulo ?>" name="titulo" placeholder="Título de la categoría" />
      <textarea rows="4" name="descripcion" placeholder="Descripción"><?= $descripcion ?></textarea>
      <button type="submit" name="submit" class="btn">Añadir</button>
    </form>
  </div>
</section>
<?php
include '../partials/footer.php'
?>