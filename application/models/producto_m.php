<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto_m extends CI_Model{
	
	public function listaproducto($id){
		$this->db->select('*');
		$this->db->from('producto');
		$this->db->where('estado', 1);
		$this->db->where('idSucursal', $id);
		return $this->db->get();
	}

	public function getproducto($id1, $id2){
		$this->db->select('*');
		$this->db->from('producto');
		$this->db->where('estado', 1);
		$this->db->where('idSucursal', $id1);
		$this->db->where('idProducto', $id2);
		return $this->db->get();
	}

	public function recuperarproducto($id){
		$this->db->select('*');
		$this->db->from('producto');
		$this->db->where('idProducto',$id);
		return $this->db->get();
	}
	public function modificarproducto($id, $data){
		$this->db->where('idProducto', $id);
		$this->db->update('producto', $data);
	}
	public function agregarproducto($data){
		$this->db->insert('producto', $data);
	}
	public function eliminarproducto($id, $data){
		$this->db->where('idProducto', $id);
		$this->db->update('producto', $data);
	}
}