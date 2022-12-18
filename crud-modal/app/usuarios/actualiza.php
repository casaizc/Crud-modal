<?php

session_start();

require '../config/database.php';

$id = $conn->real_escape_string($_POST['id']); 
$nombre = $conn->real_escape_string($_POST['nombre']); 
$apellido = $conn->real_escape_string($_POST['apellido']); 
$edad = $conn->real_escape_string($_POST['edad']); 
$tipo_documento = $conn->real_escape_string($_POST['tipo_documento']); 
$documento = $conn->real_escape_string($_POST['documento']); 
$rol = $conn->real_escape_string($_POST['rol']); 


$sql = "UPDATE usuarios SET NOMBRE='$nombre', APELLIDO='$apellido', EDAD=$edad, 
        TIPO_DOCUMENTO='$tipo_documento', DOCUMENTO=$documento WHERE ID=$id";

if($conn->query($sql)){ 

    $_SESSION['color'] = "success";
    $_SESSION['msg'] = "Registro Actualizado";

    if($_FILES['foto']['error'] == UPLOAD_ERR_OK){
        $permitidos = array("image/jpg", "image/jpeg");
        if(in_array($_FILES['foto']['type'], $permitidos)){

            $dir = "fotos";

            $info_img = pathinfo($_FILES['foto']['name']);
            $info_img['extension'];

            $foto = $dir . '/' . $id . '.jpg';

            if(!file_exists($dir)){
                mkdir($dir, 0777);
            }
            if(!move_uploaded_file($_FILES['foto']['tmp_name'], $foto)){
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
    $_SESSION['msg'] = "<br>Error al actualizar imagen";
}

header('Location: index.php');