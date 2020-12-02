<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delivery extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("delivery_m");
	}
	public function index()
	{
		$listardelivery=$this->delivery_m->listadelivery();
		$data['delivery'] = $listardelivery;
		$this->load->view('inc/header');
		$this->load->view('delivery/delivery_v', $data);
		$this->load->view('inc/footer');
	}
	public function modificar(){
		$id = $_POST['id'];
		$data['infodelivery']=$this->delivery_m->recuperardelivery($id);
		$this->load->view('inc/header');
		$this->load->view('delivery/editar_v', $data);
		$this->load->view('inc/footer');
	}
	public function modificarbd(){
		$id = $_POST['id'];
		$data['nombre'] = $_POST['nombre'];
		$data['primerApellido'] = $_POST['primerApellido'];
		$data['segundoApellido'] = $_POST['segundoApellido'];
		$data['telefono'] = $_POST['telefono'];
		$data['direccion'] = $_POST['direccion'];
		$this->delivery_m->modificardelivery($id, $data);
		redirect('delivery/index','refresh');
	}
	public function registrar(){
		$this->load->view('inc/header');
		$this->load->view('delivery/registrar_v');
		$this->load->view('inc/footer');
	}
	public function registrarbd(){
		$data['nombre'] = $_POST['nombre'];
		$data['primerApellido'] = $_POST['primerApellido'];
		$data['segundoApellido'] = $_POST['segundoApellido'];
		$data['telefono'] = $_POST['telefono'];
		$data['direccion'] = $_POST['direccion'];
		$this->delivery_m->agregardelivery($data);
		redirect('delivery/index', 'refresh');
	}
	public function eliminar(){
		$id=$_POST['id'];
		$data['estado'] = 0;
		$this->delivery_m->eliminardelivery($id, $data);
		redirect('delivery/index', 'refresh');
	}
}
