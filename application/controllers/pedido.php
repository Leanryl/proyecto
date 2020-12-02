<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedido extends CI_Controller {

	public $cant = array();
	
	public function __construct(){
		parent::__construct();
		$this->load->model("producto_m");
		$this->load->model("pedido_m");
		$this->load->model("delivery_m");
		$this->load->model("sucursal_m");
	}

	public function comprar(){
		$aux = $_POST['id'];
		$cant[$aux] = $_POST['producto'];
		redirect('producto/index','refresh');
	}
	
	public function index()
	{
		$id=$_POST['id'];
		$id2=$_POST['idSucursal'];
		$data['pedido'] = $this->producto_m->getproducto($id2, $id);
		//$data['sucursal'] = $this->sucursal_m->getproducto();
		$data['delivery'] = $this->delivery_m->listadelivery();
		$data['cantidad'] = $_POST['cantidad'];
		$this->load->view('inc/header');
		$this->load->view('pedido/pedido_v', $data);
		$this->load->view('inc/footer');
	}
	public function modificar(){
		$id = $_POST['id'];
		$data['infousuario']=$this->pedido_m->recuperarpedido($id);
		$this->load->view('inc/header');
		$this->load->view('pedido/editar_v', $data);
		$this->load->view('inc/footer');
	}
	public function modificarbd(){
		$id = $_POST['id'];
		$data['nombre'] = $_POST['nombre'];
		$data['telefono'] = $_POST['telefono'];
		$data['direccion'] = $_POST['direccion'];
		$this->pedido_m->modificarpedido($id, $data);
		redirect('pedido/index','refresh');
	}
	public function registrar(){
		$this->load->view('inc/header');
		$this->load->view('pedido/registrar_v');
		$this->load->view('inc/footer');
	}
	public function registrarbd(){
		$data['idUsuario'] = $_POST['idUsuario'];
		$data['montoTotal'] = $_POST['total'];
		if($this->pedido_m->agregarpedido($data)){
			$idpedido = $this->pedido_m->lastID();
			$data2['idpedido'] = $idpedido;
			$data2['idProducto'] = $_POST['idProducto'];
			$data2['cantidad'] = $_POST['cantidad'];
			$data2['iddelivery'] = $_POST['delivery'];
			$this->pedido_m->agregardetalle($data2);
			redirect('producto/index', 'refresh');
			echo "realizado";
		}
		else{
			echo "error";
		}
		
	}

	public function eliminar(){
		$id=$_POST['id'];
		$data['estado'] = 0;
		$this->pedido_m->eliminarpedido($id, $data);
		redirect('pedido/index', 'refresh');
	}
}
