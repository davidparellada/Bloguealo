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
        <h2>Iniciar sesión</h2>
        <div class="mensaje__alerta ok">
          <p>Mensaje de error</p>
        </div>
        <form class="formulario" action="">
          <input type="text" placeholder="Nombre de usuario o correo" />
          <input type="text" placeholder="Contraseña" />
          <div class="form__subir">
            <label for="avatar">Avatar</label>
            <input type="file" id="avatar" />
          </div>
          <button type="submit" class="btn">Registrar</button>
          <small><a href="signup.php">No tengo cuenta de bloguéalo</a></small>
        </form>
      </div>
    </section>
  </body>
</html>
