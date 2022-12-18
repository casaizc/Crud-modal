<?php

require '../config/database.php';

$sql = "SELECT * FROM `busqueda` WHERE ID=(SELECT MAX(ID) FROM busqueda);";
$usuarios = $conn ->query($sql);
$row_usuarios = $usuarios->fetch_assoc();

$palabraclave = $row_usuarios['categoria'];
$lenguaje = 'es';
//$orden = 'popular';
$pagina = $row_usuarios['pagina'];
$per_page = 30;
$parameters=[
    "key" => '13119377-fc7e10c6305a7de49da6ecb25',
    "q" => $palabraclave,
    "lang" => $lenguaje,
    "page" => $pagina,
    "per_page" => $per_page
];
$url = "https://pixabay.com/api/";
$qs = http_build_query($parameters);
//echo $qs ,'<br>';
$request = "{$url}?{$qs}";
//echo $request ,'<br>';

$curl = curl_init();

curl_setopt_array($curl, array(CURLOPT_URL => $request, CURLOPT_RETURNTRANSFER => 1));
$response = curl_exec($curl);

$resultado = json_decode($response);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASE DE DATOS DE IMAGENES PIXABAY</title>

    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/all.min.css" rel="stylesheet">

</head>
<body>
<div class="container py-3">
    <h2 class="text-center">IMAGENES PIXABAY - BASE DE DATOS</h2>
    </div>
    <div class="container py-3">
    <div class="row justify-content-left">
    <div class="col-auto">
    <table class="table table-sm table-striped table-hover mt-4">
        <th>
            <label for="categoria" class=form-label> Filtrar Categorias</label></th>
            <th>   <select name="categoria" id="categoria" class="form-select" >
                <option value="">Seleccionar...</option>
               <option value="ciencia">Ciencia</option>
               <option value="educacion">Educación</option>
               <option value="personas">Personas</option>
               <option value="sentimientos">Sentimientos</option>
               <option value="construccion">Construcción</option>
              </select></th>
              <th>
              <button onclick="editarDatos()" class="btn btn-primary">
              <i class="fa-solid fa-filter"></i>  Filtrar</a></th>
              <th> <label for="nombre" class=form-label>    Palabra Clave</label></th>
             <th> <input type="text" name="nombre" id="nombre" class="form-control"></th>
             <th>
              <button type="button" class="btn btn-primary" >
              <i class="fa-solid fa-magnifying-glass-plus"></i>  Buscar </a></th>
            </div>
</table>
    </div>
    <table class="table table-sm table-striped table-hover mt-4">
        <thead class="table-dark"><tr>
        <th> <h5 class="text-center">Vista Previa</h5> </th>
        <th> <h5 class="text-center">Descripción</h5>  </th>
        </tr>
        </thead>
        <tbody>
<?php

foreach($resultado->hits as $key => $value){
    echo '<tr> <td>';
    echo '<img src="',$value->previewURL, '">','</td>';
    echo '<td> <p><strong>', 'Tags: ','</strong>', $value->tags, '<br><strong>',' Vistas: ','</strong>',$value->views,'<strong><br>','  Likes: ','</strong>', $value->likes, '<br><strong>','Descargar: ','</strong><a href="',$value->previewURL, '">', $value->previewURL,'</a>','</p>','</td>';
    
    //echo ;
    echo '</tr>';
}?>
        </tbody>
    </table>
</body>
</html>