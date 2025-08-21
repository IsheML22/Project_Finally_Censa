<?php
include_once 'conexion.php';
$con = new Conexion();
$con = $con->conectar();

if (!$con) {
    die("Error en la conexión a la base de datos");
}

// Paso 1: Obtener el ID del registro a editar
if (!isset($_GET['ID_Registro'])) {
    die("ID no especificado");
}

$id = intval($_GET['ID_Registro']);

// Paso 2: Obtener datos actuales
$sql = "SELECT * FROM registropersonas WHERE ID_Registro = :id";
$stmt = $con->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$registro = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$registro) {
    die("Registro no encontrado");
}

// Paso 3: Si se envió el formulario para actualizar, procesar los datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    $sql_update = "UPDATE registropersonas 
                   SET Nombre = :nombre, Apellido = :apellido, Edad = :edad, Correo = :correo, Telefono = :telefono 
                   WHERE ID_Registro = :id";
    
    $stmt_update = $con->prepare($sql_update);
    $stmt_update->bindParam(':nombre', $nombre);
    $stmt_update->bindParam(':apellido', $apellido);
    $stmt_update->bindParam(':edad', $edad, PDO::PARAM_INT);
    $stmt_update->bindParam(':correo', $correo);
    $stmt_update->bindParam(':telefono', $telefono, PDO::PARAM_STR);
    $stmt_update->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt_update->execute()) {
        header("Location: ../index.php?mensaje=editado");
        exit;
    } else {
        echo "Error al actualizar el registro.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Editar Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Editar Registro</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo htmlspecialchars($registro['Nombre']); ?>" required>
        </div>
        <div class="mb-3">
            <label>Apellido</label>
            <input type="text" name="apellido" class="form-control" value="<?php echo htmlspecialchars($registro['Apellido']); ?>" required>
        </div>
        <div class="mb-3">
            <label>Edad</label>
            <input type="number" name="edad" class="form-control" value="<?php echo htmlspecialchars($registro['Edad']); ?>" required>
        </div>
        <div class="mb-3">
            <label>Correo</label>
            <input type="email" name="correo" class="form-control" value="<?php echo htmlspecialchars($registro['Correo']); ?>" required>
        </div>
        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="<?php echo htmlspecialchars($registro['Telefono']); ?>" required>
        </div>
        <button type="submit" class="btn btn-warning">Actualizar</button>
        <a href="../index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
