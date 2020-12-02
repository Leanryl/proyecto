<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/dist/css/bootstrap.css">
</head>
<body>
<div class="abs-center" style="display: flex;align-items: center;justify-content: center;min-height: 70vh;">
<?php 
  $atributos = array('class' => 'form-group', 'id' => 'myform');
  echo form_open_multipart('delivery/registrarbd', $atributos);
?>
      <h2 align="center">Registro delivery</h2><br><br>
      <div class="row">  
        <div class="col-md-12 order-md-1">
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="firstName">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" required>
              </div>
              <div class="col-md-4 mb-3">
                <label for="primerApellido">Apellido Paterno</label>
                <input type="text" class="form-control" name="primerApellido" id="primerApellido" placeholder="" required>
              </div>
              <div class="col-md-4 mb-3">
                <label for="segundoApellido">Apellido Materno</label>
                <input type="text" class="form-control" name="segundoApellido" id="segundoApellido" placeholder="" value="">
              </div>
            </div>
            <div class="mb-3">
              <label for="telefono">Telefono</label>
              <div class="input-group">
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" required>
              </div>
            </div>
            <div class="mb-3">
              <label for="direccion">Direccion</label>
              <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Av. Heroinas" required>
            </div>
            <hr class="mb-4">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Registrar</button>
        </div>
      </div>
<?php echo form_close();
?>  
</div>
<style type="text/css">
  #myform{
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
<script src="<?php echo base_url(); ?>bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>