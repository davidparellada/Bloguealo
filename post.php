<?php
include 'partials/header.php';

// Fetch post con el id de la url
if (isset($_GET['id'])) {
  $post_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
  $post_fetch_query = "SELECT * FROM posts WHERE id=$post_id";
  $post_fetch_resultado = mysqli_query($con, $post_fetch_query);
  $post = mysqli_fetch_assoc($post_fetch_resultado);
} else {
  header('location: ' . ROOT_URL . 'blog.php');
  die();
}
?>

<!-- ===== Inicio de la sección del post ===== -->
<section class="post-full">
  <div class="contenedor post-full__contenedor">
    <h2><?= $post['titulo'] ?></h2>
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
    <div class="post-full__thumbnail">
      <img src="./images/<?= $post['thumbnail'] ?>" />
    </div>
    <p> <?= $post['body'] ?></p>
  </div>
</section>
<!-- ===== Fin de la sección del post ===== -->

<?php
include 'partials/footer.php';
?>