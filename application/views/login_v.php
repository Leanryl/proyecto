<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/dist/css/bootstrap.css">
</head>
<body>
<div class="abs-center" style="display: flex;align-items: center;justify-content: center;">
  <div class="row" id="cuerpo">
        <?php
        /*
        $prueba=array(
          'cliente' => $cliente,
          'producto' => $producto,
          'precio' => $precio,
          'delivery' => $delivery
        );
        foreach ($prueba->result() as $n) {
          echo $n->cliente;
          echo $n->producto;
          echo $n->precio;
          echo $n->delivery;
        }
        $prueba = null;
        */
        $atributos = array('class' => 'form-group', 'id' => 'myform');
        echo form_open_multipart('usuario/validarusuario', $atributos);
        ?>
        <div align="center">
          <img class="img-circle" src="<?php echo base_url();?>img/logo2.jpg" alt="Cinque Terre" style="width: 150px;">
        </div>
        <h1 class="h3 mb-3 font-weight-normal">Inicia sesión</h1>
        <?php
        switch ($msg) {
          case '1':
          ?>
            <div class="alert alert-danger" role="alert">
              Error de datos
            </div>
          <?php
            break;
          case '2':
            ?>
            <div class="alert alert-danger" role="alert">
              Acceso no válido
            </div>;
          <?php
            break;
          case '3':
          ?>
            <div class="alert alert-success" role="alert">
              Gracias por usar el sistema
            </div>
          <?php
            break;
          default:
            echo "";
            break;
        }
        ?>
        <input type="text" name="username" class="form-control" placeholder="Nombre Usuario" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Contraseña" required>  
        <div class="">
          <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top: 5px;">Ingresar</button>
          <?php
          echo form_close();
          ?>
          <?php 
            $atributos = array('class' => 'form-group', 'id' => 'myform');
            echo form_open_multipart('usuario/registrar', $atributos);
          ?>
            <button class="btn btn-lg btn-primary btn-block" style="margin-top: 1px;">Registrarse</button>
          <?php
            echo form_close();
          ?>
      </div>
  </div>
</div>

<style type="text/css">
  #cuerpo{
    margin:auto; 
    background:rgba(21,18,37,0.05); 
    padding: 20px 20px; 
    box-sizing: border-box;
    margin-top:30px;
    border-radius: 40px;
    width: 350px;
  }
</style>
<script src="<?php echo base_url(); ?>bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>
