<div class="container">
  <?php foreach ($sucu->result() as $s) {
  ?>
    <h2><?php echo $s->nombre;?>
    <small>Productos disponibles</small></h2>
  <?php
  } ?>
  <div class="row">
    <div class="col-md-4 mb-3">
      <?php
        $atributos = array('class' => 'form-goup', 'id' => 'producto');
        echo form_open_multipart('producto/registrar',$atributos);?>
        <input type="hidden" name="idSucursal" value="<?php echo $idSucursal;?>">
        <button type="submit" class="btn btn-outline-primary">Registrar producto</button>
      <?php echo form_close(); ?>
    </div>
    <div>
      <?php
        $atributos = array('class' => 'form-goup', 'id' => 'sucursal');
        echo form_open_multipart('sucursal/index',$atributos);?>
        <button type="submit" class="btn btn-outline-primary">Ver Sucursales</button>
      <?php echo form_close(); ?>
    </div>
  </div>
  <td>
  <table class="table">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Descripción</th>
        <th>Cantidad</th>
        <th></th>
        <th>Modificar</th>
        <th>Eliminar</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($producto->result() as $row) {
          ?>
          <tr>
            <td><?php echo $row->nombre; ?></td>
            <td><?php echo $row->precio; ?> bs</td>
            <td><?php echo $row->descripcion; ?></td>
            <?php
              $atributos = array('class' => 'form-goup', 'id' => 'producto');
              echo form_open_multipart('pedido/index',$atributos);?>
            <td><input type="number" id="cantidad" name="cantidad" value="1" min="1" max="10" style="width: 50px; text-align: center;"></td>
            <td>
              <input type="hidden" name="id" value="<?php echo $row->idProducto?>">
              <input type="hidden" name="idSucursal" value="<?php echo $idSucursal;?>">
              <input type="hidden" name="producto" value="<?php echo $row->nombre;?>">
              <button type="submit" class="btn btn-primary btn">Comprar</button>
              <?php echo form_close(); ?>
            </td>
            <td>
              <?php
              $atributos = array('class' => 'form-goup', 'id' => 'producto');
              echo form_open_multipart('producto/modificar',$atributos);?>
              <input type="hidden" name="id" value="<?php echo $row->idProducto ?>">
              <input type="hidden" name="idSucursal" value="<?php echo $idSucursal;?>">
              <button type="submit" class="btn btn-primary btn">Modificar</button>
              <?php echo form_close(); ?>
            </td>
            <td>
              <?php
              $atributos = array('class' => 'form-goup', 'id' => 'producto');
              echo form_open_multipart('producto/eliminar',$atributos);?>
              <input type="hidden" name="id" value="<?php echo $row->idProducto ?>">
              <input type="hidden" name="idSucursal" value="<?php echo $idSucursal;?>">
              <button type="submit" class="btn btn-danger btn">Eliminar</button>
              <?php echo form_close(); ?>
            </td>
          </tr>
          <?php
        }
      ?>
    </tbody>
  </table>
</div>
