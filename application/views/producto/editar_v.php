<div class="abs-center" style="display: flex;align-items: center;justify-content: center;min-height: 70vh;">
<?php 
  $atributos = array('class' => 'form-group', 'id' => 'myform');
  echo form_open_multipart('producto/modificarbd', $atributos);
  foreach ($infoproducto->result() as $row) {
?>
      <input type="hidden" name="id" value="<?php echo $row->idProducto;?>">
      <h2 align="center">Modificar producto</h2><br><br>
      <div class="row">  
        <div class="col-md-12 order-md-1">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $row->nombre;?>" id="nombre" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" name="precio" value="<?php echo $row->precio;?>" id="precio" required>
              </div>
            </div>
            <div class="mb-3">
              <label for="descripcion">Descripcion</label>
              <input type="text" class="form-control" name="descripcion" value="<?php echo $row->descripcion; ?>" id="direccion" required>
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