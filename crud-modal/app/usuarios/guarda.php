<?php

session_start();

require '../config/database.php';

$nombre = $conn->real_escape_string($_POST['NOMBRE']); 
$apellido = $conn->real_escape_string($_POST['APELLIDO']); 
$edad = $conn->real_escape_string($_POST['EDAD']); 
$tipo_documento = $conn->real_escape_string($_POST['TIPO_DOCUMENTO']); 
$documento = $conn->real_escape_string($_POST['DOCUMENTO']); 
$rol = $conn->real_escape_string($_POST['ROL']); 


$sql = "INSERT INTO usuarios (NOMBRE, APELLIDO, EDAD, TIPO_DOCUMENTO, DOCUMENTO, ID_ROL, FECHA)
VALUES ('$nombre','$apellido',$edad,'$tipo_documento',$documento,$rol, NOW())";
if($conn->query($sql)){
    $id = $conn->insert_id;

    $_SESSION['color'] = "success";
    $_SESSION['msg'] = "Registro guardado";

    if($_FILES['FOTO']['error'] == UPLOAD_ERR_OK){
        $permitidos = array("image/jpg", "image/jpeg");
        if(in_array($_FILES['FOTO']['type'], $permitidos)){

            $dir = "fotos";

            $info_img = pathinfo($_FILES['FOTO']['name']);
            $info_img['extension'];

            $foto = $dir . '/' . $id . '.jpg';

            if(!file_exists($dir)){
                mkdir($dir, 0777);
            }
            if(!move_uploaded_file($_FILES['FOTO']['tmp_name'], $foto)){
                $_SESSION['color'] = "danger";
                $_SESSION['msg'] .= "<br>Error al guardar imagen";
            }
        } else{
            move_uploaded_file($_FILES['FOTO']['tmp_name'], $foto);
            $_SESSION['color'] = "danger";
            $_SESSION['msg'] .= "<br>Formato de imagen no permitido";

        }
    }
}else{
    $_SESSION['color'] = "danger";
    $_SESSION['msg'] = "<br>Error al guardar imagen";
}

header('Location: index.php');