<?php 

$Nombre = $_POST["nombre"];
$Apellido = $_POST["apellido"];
$nro_documento = $_POST["id"];
$correo_electronico = $_POST["correo"];
$Edad = intval($_POST["edad"]); // <- Asegúrate que sea número
$Telefono = $_POST["tel"];

include_once "conexion.php";
$conexion = new Conexion();
$conexion = $conexion->conectar();

if ($conexion) {
    $consulta = "INSERT INTO registropersonas 
        (Id, Nombre, Apellido, Edad, Correo, Telefono) 
        VALUES (:id, :nombre, :apellido, :edad, :correo, :telefono)";

    $con = $conexion->prepare($consulta);
    $con->bindParam(':id', $nro_documento);
    $con->bindParam(':nombre', $Nombre);
    $con->bindParam(':apellido', $Apellido);
    $con->bindParam(':edad', $Edad, PDO::PARAM_INT); // <- ¡Esto es clave!
    $con->bindParam(':correo', $correo_electronico);
    $con->bindParam(':telefono', $Telefono);
    
    $con->execute();
    header("Location: ../index.php?menssage=Correcto");

} else {
    echo("Sigue intentando mi brooklyn");
}
?>
