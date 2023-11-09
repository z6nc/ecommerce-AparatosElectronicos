<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Empleado Inicio de session</title>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

  <div data-aos="flip-left" class="containerFrm">
    <div class="tituloFrm">
      <h1 class="text-center">LOGIN <br> EMPLEADO</h1>
      <hr style=" border: 1px solid black;">
    </div>

    <form class="cuerpo" action="../LOGIN/validarEmple.php" method="post">
      <div class="mb-3">
        <label for="user" class="form-label">Usuario :</label>
        <input type="text" class="form-control" id="user" name="usuario" placeholder="Ingrese su usuario">

      </div>
      <div class="mb-3">
        <label for="contraseña" class="form-label">Contraseña :</label>
        <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Ingrese su contraseña">
      </div>

      <div class="d-grid gap-2 col-12 col-md-6 mx-auto">
        <button type="submit" class="btn btn-success">Ingrese Empleado</button>
      </div>
      <hr>
      <p class="text-center" style="  font-style:italic;color:#404040; font-size:14px;">Si no puedes ingresar contacta a soporte tecnico<br>
        +51 934 234 131
      </p>
    </form>

  </div>



  <style>
    body {
      background: rgb(255,255,255);
background: radial-gradient(circle, rgba(255,255,255,1) 9%, rgba(162,164,167,1) 100%);
      margin: 0;
      box-sizing: border-box;
      background-color: #e5e0df;
      font-family: 'roboto', sans-serif;


    }

    .containerFrm input {
      letter-spacing: 2px;
      box-shadow: 1px 1px 1px black;

    }

    .containerFrm label {
      letter-spacing: 2px;
      font-weight: 700;

    }

    .containerFrm button {
      font-weight: 900;
      letter-spacing: 2px;
      box-shadow: 2px 2px 10px black;
    }



    .containerFrm h1 {
      font-weight: 900;
      letter-spacing: 2px;

    }

    .containerFrm {
      background-color: #fff9f5;
      position: relative;
      top: 130px;
      margin: 0;
      padding: 14px;
      display: flex;
      flex-direction: column;
      margin: 9px;
      border-top-left-radius: 50px;
      border-bottom-right-radius: 50px;
      top: 62px;



    }

    @media(min-width:687px) {
      .containerFrm {
        position: relative;
        top: 63px;
        margin-left: 25%;
        margin-right: 25%;
        padding: 24px;
      }

    }
  </style>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>