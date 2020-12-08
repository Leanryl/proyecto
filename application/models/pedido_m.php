<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedido_m extends CI_Model{
	
	public function listapedido(){
		$this->db->select('*');
		$this->db->from('pedido');
		$this->db->where('estado', 1);
		return $this->db->get();
	}
	public function reportesucursal($id){
		$this->db->select("u.nombre as cliente,u.idUsuario, s.nombre as sucursal, pr.nombre as producto, pr.precio, dp.cantidad, p.montoTotal, p.fechaPedido, dv.nombre as delivery");
		$this->db->from("detallepedido dp");
		$this->db->join("pedido p","dp.idpedido = p.idpedido");
		$this->db->join("producto pr","dp.idProducto = pr.idProducto");
		$this->db->join("delivery dv","dp.iddelivery = dv.iddelivery");
		$this->db->join("usuario u","p.idUsuario = u.idUsuario");
		$this->db->join("sucursal s","pr.idSucursal = s.idSucursal");
		$this->db->where("s.idSucursal",$id);
		return $this->db->get();
	}
	public function getRecibo($id){
		$this->db->select("u.nombre as cliente,u.idUsuario, s.nombre as sucursal, pr.nombre as producto, pr.precio, dp.cantidad, p.montoTotal, p.fechaPedido, dv.nombre as delivery");
		$this->db->from("detallepedido dp");
		$this->db->join("pedido p","dp.idpedido = p.idpedido");
		$this->db->join("producto pr","dp.idProducto = pr.idProducto");
		$this->db->join("delivery dv","dp.iddelivery = dv.iddelivery");
		$this->db->join("usuario u","p.idUsuario = u.idUsuario");
		$this->db->join("sucursal s","pr.idSucursal = s.idSucursal");
		$this->db->where("dp.idpedido",$id);
		$this->db->where("p.idpedido",$id);
		return $this->db->get();
	}
	public function getPedidos($id){
		$this->db->select("u.nombre as cliente,u.idUsuario, s.nombre as sucursal, pr.nombre as producto, pr.precio, dp.cantidad, p.montoTotal, p.fechaPedido, dv.nombre as delivery");
		$this->db->from("detallepedido dp");
		$this->db->join("pedido p","dp.idpedido = p.idpedido");
		$this->db->join("producto pr","dp.idProducto = pr.idProducto");
		$this->db->join("delivery dv","dp.iddelivery = dv.iddelivery");
		$this->db->join("usuario u","p.idUsuario = u.idUsuario");
		$this->db->join("sucursal s","pr.idSucursal = s.idSucursal");
		$this->db->where("p.idUsuario",$id);
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