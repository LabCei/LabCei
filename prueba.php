<?php
// Contraseña proporcionada por el usuario
$contrasena_usuario = '1';
//$hash_almacenado = password_hash($contrasena_usuario,PASSWORD_DEFAULT);
$hash_almacenado = '$2y$10$8LwkBuonSx07Jkp3P5384O9GhMC1QuuAwe5sRN1OVxQ';

// Hash almacenado en la base de datos (este es solo un ejemplo, normalmente se recuperaría de la base de datos)


// Verificar si la contraseña proporcionada coincide con el hash almacenado
if (password_verify($contrasena_usuario, $hash_almacenado)) {
    echo '¡La contraseña es correcta!';
} else {
    echo '¡La contraseña es incorrecta';
}
    ?>