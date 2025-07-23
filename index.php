<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cristiano Ronaldo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <style>
         .carousel-inner {
            max-width: 35%; /* Ajusta el ancho del carrusel */
            margin: 0 auto; /* Centra el carrusel */
        }
    </style>


</head>
<body>
    
    <nav class="navbar navbar-expand-lg bg-warning">
  <div class="container-fluid">
    <!-- Aquí aplicamos un texto más grueso con font-weight: bold; -->
    <a class="navbar-brand text-dark fw-bold" href="#">CR7</a> <!-- fw-bold para hacer el texto más grueso -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <!-- "Home" y "Skills" con texto más suave y menos grueso -->
          <a class="nav-link text-dark" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link text-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Skills
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Goles</a></li>
            <li><a class="dropdown-item" href="#"> </a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Habilidades</a></li>
          </ul>
        </li>
      </ul>
      
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-dark" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

    <br>
    <h1 class="text-center">Cristiano Ronaldo</h1>
    <br>

    <div class="text-center" id="biografia">
      <h2>Biografia</h2>
      <p class="text-center">Cristiano Ronaldo dos Santos Aveiro es un futbolista portugés considerado uno de los mejores de todos los tiempos. ha jugado con clubes como el Manchester United, Real Madrid, Juventus y Al-Nassr, </p>
    </div>

    <div class="text-center" id="estadisticas">
        <h2>Estadisticas</h2>
        <div class=" container top-0 start-50">
        <table class="table"borde="1">
            <thead>
                <tr>
                <th>Temporada</th>
                    <th>Club</th>
                    <th>Goles</th>
                    <th>Asistencias</th>
                </tr>
            </thead>
            <tbody>
           <tr>
            <td>2010-2011</td>
                <td>Real Madrid</td>
                <td>53</td>
                <td>14</td>
            </tr>
            <tr>
                <td>2014-2015</td>
                <td>Real Madrid</td>
                <td>61</td>
                <td>22</td>
            </tr>
            <tr>
                <td>2022-2023</td>
                <td>Al-Nassr</td>
                <td>14</td>
                <td>2</td>
            </tr>

            </tbody>

        </table>

        </div>
        
        <br>
        <br>
   <div class="card" style="width: 18rem; margin: 0 auto;"> 
  <img src="/images/cris.png" class="card-img-top" alt="">
  <div class="card-body">
    <p class="card-text">Hasta el momento, Cristiano Ronaldo ha marcado 74 goles en 77 partidos con el Al Nassr FC en la Saudi Pro League. En total, ha marcado 99 goles en 111 partidos con el equipo de Riad</p>
  </div>
  
</div>

<br>
<br>

<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
  LISTAR REGISTRO
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <?php
          include_once "Controlador/conexion.php";
          $conexion = new Conexion();
          $conexion = $conexion->conectar();
          if ($conexion){
            $sql = "SELECT * FROM registropersonas";
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            $i = 0;
            while ($fila=$consulta-> fetch(PDO::FETCH_ASSOC)){
              $i += 1;
          
        ?>

      <table class="table caption-top">
  <caption>List of users</caption>
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Edad</th>
      <th scope="col">Correo</th>
      <th scope="col">Telefono</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
 
  </tbody>

  <?php
    }}
    else {
      echo "Error al conectar a la base de datos.";
    }
  ?>

</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-warning">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>



<form action="Controlador/registro.php" method="POST" class="container d-flex justify-content-center align-items-center" style="height: 85vh;">
  <div class="col-4">
    <div class="mb-2">
      <input type="text" class="form-control" placeholder="Nombre" name="nombre">
    </div>
    <div class="mb-2">
      <input type="text" class="form-control" placeholder="Apellido" name="apellido">
    </div>
    <div class="mb-2">
      <input type="text" class="form-control" placeholder="Nro. Documento" name="id">
    </div>
    <div class="mb-2">
      <input type="text" class="form-control" placeholder="Correo electrónico" name="correo">
    </div>
    <div class="mb-2">
      <input type="text" class="form-control" placeholder="Edad" name="edad">
    </div>
    <div class="mb-2">
      <input type="text" class="form-control" placeholder="Telefono" name="tel">
    </div>
    <button type="submit" class="btn btn-warning">Enviar</button>
  </div>
</form>

   </script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
 
</body>
</html>