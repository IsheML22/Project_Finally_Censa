<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cristiano Ronaldo</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous" />

  <style>
    body {
      background: #f8f9fa;
    }
    .navbar {
      box-shadow: 0 4px 8px rgba(0,0,0,.1);
    }
    h1.main-title {
      font-weight: 900;
      font-size: 3.5rem;
      color: #ffc107;
      text-shadow: 2px 2px 5px rgba(0,0,0,0.1);
    }
    #biografia p {
      max-width: 700px;
      margin: 0 auto;
      font-size: 1.1rem;
      color: #333;
    }
    #estadisticas {
      margin-top: 3rem;
    }
    .table-hover tbody tr:hover {
      background-color: #fff3cd;
    }
    .modal-content {
      border-radius: 0.5rem;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }
    .card img {
      border-radius: 0.5rem 0.5rem 0 0;
    }
    .btn-warning {
      font-weight: 700;
    }
    form.container {
      max-width: 480px;
      background: white;
      padding: 2rem;
      border-radius: 0.75rem;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    footer {
      background: #ffc107;
    }
    footer a:hover {
      text-decoration: underline;
    }
    footer i {
      font-size: 1.2rem;
      vertical-align: middle;
    }
  </style>

</head>
<body>

<?php include('layout/layout.php'); ?>

<main class="container mt-5 mb-5">
  <h1 class="text-center main-title mb-5">Cristiano Ronaldo</h1>

  <section id="biografia" class="mb-5">
    <h2 class="text-center mb-4">Biografía</h2>
    <p class="text-center">Cristiano Ronaldo dos Santos Aveiro es un futbolista portugués considerado uno de los mejores de todos los tiempos. Ha jugado con clubes como Manchester United, Real Madrid, Juventus y Al-Nassr.</p>
  </section>

  <section id="estadisticas" class="mb-5 text-center">
    <h2 class="mb-4">Estadísticas</h2>
    <div class="table-responsive">
      <table class="table table-bordered table-hover shadow-sm mx-auto" style="max-width:700px;">
        <thead class="table-warning">
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

    <div class="card mx-auto mt-4" style="max-width: 350px;">
      <img src="images/cris.png" class="card-img-top" alt="Cristiano Ronaldo" />
      <div class="card-body">
        <p class="card-text">Hasta el momento, Cristiano Ronaldo ha marcado 74 goles en 77 partidos con el Al Nassr FC en la Saudi Pro League. En total, ha marcado 99 goles en 111 partidos con el equipo de Riad.</p>
      </div>
    </div>
  </section>

  <div class="text-center mb-4">
    <button type="button" class="btn btn-warning btn-lg fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal">
      LISTAR REGISTRO
    </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title fw-bold" id="exampleModalLabel">Registro</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-hover table-bordered caption-top">
            <thead class="table-warning">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Edad</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
              </tr>
            </thead>

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

            <tbody>
              <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td><?php echo htmlspecialchars($fila["Nombre"]); ?></td>
                <td><?php echo htmlspecialchars($fila["Apellido"]); ?></td>
                <td><?php echo htmlspecialchars($fila["Edad"]); ?></td>
                <td><?php echo htmlspecialchars($fila["Correo"]); ?></td>
                <td><?php echo htmlspecialchars($fila["Telefono"]); ?></td>

                <td>
                  <a href="Controlador/editar.php?ID_Registro=<?php echo $fila['ID_Registro']; ?>" class="btn btn-sm btn-primary">
                    <i class="bi bi-pencil-square"></i> Editar
                  </a>
                </td>

                <td>
                  <form action="Controlador/eliminar.php" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este registro?');">
                    <input type="hidden" name="ID_Registro" value="<?php echo $fila['ID_Registro']; ?>">
                    <button type="submit" class="btn btn-sm btn-danger">
                      <i class="bi bi-trash"></i> Eliminar
                    </button>
                  </form>
                </td>
              </tr>
            </tbody>

            <?php
                }
              } else {
                echo "<tbody><tr><td colspan='8' class='text-center text-danger'>Error al conectar a la base de datos.</td></tr></tbody>";
              }
            ?>

          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <form action="Controlador/registro.php" method="POST" class="container d-flex justify-content-center align-items-center" style="height: 85vh;">
  <div class="col-12 col-md-6 col-lg-4 form-custom">
    <div class="mb-3">
      <input type="text" class="form-control" placeholder="Nombre" name="nombre" required />
    </div>
    <div class="mb-3">
      <input type="text" class="form-control" placeholder="Apellido" name="apellido" required />
    </div>
    <div class="mb-3">
      <input type="text" class="form-control" placeholder="Nro. Documento" name="id" required />
    </div>
    <div class="mb-3">
      <input type="email" class="form-control" placeholder="Correo electrónico" name="correo" required />
    </div>
    <div class="mb-3">
      <input type="number" class="form-control" placeholder="Edad" name="edad" min="0" required />
    </div>
    <div class="mb-3">
      <input type="tel" class="form-control" placeholder="Teléfono" name="tel" required />
    </div>
    <button type="submit" class="btn btn-warning w-100 fw-bold">Enviar</button>
  </div>
</form>


<footer class="bg-warning text-dark mt-5 pt-4 pb-3">
  <div class="container text-center">
    <div class="row">
      <div class="col-md-6 mb-3">
        <h5 class="fw-bold">Cristiano Ronaldo Fan Page</h5>
        <p class="mb-1">Proyecto de clase desarrollado con HTML, CSS y Bootstrap</p>
        <small>© 2025 Todos los derechos reservados</small>
      </div>
      <div class="col-md-6 mb-3">
        <h5 class="fw-bold">Síguenos</h5>
        <a href="https://facebook.com" target="_blank" class="text-dark me-3">
          <i class="bi bi-facebook"></i> Facebook
        </a>
        <a href="https://twitter.com" target="_blank" class="text-dark me-3">
          <i class="bi bi-twitter"></i> Twitter
        </a>
        <a href="https://instagram.com" target="_blank" class="text-dark">
          <i class="bi bi-instagram"></i> Instagram
        </a>
      </div>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</body>
</html>
