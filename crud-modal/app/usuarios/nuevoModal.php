<div class="modal fade" id="nuevoModal" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="nuevoModalLabel">Agregar Registro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="guarda.php" method="post" enctype="multipart/form-data">

            <div class="mb-3">
              <label for="NOMBRE" class=form-label>NOMBRES</label>
              <input type="text" name="NOMBRE" id="NOMBRE" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="APELLIDO" class=form-label>APELLIDOS</label>
              <input type="text" name="APELLIDO" id="APELLIDO" class="form-control" rows="3" required>
            </div>
            <div class="mb-3">
              <label for="EDAD" class=form-label>EDAD</label>
              <input type="number" name="EDAD" id="EDAD" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="ROL" class=form-label>TIPO DE USUARIO</label>
              <select name="ROL" id="ROL" class="form-select" required>
                <option value="">Seleccionar...</option>
                <?php while ($row_rol = $rol->fetch_assoc()) {?>
                    <option value="<?php echo $row_rol["ID_ROL"]; ?>"><?= $row_rol["ROL"]?></option>
                    <?php } ?>
              </select>
            </div>

            <div class="mb-3">
              <label for="TIPO_DOCUMENTO" class=form-label>TIPO DE DOCUMENTO</label>
              <select name="TIPO_DOCUMENTO" id="TIPO_DOCUMENTO" class="form-select" required>
                <option value="">Seleccionar...</option>
               <option value="Cedula">Cedula Ciudadania</option>
               <option value="Cedula Extrangera">Cedula Extrangera</option>
               <option value="NIT">NIT</option>
               <option value="RUC">RUC</option>
               <option value="Tarjeta Identidad">Tarjeta Identidad</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="DOCUMENTO" class=form-label>DOCUMENTO   .      (Ingrese numero de documento sin puntos ni espacios)</label>
              <input type="number" name="DOCUMENTO" id="DOCUMENTO" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="FOTO" class=form-label>FOTO</label>
              <input type="file" name="FOTO" id="FOTO" class="form-control" accept="image/jpeg>">
            </div>
            

            <div class="">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-rectangle-xmark"></i>
                Close</button>
               <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>
                Save changes</button>
            </div>

        </form>
      </div>
    </div>
  </div>
</div>