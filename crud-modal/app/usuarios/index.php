<?php

session_start();

require '../config/database.php';

$sqlt = "ALTER TABLE usuarios DROP ID;";

$sqlt1="ALTER TABLE usuarios AUTO_INCREMENT=1;";

$sqlt2="ALTER TABLE usuarios ADD ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;";
$sqlsqlt = $conn ->query($sqlt);
$sqlsqlt1 = $conn ->query($sqlt1);
$sqlsqlt2 = $conn ->query($sqlt2);

$sqlUsuarios = "SELECT * FROM usuarios AS u 
                INNER JOIN rol AS r ON u.ID_ROL=r.ID_ROL ORDER BY ID";
$usuarios = $conn ->query($sqlUsuarios);

$dir = "fotos/";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD MODAL</title>

    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/all.min.css" rel="stylesheet">

</head>
<body>

    <div class="container py-3">
    <h2 class="text-center">USUARIOS PLATAFORMA IT</h2>

    <hr>
    <?php if (isset($_SESSION['msg']) && isset($_SESSION['color'])) { ?>
          <div class="alert alert-<?= $_SESSION['color']; ?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['msg']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
   
        <?php 
        unset($_SESSION['msg']);
        unset($_SESSION['color']);
        }?>

    <div class="row justify-content-center">
    <div class="col-auto">
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal">
            <i class="fa-solid fa-circle-plus" ></i>  Nuevo Usuario</a>
    </div>
    </div>

    <table class="table table-sm table-striped table-hover mt-4">
        <thead class="table-dark"><tr>
            <th> # </th>
            <th> Nombre </th>
            <th> Apellidos </th>
            <th> Rol Usuario </th>
            <th> Edad </th>
            <th> Tipo Documento </th>
            <th> Documento </th>
            <th> Foto </th>
            <th> Acción </th>
        </tr>
        </thead>

        <tbody>
        <?php while ($row_usuarios = $usuarios->fetch_assoc()) {?>
<tr>
    <td><?= $row_usuarios['ID'];?></td>
    <td><?= $row_usuarios['NOMBRE'];?></td>
    <td><?= $row_usuarios['APELLIDO'];?></td>
    <td><?= $row_usuarios['ROL'];?></td>
    <td><?= $row_usuarios['EDAD'];?></td>
    <td><?= $row_usuarios['TIPO_DOCUMENTO'];?></td>
    <td><?= $row_usuarios['DOCUMENTO'];?></td>
    <td><img src="<?= $dir . $row_usuarios['ID'] . '.jpg?n='.time(); ?>" width="100" ></td>
    <td>
        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" 
        data-bs-target="#editModal" data-bs-id="<?=$row_usuarios['ID'];?>">
        <i class="fa-solid fa-pen-to-square"></i> Editar</a>

        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
        data-bs-target="#eliminaModal" data-bs-id="<?=$row_usuarios['ID'];?>">
        <i class="fa-solid fa-trash-can"></i> Eliminar</a>

    </td>
</tr>
            <?php } ?>
        </tbody>
    </table>

    <?php
    $sqlrol = "SELECT * FROM rol";
    $rol = $conn->query($sqlrol);
    ?>
    
    <?php include 'nuevoModal.php';?> 
    <?php $rol->data_seek(0);?>
    <?php include 'editModal.php'; ?>
    <?php include 'eliminaModal.php'; ?>


 <script>
     let nuevoModal = document.getElementById('nuevoModal')
     let editModal = document.getElementById('editModal')
     let eliminaModal = document.getElementById('eliminaModal')
        
     editModal.addEventListener('show.bs.modal', event =>{
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')

        let inputId = editModal.querySelector('.modal-body #id')
        let inputNombre = editModal.querySelector('.modal-body #nombre')
        let inputApellido = editModal.querySelector('.modal-body #apellido')
        let inputEdad = editModal.querySelector('.modal-body #edad')
        let inputTipoUsuario = editModal.querySelector('.modal-body #rol')
        let inputTipoDocumento = editModal.querySelector('.modal-body #tipo_documento')
        let inputDocumento = editModal.querySelector('.modal-body #documento')
        let inputFoto = editModal.querySelector('.modal-body #img_foto')

        let url = "getUsuarios.php"
        let formData = new FormData()
        formData.append('id',id)

        fetch(url, {
            method: 'POST',
            body: formData
        }).then(response => response.json())
        .then(data => {
           
            inputId.value = data.ID
            inputNombre.value = data.NOMBRE
            inputApellido.value = data.APELLIDO
            inputEdad.value = data.EDAD
            inputTipoUsuario.value = data.ROL
            inputTipoDocumento.value = data.TIPO_DOCUMENTO
            inputDocumento.value = data.DOCUMENTO
            inputFoto.src = '<?= $dir?>' + data.ID + '.jpg'

          }).catch(err => console.log(err))
     })

     eliminaModal.addEventListener('shown.bs.modal', event => {
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')
        eliminaModal.querySelector('.modal-footer #id').value = id

     })

    </script>

 <script src="../../assets/js/bootstrap.bundle.min.js"></script>
 <footer>
  <p>&copy; 2022 Línea de Código</p>
  <ul>
    <li><a href="https://pixabay.com/es/">Pixabay</a></li>
  </ul>
</footer>
</body>
</html>