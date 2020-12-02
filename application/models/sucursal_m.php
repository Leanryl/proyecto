<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sucursal_m extends CI_Model{
	
	public function listasucursal(){
		$this->db->select('*');
		$this->db->from('sucursal');
		$this->db->where('estado', 1);
		return $this->db->get();
	}

	public function getsucursal($id){
		$this->db->select('nombre');
		$this->db->from('sucursal');
		$this->db->where('estado', 1);
		$this->db->where('idSucursal', $id);
		return $this->db->get();
	}

	public function recuperarsucursal($id){
		$this->db->select('*');
		$this->db->from('sucursal');
		$this->db->where('idSucursal',$id);
		return $this->db->get();
	}
	public function modificarsucursal($id, $data){
		$this->db->where('idSucursal', $id);
		$this->db->update('sucursal', $data);
	}
	public function agregarsucursal($data){
		$this->db->insert('sucursal', $data);
	}
	public function eliminarsucursal($id, $data){
		$this->db->where('idSucursal', $id);
		$this->db->update('sucursal', $data);
	}
}