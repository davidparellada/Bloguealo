<?php
include 'partials/header.php';

// Fetch post destacado
$destacado_query = "SELECT * FROM posts WHERE destacado_check=1";
$destacado_resultado = mysqli_query($con, $destacado_query);
$destacado = mysqli_fetch_assoc($destacado_resultado);

// Fetch los 9 post más recientes
$posts_query = "SELECT * FROM posts ORDER by fecha_hora DESC LIMIT 9";
$posts_resultado = mysqli_query($con, $posts_query);
?>


<!-- ===== Inicio de la sección de post destacado ===== -->
<?php if (mysqli_num_rows($destacado_resultado) == 1) : ?>
  <section class="destacado">
    <div class="contenedor destacado__contenedor">
      <div class="post__thumbnail">
        <img src="./images/<?= $destacado['thumbnail'] ?>" />
      </div>
      <!-- Fetch nombre de la categoría -->
      <?php
      $categoria_id = $destacado['categoria_id'];
      $categoria_query = "SELECT * FROM categorias WHERE id=$categoria_id";
      $categoria_resultado = mysqli_query($con, $categoria_query);
      $categoria = mysqli_fetch_assoc($categoria_resultado);
      $categoria_titulo = $categoria['titulo'];
      ?>
      <div class="post__info">
        <a href="<?= ROOT_URL ?>categoria-posts.php?id=<?= $categoria_id ?>" class="categoria__btn"><?= $categoria_titulo ?></a>
        <h2 class="post__titulo">
          <a href="<?= ROOT_URL ?>post.php?id=<?= $destacado['id'] ?>"><?= $destacado['titulo'] ?></a>
        </h2>
        <p class="post__body">
          <?= substr($destacado['body'], 0, 300) ?>...
        </p>
        <div class="post__autor">
          <!-- Fetch autor -->
          <?php
          $autor_id = $destacado['autor_id'];
          $autor_query = "SELECT * FROM usuarios WHERE id=$autor_id";
          $autor_resultado = mysqli_query($con, $autor_query);
          $autor = mysqli_fetch_assoc($autor_resultado);
          ?>
          <div class="post__autor-avatar">
            <img src="./images/<?= $autor['avatar'] ?>" />
          </div>
          <div class="post__autor-info">
            <h5>Autor: <?= "{$autor['nombre']} {$autor['apellido']}" ?></h5>
            <small><?= date("d M, Y - H:i", strtotime($destacado['fecha_hora'])) ?></small>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif ?>
<!--======= Fin de la sección de post destacado -->

<!-- ===== Inicio de la sección de posts===== -->
<section class="posts <?= $destacado ? '' : 'seccion__margen-extra' ?>">
  <div class="contenedor posts__contenedor">
    <?php while ($post = mysqli_fetch_assoc($posts_resultado)) : ?>
      <article class="post">
        <div class="post__thumbnail">
          <img src="./images/<?= $post['thumbnail'] ?>" />
        </div>
        <div class="post__info">
          <!-- Fetch nombre de la categoría -->
          <?php
          $categoria_id = $post['categoria_id'];
          $categoria_query = "SELECT * FROM categorias WHERE id=$categoria_id";
          $categoria_resultado = mysqli_query($con, $categoria_query);
          $categoria = mysqli_fetch_assoc($categoria_resultado);
          ?>
          <a href="<?= ROOT_URL ?>categoria-posts.php?id=<?= $post['categoria_id'] ?>" class="categoria__btn"><?= $categoria['titulo'] ?></a>
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
include 'partials/footer.php'
?>