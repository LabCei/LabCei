<?php
require "funciones/conecta.php";
$con = conecta();

$correo = $_POST['correo'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM alumnos WHERE correo='$correo'";
$res = $con->query($sql);
$rows = $res->num_rows;
if($rows == 0){
    echo 0;
}
else{
    $sql = "SELECT pass FROM alumnos WHERE correo='$correo'";
    $res = $con->query($sql);
    $row = $res->fetch_array();

    if(password_verify($pass,$row['pass'])){ 
        echo 0;
    }
    else{
         echo 1;
         
        }


    }
?>