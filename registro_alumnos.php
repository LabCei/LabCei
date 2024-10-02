<?php
require "funciones/conecta.php";
$con = conecta();

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$pass = $_POST['contrasena'];  
$codigo = $_POST['codigo'];

// Encriptación de la contraseña
$hash = password_hash($pass, PASSWORD_DEFAULT);

// Verificar si el archivo se ha subido correctamente
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $file_name = $_FILES['foto']['name'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    
    $cadena = explode(".", $file_name);
    $ext = strtolower(end($cadena)); 
    $dir = "img-usuarios/";  
    $file_enc = md5_file($file_tmp);  
    
    
    $fileName1 = "$file_enc.$ext";
    
    
    if (copy($file_tmp, $dir.$fileName1)) {
        
        $sql = "INSERT INTO alumnos (nombre, apellidos, correo, pass, codigo, archivo_n, archivo) 
                VALUES ('$nombre', '$apellidos', '$correo', '$hash', '$codigo', '$file_name', '$fileName1')";

        if ($con->query($sql) === TRUE) {
            header("Location: sesion.html");
            exit();
        } else {
            echo "Error al insertar en la base de datos: " . $con->error;
        }
    } else {
        echo "Error al copiar el archivo al directorio de destino.";
    }
} else {
    echo "Error al subir el archivo de imagen.";
}
?>
