<div class="container">
  <?php
    $atributos = array('class' => 'form-goup', 'id' => 'recibo');
    echo form_open_multipart('pedido/listapdf',$atributos);?>
    <button type="submit" class="btn btn-outline-primary">Recibo</button>
  <?php echo form_close(); ?>
  <td>
  <table class="table">
    <thead>
      <tr>
        <th>Cliente</th>
        <th>Sucursal</th>
        <th>Producto</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Monto Total</th>
        <th>Fecha</th>
        <th>Delivery</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($lista->result() as $row) {
          ?>
          <tr>
            <td><?php echo $row->cliente; ?></td>
            <td><?php echo $row->sucursal; ?></td>
            <td><?php echo $row->producto; ?></td>
            <td><?php echo $row->precio; ?></td>
            <td><?php echo $row->cantidad; ?></td>
            <td><?php echo $row->montoTotal; ?></td>
            <td><?php echo $row->fechaPedido; ?></td>
            <td><?php echo $row->delivery; ?></td>
          </tr>
          <?php
        }
      ?>
    </tbody>
  </table>
</div>
