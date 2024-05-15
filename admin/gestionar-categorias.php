<?php
include 'partials/header.php'
?>

<section class="panel">
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
          <tr>
            <td>Animales</td>
            <td>
              <a href="editar-categoria.php" class="btn mini">Editar</a>
            </td>
            <td>
              <a href="eliminar-categoria.php" class="btn mini rojo">Eliminar</a>
            </td>
          </tr>
          <tr>
            <td>Cocina</td>
            <td>
              <a href="editar-categoria.php" class="btn mini">Editar</a>
            </td>
            <td>
              <a href="eliminar-categoria.php" class="btn mini rojo">Eliminar</a>
            </td>
          </tr>
          <tr>
            <td>Viaje</td>
            <td>
              <a href="editar-categoria.php" class="btn mini">Editar</a>
            </td>
            <td>
              <a href="eliminar-categoria.php" class="btn mini rojo">Eliminar</a>
            </td>
          </tr>
        </tbody>
      </table>
    </main>
  </div>
</section>
<?php
include '../partials/footer.php'
?>