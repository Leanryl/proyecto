<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delivery_m extends CI_Model{
	
	public function listadelivery(){
		$this->db->select('*');
		$this->db->from('delivery');
		$this->db->where('estado', 1);
		return $this->db->get();
	}
	public function recuperardelivery($id){
		$this->db->select('*');
		$this->db->from('delivery');
		$this->db->where('iddelivery',$id);
		return $this->db->get();
	}
	public function modificardelivery($id, $data){
		$this->db->where('iddelivery', $id);
		$this->db->update('delivery', $data);
	}
	public function agregardelivery($data){
		$this->db->insert('delivery', $data);
	}
	public function eliminardelivery($id, $data){
		$this->db->where('iddelivery', $id);
		$this->db->update('delivery', $data);
	}
}