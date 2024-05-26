<?php
include 'partials/header.php';

// Fetch usuarios de la bd
$id_actual = $_SESSION['usuario-id'];
$gestionarusuarios_fetch_query = "select * from usuarios where not id=$id_actual";
$gestionarusuarios_fetch_result = mysqli_query($con, $gestionarusuarios_fetch_query);

?>


<!-- Mensaje de éxito al añadir usuario -->
<section class="panel">
  <?php if (isset($_SESSION['add-usuario-ok'])) : ?>
    <div class="mensaje__alerta ok">
      <p>
        <?= $_SESSION['add-usuario-ok'];
        unset($_SESSION['add-usuario-ok']);
        ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['editar-usuario-ok'])) : ?>
    <div class="mensaje__alerta ok">
      <p>
        <?= $_SESSION['editar-usuario-ok'];
        unset($_SESSION['editar-usuario-ok']);
        ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['editar-usuario'])) : ?>
    <div class="mensaje__alerta error">
      <p>
        <?= $_SESSION['editar-usuario'];
        unset($_SESSION['editar-usuario']);
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
        <?php if (isset($_SESSION['usuario_admin'])) : ?>
          <li>
            <a href="add-usuario.php"><i class="uil uil-user-plus"></i>
              <h5>Añadir usuario</h5>
            </a>
          </li>
          <li>
            <a href="gestionar-usuarios.php" class="activo"><i class="uil uil-users-alt"></i>
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
      <h2>Gestionar usuarios</h2>
      <table>
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Editar</th>
            <th>Eliminar</th>
            <th>Administrador</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($usuario = mysqli_fetch_assoc($gestionarusuarios_fetch_result)) : ?>
            <tr>
              <td><?= $usuario['nombre'] ?></td>
              <td><?= $usuario['usuario'] ?></td>
              <td>
                <a href="<?= ROOT_URL ?>admin/editar-usuario.php?id=<?= $usuario['id'] ?>" class="btn mini">Editar</a>
              </td>
              <td>
                <a href="eliminar-usuario.php?id=<?= $usuario['id'] ?>" class="btn mini rojo">Eliminar</a>
              </td>
              <td>
                <?= $usuario['admin_check'] == 1 ? "Sí" : "No" ?>
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