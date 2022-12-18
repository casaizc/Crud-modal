<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLabel">Editar Registro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="actualiza.php" method="post" enctype="multipart/form-data">

        <input type="hidden" id="id" name="id">

            <div class="mb-3">
              <label for="nombre" class=form-label>NOMBRES</label>
              <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="apellido" class=form-label>APELLIDOS</label>
              <input type="text" name="apellido" id="apellido" class="form-control" rows="3" required>
            </div>
            <div class="mb-3">
              <label for="edad" class=form-label>EDAD</label>
              <input type="number" name="edad" id="edad" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="rol" class=form-label>TIPO DE USUARIO</label>
              <select name="rol" id="rol" class="form-select" required>
                <option value="">Seleccionar...</option>
                <?php while ($row_rol = $rol->fetch_assoc()) {?>
                    <option value="<?php echo $row_rol["ID_ROL"]; ?>"><?= $row_rol["ROL"]?></option>
                    <?php } ?>
              </select>
            </div>

            <div class="mb-3">
              <label for="tipo_documento" class=form-label>TIPO DE DOCUMENTO</label>
              <select name="tipo_documento" id="tipo_documento" class="form-select" required>
                <option value="">Seleccionar...</option>
               <option value="Cedula">Cedula Ciudadania</option>
               <option value="Cedula Extrangera">Cedula Extrangera</option>
               <option value="NIT">NIT</option>
               <option value="RUC">RUC</option>
               <option value="Tarjeta Identidad">Tarjeta Identidad</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="documento" class=form-label>DOCUMENTO   .      (Ingrese numero de documento sin puntos ni espacios)</label>
              <input type="number" name="documento" id="documento" class="form-control" required>
            </div>

            <div class="mb-3">
              <img id="img_foto" width="100">
            </div>

            <div class="mb-3">
              <label for="foto" class=form-label>FOTO</label>
              <input type="file" name="foto" id="foto" class="form-control" accept="image/jpeg>">
            </div>
            

            <div class="">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-rectangle-xmark"></i>
                Cerrar</button>
               <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>
                Guardar Cambios</button>
            </div>

        </form>
      </div>
    </div>
  </div>
</div>