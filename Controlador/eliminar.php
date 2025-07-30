<?php 
include_once 'conexion.php'; // conecta a la base de datos
$con = new Conexion();
$con = $con->conectar();

if ($con) {
    if (isset($_POST['ID_Registro'])) {  // si nos envían el ID_Registro por POST
        $idRegistro = $_POST['ID_Registro'];

        // Preparar consulta SQL para eliminar el registro con ese ID
        $sql = "DELETE FROM registropersonas WHERE ID_Registro = ?";
        $consulta = $con->prepare($sql);
        $consulta->execute([$idRegistro]);

        // Después de eliminar, redirigir a la página principal con mensaje
        header("Location: ../index.php?mensaje=eliminado");
        exit;
    } else {
        // Si no se envió el ID_Registro
        header("Location: ../index.php?mensaje=error_no_id");
        exit;
    }
} else {
    // Si falla la conexión
    header("Location: ../index.php?mensaje=error_conexion");
    exit;
}
?>
