<!-- ===== Inicio del footer ===== -->
<footer>
  <div class="footer__redes">
    <a href="https://github.com/davidparellada/Bloguealo" target="_blank"><i class="uil uil-github"></i></a>
    <a href="https://www.youtube.com/" target="_blank"><i class="uil uil-youtube"></i></a>
  </div>

  <div class="contenedor footer__contenedor">
    <article>
      <h4>Categorías</h4>
      <!-- Fetch todas las categorías -->
      <?php
      $categorias_all_query = "SELECT * FROM categorias";
      $categorias_all_resultado = mysqli_query($con, $categorias_all_query);
      ?>
      <ul>
        <?php while ($categoria_loop = mysqli_fetch_assoc($categorias_all_resultado)) : ?>
          <li><a href="<?= ROOT_URL ?>categoria-posts.php?id=<?= $categoria_loop['id'] ?>"><?= $categoria_loop['titulo'] ?></a></li>
        <?php endwhile ?>
      </ul>
    </article>
    <article>
      <h4>Nuestra empresa</h4>
      <ul>
        <li><a href="<?= ROOT_URL ?>blog.php">Blog</a></li>
        <li><a href="<?= ROOT_URL ?>about.php">Acerca de</a></li>
        <li><a href="<?= ROOT_URL ?>servicios.php">Servicios</a></li>
        <li><a href="<?= ROOT_URL ?>contacto.php">Contacto</a></li>
      </ul>
    </article>
  </div>
  <div class="footer__copyright">
    <small>Copyright &copy; Bloguealo</small>
  </div>
</footer>
<!-- ===== Fin del footer ===== -->
<script src="<?= ROOT_URL ?>js/main.js"></script>
</body>

</html>