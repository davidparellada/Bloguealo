<?php
include 'partials/header.php';

// Fetch posts con el id de la categoría
if (isset($_GET['id'])) {
  $categoria_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
  $posts_fetch_query = "SELECT * FROM posts WHERE categoria_id=$categoria_id ORDER BY fecha_hora DESC";
  $posts_fetch_resultado = mysqli_query($con, $posts_fetch_query);
} else {
  header('location: ' . ROOT_URL . 'blog.php');
  die();
}
?>

<!--== Header de categoría ==-->
<header class="categoria__titulo">
  <!-- Fetch nombre de la categoría -->
  <?php
  $categoria_query = "SELECT * FROM categorias WHERE id=$categoria_id";
  $categoria_resultado = mysqli_query($con, $categoria_query);
  $categoria = mysqli_fetch_assoc($categoria_resultado);
  echo "<h2>{$categoria['titulo']}</h2>";
  ?>
</header>
<!-- ===== Inicio de la sección de posts===== -->
<section class="posts">
  <div class="contenedor posts__contenedor">
    <?php while ($post = mysqli_fetch_assoc($posts_fetch_resultado)) : ?>
      <article class="post">
        <div class="post__thumbnail">
          <img src="./images/<?= $post['thumbnail'] ?>" />
        </div>
        <div class="post__info">
          <h3 class="post__titulo">
            <a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>"><?= $post['titulo'] ?></a>
          </h3>
          <p class="post__body">
            <?= substr($post['body'], 0, 200) ?>...
          </p>
          <div class="post__autor">
            <!-- Fetch autor -->
            <?php
            $autor_id = $post['autor_id'];
            $autor_query = "SELECT * FROM usuarios WHERE id=$autor_id";
            $autor_resultado = mysqli_query($con, $autor_query);
            $autor = mysqli_fetch_assoc($autor_resultado);
            ?>
            <div class="post__autor-avatar">
              <img src="./images/<?= $autor['avatar'] ?>" />
            </div>
            <div class="post__autor-info">
              <h5>Autor: <?= "{$autor['nombre']} {$autor['apellido']}" ?></h5>
              <small><?= date("d M, Y - H:i", strtotime($post['fecha_hora'])) ?></small>
            </div>
          </div>
        </div>
      </article>
    <?php endwhile ?>
  </div>
</section>
<!-- ===== Fin de la sección de posts ===== -->

<!-- ===== Inicio de la sección de categorías ===== -->
<section class="categoria__btns">
  <div class="contenedor categoria__btns-contenedor">
    <!-- Fetch todas las categorías -->
    <?php
    $categorias_all_query = "SELECT * FROM categorias";
    $categorias_all_resultado = mysqli_query($con, $categorias_all_query);
    ?>
    <?php while ($categoria_loop = mysqli_fetch_assoc($categorias_all_resultado)) : ?>
      <a href="<?= ROOT_URL ?>categoria-posts.php?id=<?= $categoria_loop['id'] ?>" class="categoria__btn"><?= $categoria_loop['titulo'] ?></a>
    <?php endwhile ?>
  </div>
</section>
<!-- ===== Fin de la sección de categorías ===== -->

<?php
include 'partials/footer.php';
?>