<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("usuario_m");
	}
	public function index()
	{
		$data['msg']=$this->uri->segment(3);
		if($this->session->userdata('username'))
		{
			redirect('usuario/panel','refresh');
		}
		else
		{
			$this->load->view('login_v',$data);
		}	
	}
	public function validarusuario()
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$consulta=$this->usuario_m->validar($username,$password);

		if($consulta->num_rows()>0)
		{
			foreach ($consulta->result() as $row) 
			{

				$this->session->set_userdata('idUsuario',$row->idUsuario);
				$this->session->set_userdata('username',$row->username);
				$this->session->set_userdata('nombre',$row->nombre);
				$this->session->set_userdata('telefono',$row->telefono);
				$this->session->set_userdata('direccion',$row->direccion);
				$this->session->set_userdata('sucu',0);
				//$this->session->set_userdata('tipo',$row->tipo);
				redirect('usuario/panel','refresh');
			}
		}
		else
		{
			redirect('usuario/index/1','refresh');
		}
	}
	public function panel()
	{
		if($this->session->userdata('username'))
		{
			redirect('sucursal/index', 'refresh');
		}
		else
		{
			redirect('usuario/index/2','refresh');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('usuario/index/3','refresh');
	}
	public function lista()
	{
		$listausuario=$this->usuario_m->listarusuario();
		$data['usuario'] = $listausuario;
		$this->load->view('inc/header');
		$this->load->view('usuario/usuario_v', $data);
		$this->load->view('inc/footer');
	}
	public function editar(){
		$id=$_POST['id'];
		$data['infousuario']=$this->usuario_m->recuperarusuario($id);
		$this->load->view('inc/header');
		$this->load->view('usuario/modificarusuario_vista', $data);
		$this->load->view('inc/footer');
	}
	public function editarbd(){
		$id = $_POST['id'];
		$data['nombre'] = $_POST['nombre'];
		$data['primerApellido'] = $_POST['primerApellido'];
		$data['segundoApellido'] = $_POST['segundoApellido'];
		$data['telefono'] = $_POST['telefono'];
		$data['direccion'] = $_POST['direccion'];
		$data['username'] = $_POST['username'];
		$this->usuario_m->modificarusuario($id, $data);
		redirect('usuario/lista','refresh');
	}
	public function registrar(){
		$this->load->view('usuario/registrar_v');
	}
	public function registrarbd(){
		$data['nombre'] = $_POST['nombre'];
		$data['primerApellido'] = $_POST['primerApellido'];
		$data['segundoApellido'] = $_POST['segundoApellido'];
		$data['telefono'] = $_POST['telefono'];
		$data['direccion'] = $_POST['direccion'];
		$data['username'] = $_POST['username'];
		$data['password'] = $_POST['password'];
		$this->usuario_m->agregarusuario($data);
		$username=$_POST['username'];
		$password=$_POST['password'];
		$consulta=$this->usuario_m->validar($username,$password);

		if($consulta->num_rows()>0)
		{
			foreach ($consulta->result() as $row) 
			{
				$this->session->set_userdata('idUsuario',$row->idUsuario);
				$this->session->set_userdata('username',$row->username);
				$this->session->set_userdata('nombre',$row->nombre);
				$this->session->set_userdata('telefono',$row->telefono);
				$this->session->set_userdata('direccion',$row->direccion);
				$this->session->set_userdata('sucu',0);
			}
		}
		redirect('sucursal/index', 'refresh');
	}
	public function eliminar(){
		$id=$_POST['id'];
		$data['estado'] = 0;
		$this->usuario_m->eliminarusuario($id, $data);
		redirect('usuario/lista', 'refresh');
	}
}
