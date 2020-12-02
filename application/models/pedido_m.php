<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedido_m extends CI_Model{
	
	public function listapedido(){
		$this->db->select('*');
		$this->db->from('pedido');
		$this->db->where('estado', 1);
		return $this->db->get();
	}
	public function lastID(){
		return $this->db->insert_id();
	}
	public function recuperarpedido($id){
		$this->db->select('*');
		$this->db->from('pedido');
		$this->db->where('idpedido',$id);
		return $this->db->get();
	}
	public function modificarpedido($id, $data){
		$this->db->where('idpedido', $id);
		$this->db->update('pedido', $data);
	}
	public function agregarpedido($data){
		return $this->db->insert('pedido', $data);
	}
	public function agregardetalle($data){
		$this->db->insert('detallepedido', $data);
	}
	public function eliminarpedido($id, $data){
		$this->db->where('idpedido', $id);
		$this->db->update('pedido', $data);
	}
}