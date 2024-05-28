<?php
include 'partials/header.php';

// Fetch posts del usuario actual
$id_actual = $_SESSION['usuario-id'];
$gestionarposts_fetch_query = "SELECT id, titulo, categoria_id FROM posts WHERE autor_id=$id_actual ORDER BY id DESC";
$gestionarposts_fetch_result = mysqli_query($con, $gestionarposts_fetch_query);
?>

<section class="panel">
  <!-- Alerta de añadir post-->
  <?php if (isset($_SESSION['add-post-ok'])) : ?>
    <div class="mensaje__alerta ok">
      <p>
        <?= $_SESSION['add-post-ok'];
        unset($_SESSION['add-post-ok']);
        ?>
      </p>
    </div>
    <!-- Mensaje de éxito/error al editar usuario -->
  <?php elseif (isset($_SESSION['editar-post-ok'])) : ?>
    <div class="mensaje__alerta ok">
      <p>
        <?= $_SESSION['editar-post-ok'];
        unset($_SESSION['editar-post-ok']);
        ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['editar-post'])) : ?>
    <div class="mensaje__alerta error">
      <p>
        <?= $_SESSION['editar-post'];
        unset($_SESSION['editar-post']);
        ?>
      </p>
    </div>
    <!-- Mensaje de éxito/error al eliminar categoría -->
  <?php elseif (isset($_SESSION['eliminar-post-ok'])) : ?>
    <div class="mensaje__alerta ok">
      <p>
        <?= $_SESSION['eliminar-post-ok'];
        unset($_SESSION['eliminar-post-ok']);
        ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['eliminar-post'])) : ?>
    <div class="mensaje__alerta error">
      <p>
        <?= $_SESSION['eliminar-post'];
        unset($_SESSION['eliminar-post']);
        ?>
      </p>
    </div>
  <?php endif ?>

  <div class="contenedor panel__contenedor">
    <aside>
      <ul>
        <li>
          <a href="index.php" class="activo"><i class="uil uil-clipboard-blank"></i>
            <h5>Panel</h5>
          </a>
        </li>
        <li>
          <a href="add-post.php"><i class="uil uil-pen"></i>
            <h5>Añadir publicación</h5>
          </a>
        </li>
        <?php if (isset($_SESSION['usuario_admin'])) : ?>
          <li>
            <a href="add-usuario.php"><i class="uil uil-user-plus"></i>
              <h5>Añadir usuario</h5>
            </a>
          </li>
          <li>
            <a href="gestionar-usuarios.php "><i class="uil uil-users-alt"></i>
              <h5>Gestionar usuarios</h5>
            </a>
          </li>
          <li>
            <a href="add-categoria.php"><i class="uil uil-tag-alt"></i>
              <h5>Añadir categoría</h5>
            </a>
          </li>
          <li>
            <a href="gestionar-categorias.php"><i class="uil uil-edit"></i>
              <h5>Gestionar categorías</h5>
            </a>
          </li>
        <?php endif ?>
      </ul>
    </aside>
    <main>
      <h2>Gestionar posts</h2>
      <table>
        <thead>
          <tr>
            <th>Título</th>
            <th>Categoría</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($post = mysqli_fetch_assoc($gestionarposts_fetch_result)) : ?>
            <!-- fetch titulo de categoría -->
            <?php
            $categoria_id = $post['categoria_id'];
            $categoria_titulo_query = "SELECT titulo FROM categorias WHERE id=$categoria_id";
            $categoria_titulo_result = mysqli_query($con, $categoria_titulo_query);
            $categoria = mysqli_fetch_assoc($categoria_titulo_result);
            ?>
            <tr>
              <td><?= $post['titulo'] ?></td>
              <td><?= $categoria['titulo'] ?></td>
              <td>
                <a href="<?= ROOT_URL ?>admin/editar-post.php?id=<?= $post['id'] ?>" class="btn mini">Editar</a>
              </td>
              <td>
                <a href="<?= ROOT_URL ?>admin/eliminar-post.php?id=<?= $post['id'] ?>" class="btn mini rojo">Eliminar</a>
              </td>
            </tr>
          <?php endwhile ?>
        </tbody>
      </table>
    </main>
  </div>
</section>
<?php
include '../partials/footer.php'
?>