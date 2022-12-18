<?php

session_start();

require '../config/database.php';

$id = $conn->real_escape_string($_POST['id']); 


$sql = "DELETE FROM usuarios WHERE ID=$id";

if($conn->query($sql)){
    //$id = $conn->insert_id;
    $dir = "fotos";

    $info_img = pathinfo($_FILES['foto']['name']);
    $info_img['extension'];

    $foto = $dir . '/' . $id . '.jpg';
    if (file_exists($foto)){

        unlink($foto);
    }

    $_SESSION['color'] = "success";
    $_SESSION['msg'] = "Registro Eliminado";
}else{
    $_SESSION['color'] = "danger";
    $_SESSION['msg'] = "Error al eliminar registro";
}

header('Location: index.php');