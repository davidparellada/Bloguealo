<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog responsivo</title>
    <!--Estilos-->
    <link rel="stylesheet" href="css/styles.css" />
    <!--CDN Iconscout-->
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.8/css/line.css"
    />
    <!--Fuente de google Montserrat-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <section class="form__seccion">
      <div class="contenedor form__seccion-contenedor">
        <h2>Registro</h2>
        <div class="mensaje__alerta ok">
          <p>Mensaje de error</p>
        </div>
        <form class="formulario" enctype="multipart/form-data" action="">
          <input type="text" placeholder="Nombre" />
          <input type="text" placeholder="Apellidos" />
          <input type="text" placeholder="Correo" />
          <input type="text" placeholder="Nombre de usuario" />
          <input type="text" placeholder="Contraseña" />
          <input type="text" placeholder="Confirmar contraseña" />
          <div class="form__subir">
            <label for="avatar">Avatar</label>
            <input type="file" id="avatar" />
          </div>
          <button type="submit" class="btn">Registrar</button>
          <small
            ><a href="signup.php">Ya tengo cuenta una de bloguéalo</a></small
          >
        </form>
      </div>
    </section>
  </body>
</html>
