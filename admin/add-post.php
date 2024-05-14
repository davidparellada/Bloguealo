<?php
  include 'partials/header.php'
  ?>
    <section class="form__seccion">
      <div class="contenedor form__seccion-contenedor">
        <h2>Añadir publicación</h2>
        <div class="mensaje__alerta error">
          <p>Mensaje de error</p>
        </div>
        <form class="formulario" action="" enctype="multipart/form-data">
          <input type="text" placeholder="Título" />
          <label for="select">Selecciona categoría</label>
          <select>
            <option value="1">Animales</option>
            <option value="1">Cocina</option>
            <option value="1">Viaje</option>
            <option value="1">Arte</option>
            <option value="1">Tecnología</option>
            <option value="1">Ciencia</option>
            <option value="1">Deportes</option>
            <option value="1">Entretenimiento</option>
          </select>
          <textarea rows="12" placeholder="Cuerpo"></textarea>
          <div class="form__subir">
            <label for="foto">Añadir foto</label>
            <input type="file" id="foto">
          </div>
          <div class="form__marcar">
            <input type="checkbox" id="destacado__marcar" checked>
            <label for "destacado__marcar">Mostrar como destacado</label>
          </div>
          <button type="submit" class="btn">Añadir</button>
        </form>
      </div>
    </section>
    <?php
  include '../partials/footer.php'
  ?>