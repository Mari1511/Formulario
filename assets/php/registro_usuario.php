<?php
require 'conexion.php';

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$intertar = "INSERT INTO usuario VALUES ('$nombre_completo', '$correo', '$usuario', '$contrasena')";

$query = mysqli_query($conexion, $insertar);

if($query){
    echo "<script> alert('Correcto')</script>";
}else{
    echo "<script>alert('Error: " . mysqli_error($conexion) . "');</script>";
}
?>