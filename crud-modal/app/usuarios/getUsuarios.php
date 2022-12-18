<?php

require '../config/database.php';

$id = $conn->real_escape_string($_POST['id']);

$sql = "SELECT ID, NOMBRE, APELLIDO, EDAD, TIPO_DOCUMENTO, DOCUMENTO,ROL FROM usuarios AS u INNER JOIN rol AS r ON u.ID_ROL=r.ID_ROL WHERE ID=$id LIMIT 1";

$resultado = $conn->query($sql);
$rows = $resultado->num_rows;

$usuario = [];

if($rows > 0){

$usuario = $resultado->fetch_array();

}

echo json_encode($usuario,JSON_UNESCAPED_UNICODE);

