<div class="container">
	<h2>Lista de Sucursales disponibles</h1>
	<?php
		$atributos = array('class' => 'form-goup', 'id' => 'sucursal');
		echo form_open_multipart('sucursal/registrar',$atributos);?>
		<button type="submit" class="btn btn-outline-primary">Agregar sucursal</button>
	<?php echo form_close(); ?>
	<table class="table">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Teléfono</th>
				<th>Dirección</th>
				<th>Productos</th>
				<th>Modificar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($sucursal->result() as $row) {
					?>
					<tr>
						<td><?php echo $row->nombre; ?></td>
						<td><?php echo $row->telefono; ?></td>
						<td><?php echo $row->direccion; ?></td>
						<td>
							<?php
							$atributos = array('class' => 'form-goup', 'id' => 'producto');
							echo form_open_multipart('producto/idsucu',$atributos);?>
							<input type="hidden" name="id" value="<?php echo $row->idSucursal;?>">
							<button type="submit" class="btn btn-primary btn">Productos</button>
							<?php echo form_close(); ?>
						</td>
						<td>
							<?php
							$atributos = array('class' => 'form-goup', 'id' => 'sucursal');
							echo form_open_multipart('sucursal/modificar',$atributos);?>
							<input type="hidden" name="id" value="<?php echo $row->idSucursal;?>">
							<button type="submit" class="btn btn-primary btn">Modificar</button>
							<?php echo form_close(); ?>
						</td>
						<td>
							<?php
							$atributos = array('class' => 'form-goup', 'id' => 'sucursal');
							echo form_open_multipart('sucursal/eliminar',$atributos);?>
							<input type="hidden" name="id" value="<?php echo $row->idSucursal;?>">
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
