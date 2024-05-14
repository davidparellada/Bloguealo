<?php
  include 'partials/header.php'
  ?>
    <section class="form__seccion">
      <div class="contenedor form__seccion-contenedor">
        <h2>Editar categoría</h2>
        <form class="formulario" enctype="multipart/form-data" action="">
          <input type="text" placeholder="Nombre de la categoría" />
          <textarea rows="4" placeholder="Descripción"></textarea>
          <button type="submit" class="btn">Editar</button>
        </form>
      </div>
    </section>
    <?php
  include '../partials/footer.php'
  ?>