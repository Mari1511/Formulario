<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo_electronico = $_POST['correo_electronico'];
    $contrasena = $_POST['contrasena'];
    $clave_cifrada = $_POST['clave'];

    // Consultar el usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE correo_electronico = '$correo_electronico'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verificar la contraseña
        if (password_verify($contrasena, $row['contrasena'])) {
            // Comparar la clave proporcionada con una clave predeterminada
            $clave_predeterminada = 'clave123'; // Clave predeterminada sin cifrar
            if ($clave_cifrada === $clave_predeterminada) {
                // Redirigir al usuario a la página deseada después de iniciar sesión
                header("Location: http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=sistema_usuarios&table=usuarios");
                exit(); // Importante para detener la ejecución del script
            } else {
                echo "Clave cifrada incorrecta";
            }
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "No existe el usuario";
    }

    $conn->close();
}
?>
