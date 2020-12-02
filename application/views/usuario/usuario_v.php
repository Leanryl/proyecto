<div class="container">
	<h1>Lista de Usuarios</h1>
	<?php
		$atributos = array('class' => 'form-goup', 'id' => 'usuario');
		echo form_open_multipart('usuario/registrar',$atributos);?>
		<button type="submit" class="btn btn-outline-primary">Registrar Usuario</button>
	<?php echo form_close(); ?>
	<table class="table">
		<thead>
			<tr>
				<th>No.</th>
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
				$indice=1;
				foreach ($usuario->result() as $row) {
					?>
					<tr>
						<td><?php echo $indice; ?></td>
						<td><?php echo $row->nombre; ?></td>
						<td><?php echo $row->primerApellido; ?></td>
						<td><?php echo $row->segundoApellido; ?></td>
						<td><?php echo $row->telefono; ?></td>
						<td><?php echo $row->direccion; ?></td>
						<td>
							<?php
							$atributos = array('class' => 'form-goup', 'id' => 'usuario');
							echo form_open_multipart('usuario/editar',$atributos);?>
							<input type="hidden" name="id" value="<?php echo $row->idUsuario ?>">
							<button type="submit" class="btn btn-primary btn">Modificar</button>
							<?php echo form_close(); ?>
						</td>
						<td>
							<?php
							$atributos = array('class' => 'form-goup', 'id' => 'usuario');
							echo form_open_multipart('usuario/eliminar',$atributos);?>
							<input type="hidden" name="id" value="<?php echo $row->idUsuario ?>">
							<button type="submit" class="btn btn-danger btn">Eliminar</button>
							<?php echo form_close(); ?>
						</td>
					</tr>
					<?php $indice++;
				}
			?>
		</tbody>
	</table>
</div>
