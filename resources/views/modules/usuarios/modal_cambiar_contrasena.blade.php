
<!-- Modal -->
 <form action="frmPassword" onsubmit="return cambio_contrasena()">
  <div class="modal fade" id="cambiar_contrasena" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Escribe La Nueva Contraseña</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" hidden id="id_usuario" name="id_usuario">
        <label for="password">Contraseña Nueva</label>
        <input type="password" name="password" id="password" class="form-control" required> 
      </div>
      <div class="modal-footer">
        <span class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</span>
        <button class="btn btn-warning">Actualizar Contraseña</button>
      </div>
    </div>
  </div>
</div>
</form>
