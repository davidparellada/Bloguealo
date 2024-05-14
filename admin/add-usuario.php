<?php
  include 'partials/header.php'
  ?>
    <section class="form__seccion">
      <div class="contenedor form__seccion-contenedor">
        <h2>Crear usuario</h2>
        <div class="mensaje__alerta error">
          <p>Mensaje de error</p>
        </div>
        <form class="formulario" enctype="multipart/form-data" action="">
          <input type="text" placeholder="Nombre" />
          <input type="text" placeholder="Apellidos" />
          <input type="text" placeholder="Correo" />
          <input type="text" placeholder="Nombre de usuario" />
          <input type="text" placeholder="Contraseña" />
          <input type="text" placeholder="Confirmar contraseña" />
          <select>
            <option value="0">Autor</option>
            <option value="1">Admin</option>
          </select>
          <div class="form__subir">
            <label for="avatar">Avatar</label>
            <input type="file" id="avatar" />
          </div>
          <button type="submit" class="btn">Registrar</button>
        </form>
      </div>
    </section>
    <?php
  include '../partials/footer.php'
  ?>