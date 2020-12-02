<div class="abs-center" style="display: flex;align-items: center;justify-content: center;min-height: 70vh;">
<?php 
  $atributos = array('class' => 'form-group', 'id' => 'myform');
  echo form_open_multipart('pedido/registrarbd', $atributos);
?>
    <div class="row">
      <div class="col-sm-9">
        <h2 align="center">Pedido</h2><br><br>
        <div class="row">
          <div class="col-8 col-sm-7">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="firstName">Nombre</label>
                  <input type="text" class="form-control" name="nombre" value="<?php echo $this->session->userdata('nombre');?>" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="telefono">Teléfono</label>
                  <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $this->session->userdata('telefono');?>" required>
                </div>
              </div>
              <div>
                <label for="direccion">Direccion</label>
                <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Av. Heroinas" value="<?php echo $this->session->userdata('direccion');?>" required>
              </div><br>
              <div class="row">
                <div class="col-md-4 mb-3">
                  <label>Delivery</label> 
                </div>
                <div class="col-md-7 mb-3">
                  <select class="form-control" name="delivery" style="width: 230px;">
                  <?php 
                  foreach ($delivery->result() as $deli) {
                  ?>
                  <option value="<?php echo $deli->iddelivery;?>"><?php echo $deli->nombre;?> <?php echo $deli->primerApellido;?> <?php echo $deli->segundoApellido;?></option>
                  <?php
                    }
                  ?>
                  </select>
                </div>
              </div>
              
              <hr>
              <table class="table">
              <thead>
                <tr>
                  <th>Producto</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                </tr>
              </thead>
              <tbody>
              <?php
                foreach ($pedido->result() as $row) {
                  ?>
                  <tr>
                    <td><?php echo $row->nombre; ?></td>
                    <td><?php echo $row->precio; ?> bs</td>
                    <td><?php echo $cantidad;?></td>
                  </tr>
              </tbody>
              </table>
              <label>Total a pagar: <?php echo ($row->precio * $cantidad);?> bs</label>
              <input type="hidden" name="cantidad" value="<?php echo $cantidad;?>">
              <input type="hidden" name="idProducto" value="<?php echo $row->idProducto;?>">
              <input type="hidden" name="total" value="<?php echo ($row->precio * $cantidad);?>">
              <input type="hidden" name="idUsuario" value="<?php echo $this->session->userdata('idUsuario');?>">
              <?php
                }
              ?>
          </div>
          <div class="col-8 col-sm-4">
              <style type="text/css">
                #map {
                  height: 400px;
                  width: 420px;
                }
              </style>
              <div id="map"></div>
              <script type="text/javascript">
              var divmapa = document.getElementById("map");
              function initMap() {
                var opciones = {
                  zoom:16,
                  center:{lat: -17.403876, lng: -66.166729}
                }
                var map=new google.maps.Map(divmapa,opciones);
                var direccion = {lat: -17.403876, lng: -66.166729};
                var marker = new google.maps.Marker({
                position: direccion,
                map: map});
                google.maps.event.trigger(marker,'click');
              }
              </script>
              <script defer
                  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHF3Oxu7TEUfQ6XaMBrSIZLZNXTkPBQqQ&callback=initMap">
              </script>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div>
      <button type="submit" class="btn btn-primary btn-lg btn-block">Realizar pedido</button>
<?php
  echo form_close();
?>
      <?php 
        $atributos = array('class' => 'form-group', 'id' => 'cancelar');
        echo form_open_multipart('producto/index', $atributos);
      ?>
        <button class="btn btn-lg btn-primary btn-block" style="margin-top: 1px;">Cancelar</button>
      <?php
        echo form_close();
      ?>
    </div>
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