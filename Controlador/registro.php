<?php 

$Nombre = $_POST["nombre"];
$Apellido = $_POST["apellido"];
$nro_documento = $_POST["id"];
$correo_electronico = $_POST["correo"];
$Edad = $_POST["edad"];
$Telefono = $_POST["tel"];

//Llamar la conexion

include_once "conexion.php";
$conexion = new Conexion();
$conexion = $conexion -> conectar();
 
if($conexion){

  $consulta = "INSERT INTO `registropersonas`(`Id`, `Nombre`, `Apellido`, `Edad`, `Correo`, `Telefono`) VALUES ('$Nombre','$Apellido','$nro_documento','$correo_electronico','$Edad','$Telefono')";
  $con = $conexion->prepare($consulta);
  $con->execute();
  header("Location: ../index.php?menssage=Correcto");


}else{

  echo("Sigue intentando mi brooklyn");

}
 
?>    
