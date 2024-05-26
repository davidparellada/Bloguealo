<?php
include 'partials/header.php';

// Fetch categorías de la bd
$gestionarcategorias_fetch_query = "SELECT * FROM categorias ORDER BY titulo";
$gestionarcategorias_fetch_result = mysqli_query($con, $gestionarcategorias_fetch_query);
?>

<section class="panel">
  <?php if (isset($_SESSION['add-categoria-ok'])) : ?>
    <div class="mensaje__alerta ok">
      <p>
        <?= $_SESSION['add-categoria-ok'];
        unset($_SESSION['add-categoria-ok']);
        ?>
      </p>
    </div>
    <!-- Mensaje de éxito/error al editar usuario -->
  <?php elseif (isset($_SESSION['editar-categoria-ok'])) : ?>
    <div class="mensaje__alerta ok">
      <p>
        <?= $_SESSION['editar-categoria-ok'];
        unset($_SESSION['editar-categoria-ok']);
        ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['editar-categoria'])) : ?>
    <div class="mensaje__alerta error">
      <p>
        <?= $_SESSION['editar-categoria'];
        unset($_SESSION['editar-categoria']);
        ?>
      </p>
    </div>
    <!-- Mensaje de éxito/error al eliminar categoría -->
  <?php elseif (isset($_SESSION['eliminar-categoria-ok'])) : ?>
    <div class="mensaje__alerta ok">
      <p>
        <?= $_SESSION['eliminar-categoria-ok'];
        unset($_SESSION['eliminar-categoria-ok']);
        ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['eliminar-categoria'])) : ?>
    <div class="mensaje__alerta error">
      <p>
        <?= $_SESSION['eliminar-categoria'];
        unset($_SESSION['eliminar-categoria']);
        ?>
      </p>
    </div>
  <?php endif ?>
  <div class="contenedor panel__contenedor">
    <aside>
      <ul>
        <li>
          <a href="index.php"><i class="uil uil-clipboard-blank"></i>
            <h5>Panel</h5>
          </a>
        </li>
        <li>
          <a href="add-post.php"><i class="uil uil-pen"></i>
            <h5>Añadir publicación</h5>
          </a>
        </li>
        <li>
          <?php if (isset($_SESSION['usuario_admin'])) : ?>
            <a href="add-usuario.php"><i class="uil uil-user-plus"></i>
              <h5>Añadir usuario</h5>
            </a>
        </li>
        <li>
          <a href="gestionar-usuarios.php"><i class="uil uil-users-alt"></i>
            <h5>Gestionar usuarios</h5>
          </a>
        </li>
        <li>
          <a href="add-categoria.php"><i class="uil uil-tag-alt"></i>
            <h5>Añadir categoría</h5>
          </a>
        </li>
        <li>
          <a href="gestionar-categorias.php" class="activo"><i class="uil uil-edit"></i>
            <h5>Gestionar categorías</h5>
          </a>
        </li>
      <?php endif ?>
      </ul>
    </aside>
    <main>
      <h2>Gestionar categorías</h2>
      <table>
        <thead>
          <tr>
            <th>Título</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($categoria = mysqli_fetch_assoc($gestionarcategorias_fetch_result)) : ?>
            <tr>
              <td><?= $categoria['titulo'] ?></td>
              <td>
                <a href="<?= ROOT_URL ?>admin/editar-categoria.php?id=<?= $categoria['id'] ?>" class="btn mini">Editar</a>
              </td>
              <td>
                <a href="<?= ROOT_URL ?>admin/eliminar-categoria.php?id=<?= $categoria['id'] ?>" class="btn mini rojo">Eliminar</a>
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