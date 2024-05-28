<?php
require 'partials/header.php';

// Comprobar que se haya buscado algo
if (isset($_GET['busqueda']) && isset($_GET['submit'])) {
    $busqueda = filter_var($_GET['busqueda'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $busqueda_query = "SELECT * FROM posts WHERE titulo LIKE '%$busqueda%' ORDER BY fecha_hora DESC";
    $posts = mysqli_query($con, $busqueda_query);
} else {
    header('location: ' . ROOT_URL . 'blog.php');
    die();
}
?>

<?php if (mysqli_num_rows($posts) > 0) : ?>
    <!-- ===== Inicio de la sección de posts===== -->
    <section class="posts seccion__margen-extra">
        <div class="contenedor posts__contenedor">
            <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
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
<?php else : ?>
    <div class="mensaje__alerta busqueda margen error">
        <p>No se han encontrado resultados</p>
    </div>
<?php endif ?>
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