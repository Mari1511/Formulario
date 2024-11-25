<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_completo = $_POST['nombre_completo'];
    $correo_electronico = $_POST['correo_electronico'];
    $codigo_trabajador = $_POST['codigo_trabajador'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuarios (nombre_completo, correo_electronico, codigo_trabajador, contrasena) VALUES ('$nombre_completo', '$correo_electronico', '$codigo_trabajador', '$contrasena')";

    if ($conn->query($sql) === TRUE) {
        echo "<script> alert('Registro exitoso, En un periodo de 24 horas se revisara su solicitud de registro para ver si apto para entrar a la base de datos y si cumple con las caracteristicas se le enviara a su correo la clave para iniciar sesion');  window.location.href = 'http://localhost/Fercho/index.html'; </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    $conn->close();
}
?>

