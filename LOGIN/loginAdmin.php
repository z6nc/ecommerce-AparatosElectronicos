<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Login Administrador</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" />
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

  <div data-aos="zoom-in-up" class="containerFrm">
    <div class="contenedorInfo">

      <div class="tituloFrm">
        <h1 class="text-center">SIGN UP</h1>
        <p>Bienvenido Administrador</p>
        <hr style=" border: 1px solid black;">
      </div>

      <form class="cuerpo" action="../LOGIN/validar.php" method="post">
        <div class="usu">
          <label for="user" class="form-label">Usuario :</label>
          <input type="text" class="form-control" id="user" name="usuario" placeholder="Ingrese su usuario">

        </div>
        <div class="contra">
          <label for="contraseña" class="form-label">Contraseña :</label>
          <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Ingrese su contraseña">
        </div>

        <div class="boton">
          <button type="submit">Ingresar Administrador</button>
        </div>

      </form>
    </div>
    <div class="contenedorR">
      <img src="../imagenes/Fondo2.png" alt="" srcset="">
    </div>

  </div>

  <style>
    body {
      margin: 0;
      background-color: whitesmoke;
      font-family: "Press Start 2P", cursive;
      box-sizing: border-box;
      cursor: url("../imagenes/cursosRetro1.png"), auto;
    }



    .containerFrm {
      margin: 0;
      display: grid;
      grid-template-columns: 40% 60%;
      margin-left: 70px;
      margin-right: 70px;
      margin-top: 35px;
      box-shadow: 1px 2px 30px black;
      height: 530px;

    }

    .contenedorInfo {
      background-color: white;
    }

    .contenedorR {
      background-color: #F45F00;
    }



    .tituloFrm h1 {
      font-size: 25px;
      font-weight: bold;
      padding-top: 65px;

    }

    .tituloFrm p {
      text-align: center;
      font-size: 14px;
      color: gray;
      padding-top: 25px;
    }

    .cuerpo {

      padding-top: 30px;
      padding-left: 30px;
      padding-right: 30px;
      font-size: 15px;
    }

    .cuerpo .usu {
      padding-top: 9px;
      font-size: 14px;
    }

    .cuerpo .contra {
      padding-top: 25px;
      font-size: 14px;
    }

    .cuerpo .boton {
      padding-top: 65px;
      margin-bottom: 4px;
      text-align: center;

    }

    .boton button {
      font-size: 11px;
      background-color: #F45F00;
      border: none;
      box-shadow: 1px 2px 10px black;
      padding: 8px 12px;
      border-radius: 9px;
      color: white;
    }

    .boton :hover {
      background-color: orange;
      box-shadow: 1px 2px 10px whitesmoke;
      cursor: url("../imagenes/cursosRetro1.png"), auto;
    }

    .contra ::placeholder {
      font-size: 10px;
    }

    .contra input {
      border: none;
      font-size: 10px;
      border-bottom: 2px solid black;
    }

    .usu ::placeholder {
      font-size: 10px;
    }

    .usu input {
      border: none;
      font-size: 10px;
      border-bottom: 2px solid black;
    }

    .contenedorR {
      display: flex;
      align-items: center;
      justify-content: center;
    }



    @media (min-width: 190px) and (max-width: 912px) {

      .containerFrm {
        margin: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        margin-left: 35px;
        margin-right: 30px;
       
      }

      .contenedorInfo {
      background-color: white;
      margin-bottom: 43px;
     
      
    }
    .contenedorR img{
      margin: 0;
      width: 370px;
      
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