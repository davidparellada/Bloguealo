<?php
  include 'partials/header.php'
  ?>
    <section class="form__seccion">
      <div class="contenedor form__seccion-contenedor">
        <h2>Editar usuario</h2>
        <form class="formulario" enctype="multipart/form-data" action="">
          <input type="text" placeholder="Nombre" />
          <input type="text" placeholder="Apellidos" />
          <select>
            <option value="0">Autor</option>
            <option value="1">Admin</option>
          </select>
          <button type="submit" class="btn">Editar</button>
        </form>
      </div>
    </section>
    <?php
  include '../partials/footer.php'
  ?>