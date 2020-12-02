<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sucursal extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("sucursal_m");
	}
	public function index()
	{
		$listarsucursal=$this->sucursal_m->listasucursal();
		$data['sucursal'] = $listarsucursal;
		$this->load->view('inc/header');
		$this->load->view('sucursal/sucursal_v', $data);
		$this->load->view('inc/footer');
	}
	public function modificar(){
		$id = $_POST['id'];
		$data['infousuario']=$this->sucursal_m->recuperarsucursal($id);
		$this->load->view('inc/header');
		$this->load->view('sucursal/editar_v', $data);
		$this->load->view('inc/footer');
	}
	public function modificarbd(){
		$id = $_POST['id'];
		$data['nombre'] = $_POST['nombre'];
		$data['telefono'] = $_POST['telefono'];
		$data['direccion'] = $_POST['direccion'];
		$this->sucursal_m->modificarsucursal($id, $data);
		redirect('sucursal/index','refresh');
	}
	public function registrar(){
		$this->load->view('inc/header');
		$this->load->view('sucursal/registrar_v');
		$this->load->view('inc/footer');
	}
	public function registrarbd(){
		$data['nombre'] = $_POST['nombre'];
		$data['telefono'] = $_POST['telefono'];
		$data['direccion'] = $_POST['direccion'];
		$data['idUsuario'] = $_POST['idUsuario'];
		$this->sucursal_m->agregarsucursal($data);
		redirect('sucursal/index', 'refresh');
	}
	public function eliminar(){
		$id=$_POST['id'];
		$data['estado'] = 0;
		$this->sucursal_m->eliminarsucursal($id, $data);
		redirect('sucursal/index', 'refresh');
	}
}
