<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function index()
	{
		$data['msg']=$this->uri->segment(3);
		if($this->session->userdata('login'))
		{
			redirect('usuarios/panel','refresh');
		}
		else
		{
			$this->load->view('loginform',$data);
		}	
	}

	public function validarusuario()
	{
		$login=$_POST['login'];
		$password=md5($_POST['password']);
		$consulta=$this->usuarios_model->validar($login,$password);

		if($consulta->num_rows()>0)
		{
			foreach ($consulta->result() as $row) 
			{
				$this->session->set_userdata('idusuario',$row->idusuario);
				$this->session->set_userdata('login',$row->login);
				$this->session->set_userdata('tipo',$row->tipo);
				redirect('usuarios/panel','refresh');
			}
		}
		else
		{
			redirect('usuarios/index/1','refresh');
		}
	}

	public function panel()
	{
		if($this->session->userdata('login'))
		{
			$this->load->view('panelvista');
		}
		else
		{
			redirect('usuarios/index/2','refresh');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('usuarios/index/3','refresh');
	}
}

