<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/dist/css/bootstrap.css">
</head>
<?php
// style="background-image: url(<?php echo base_url();;;img/fondo.png);background-size: cover;"
?>
<body>
	<div class="row">  
        <div class="col-md-12 order-md-1">
            <div class="row">
            	<div class="col-md-6 mb-3">
            		<h1>Hola <?php echo $this->session->userdata('username'); ?></h1>
            	</div>
              	<div class="col-md-6 mb-3" align="right">
				<?php
					$atributos = array('class' => 'form-group', 'id' => 'logout');
					echo form_open_multipart('usuario/logout',$atributos);?>
					<button type="submit" style="margin-top: 20px;" class="btn btn-primary btn">Cerrar sesion</button>
				<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>