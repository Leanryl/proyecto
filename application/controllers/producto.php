<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("producto_m");
		$this->load->model("sucursal_m");
	}

	public function idsucu(){
		$this->session->set_userdata('sucu',$_POST['id']);
		redirect('producto/index','refresh');
	}

	public function index()
	{
		$data['idSucursal'] = $this->session->userdata('sucu');
		$listarproducto=$this->producto_m->listaproducto($data['idSucursal']);
		$data['producto'] = $listarproducto;
		$nombsucursal=$this->sucursal_m->getsucursal($data['idSucursal']);
		$data['sucu'] = $nombsucursal;
		$this->load->view('inc/header');
		$this->load->view('producto/producto_v', $data);
		$this->load->view('inc/footer');
	}
	public function modificar(){
		$id = $_POST['id'];
		$data['infoproducto']=$this->producto_m->recuperarproducto($id);
		$this->load->view('inc/header');
		$this->load->view('producto/editar_v', $data);
		$this->load->view('inc/footer');
	}
	public function modificarbd(){
		$id = $_POST['id'];
		$data['nombre'] = $_POST['nombre'];
		$data['precio'] = $_POST['precio'];
		$data['descripcion'] = $_POST['descripcion'];
		$this->producto_m->modificarproducto($id, $data);
		redirect('producto/index','refresh');
	}
	public function registrar(){
		$data['idSucursal'] = $_POST['idSucursal'];
		$this->load->view('inc/header');
		$this->load->view('producto/registrar_v', $data);
		$this->load->view('inc/footer');
	}
	public function registrarbd(){
		$data['nombre'] = $_POST['nombre'];
		$data['precio'] = $_POST['precio'];
		$data['descripcion'] = $_POST['descripcion'];
		$data['idSucursal'] = $_POST['idSucursal'];
		$this->producto_m->agregarproducto($data);
		redirect('producto/index', 'refresh');
	}
	public function eliminar(){
		$id=$_POST['id'];
		$data['estado'] = 0;
		$this->producto_m->eliminarproducto($id, $data);
		redirect('producto/index', 'refresh');
	}
}
