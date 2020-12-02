<div class="container">
	<h1>Deliverys</h1>
	<?php
		$atributos = array('class' => 'form-goup', 'id' => 'delivery');
		echo form_open_multipart('delivery/registrar',$atributos);?>
		<button type="submit" class="btn btn-outline-primary">Añadir Delivery</button>
	<?php echo form_close(); ?>
	<table class="table">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Apellido P.</th>
				<th>Apellido M.</th>
				<th>Teléfono</th>
				<th>Dirección</th>
				<th>Modificar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($delivery->result() as $row) {
					?>
					<tr>
						<td><?php echo $row->nombre; ?></td>
						<td><?php echo $row->primerApellido; ?></td>
						<td><?php echo $row->segundoApellido; ?></td>
						<td><?php echo $row->telefono; ?></td>
						<td><?php echo $row->direccion; ?></td>
						<td>
							<?php
							$atributos = array('class' => 'form-goup', 'id' => 'delivery');
							echo form_open_multipart('delivery/editar',$atributos);?>
							<input type="hidden" name="id" value="<?php echo $row->iddelivery ?>">
							<button type="submit" class="btn btn-primary btn">Modificar</button>
							<?php echo form_close(); ?>
						</td>
						<td>
							<?php
							$atributos = array('class' => 'form-goup', 'id' => 'delivery');
							echo form_open_multipart('delivery/eliminar',$atributos);?>
							<input type="hidden" name="id" value="<?php echo $row->iddelivery ?>">
							<button type="submit" class="btn btn-danger btn">Eliminar</button>
							<?php echo form_close();?>
						</td>
					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
</div>
