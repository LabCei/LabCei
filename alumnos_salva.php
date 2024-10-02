<?php
//alumnos_salva.php

require "funciones/conecta.php";
$con = conecta();

//Recibe variables
$nombre = $_REQUEST['nombre'];
$apellidos = $_REQUEST['apellidos'];
$correo = $_REQUEST['correo'];
$pass = $_REQUEST['pass'];
$codigo  = $_REQUEST['codigo'];
$encriptado = md5($pass);
$sql = "INSERT INTO alumnos
        (nombre, apellidos, correo, pass, codigo)
        VALUES ('$nombre', '$apellidos', '$correo', '$encriptado', '$codigo')";

$res = $con->query($sql);

if($res){
        echo "si se inserto";
} else {
        echo "no se inserto ";
}

header("Location: sesion.html");
?>