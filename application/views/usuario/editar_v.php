<div class="abs-center" style="display: flex;align-items: center;justify-content: center;min-height: 70vh;">
<?php 
  $atributos = array('class' => 'form-group', 'id' => 'myform');
  echo form_open_multipart('usuario/editarbd', $atributos);
  foreach ($infousuario->result() as $row) {
?>
      <h2 align="center">Editar Usuario</h2><br><br>
      <div class="row">  
      	<input type="hidden" name="id" value="<?php echo $row->idUsuario; ?>">
        <div class="col-md-12 order-md-1">
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="firstName">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $row->nombre;?>" required>
              </div>
              <div class="col-md-4 mb-3">
                <label for="primerApellido">Apellido Paterno</label>
                <input type="text" class="form-control" name="primerApellido" id="primerApellido" value="<?php echo $row->primerApellido; ?>" required>
              </div>
              <div class="col-md-4 mb-3">
                <label for="segundoApellido">Apellido Materno</label>
                <input type="text" class="form-control" name="segundoApellido" id="segundoApellido" value="<?php echo $row->segundoApellido; ?>">
              </div>
            </div>
            <div class="mb-3">
              <label for="telefono">Telefono</label>
              <div class="input-group">
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $row->telefono; ?>" required>
              </div>
            </div>
            <div class="mb-3">
              <label for="direccion">Direccion</label>
              <input type="text" class="form-control" name="direccion" id="direccion" value="<?php echo $row->direccion; ?>" required>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
              <label for="username">Usuario</label>
              <div class="input-group">
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $row->username; ?>" required>
              </div>
            </div>  
            </div>
            <hr class="mb-4">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Modificar</button>
        </div>
      </div>
	<?php 
	}
	  echo form_close();
	?>  
</div>
<style type="text/css">
  
  form{
    margin:auto; 
    background:rgba(21,18,37,0.05); 
    padding: 20px 20px; 
    box-sizing: border-box;
    margin-top:30px;
    border-radius: 7px;
  }
  label{
    font-size: 16px;
  }
  h2{
    font-size: 40px;
  }
</style>