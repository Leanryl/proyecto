<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedido extends CI_Controller {

	public $cant = array();
	
	public function __construct(){
		parent::__construct();
		$this->load->model("producto_m");
		$this->load->model("pedido_m");
		$this->load->model("delivery_m");
		$this->load->model("sucursal_m");
	}
	public function listapdf(){
		$this->load->library('pdf');
		$pedido = $this->pedido_m->getPedidos($this->session->userdata('idUsuario'));
		$pedido = $pedido->result();

		$this->pdf = new Pdf();
		$this->pdf->AddPage();
		$this->pdf->AliasNbPages();
		$this->pdf->SetTitle("Recibo");
		$this->pdf->SetLeftMargin(15);
		$this->pdf->SetRightMargin(15);
		$this->pdf->SetFillColor(210,210,210);
		$this->pdf->SetFont('Arial','B',11);
		$this->pdf->Cell(30);
		$this->pdf->Cell(120,10,'Recibo de Pedido',0,0,'C');
		//ancho,alto,texto a mostrar,borde(LTRB),0 a la derecha-1 sig linea-2 debajo,centrado
		$this->pdf->Ln(10); // debe ser exacto
		// Celdas
		$this->pdf->Cell(35,5,utf8_decode("Cliente"),'TBLR',0,'L',1);
		//$this->pdf->Cell(50,5,utf8_decode(" "),0,0,'L',0);
		$this->pdf->Cell(25,5,utf8_decode("Sucursal"),'TBLR',0,'L',1);

		$this->pdf->Ln(5);
		$n = 1;
		foreach ($pedido as $row) {
			$cliente = $row->cliente;
			$sucursal = $row->sucursal;
			$this->pdf->Cell(35,5,utf8_decode($cliente),'TBLR',0,'L',0);
			$this->pdf->Cell(25,5,utf8_decode($sucursal),'TBLR',0,'L',0);
			$this->pdf->Ln(5);
			$n++;
		}
		$this->pdf->Cell(35,5,utf8_decode("Producto"),'TBLR',0,'L',1);
		$this->pdf->Cell(15,5,utf8_decode("Precio"),'TBLR',0,'L',1);
		$this->pdf->Cell(20,5,utf8_decode("Cantidad"),'TBLR',0,'L',1);
		$this->pdf->Cell(15,5,utf8_decode("Total"),'TBLR',0,'L',1);
		$this->pdf->Cell(45,5,utf8_decode("Fecha"),'TBLR',0,'L',1);
		$this->pdf->Cell(25,5,utf8_decode("Delivery"),'TBLR',0,'L',1);
		$this->pdf->Ln(5);
		foreach ($pedido as $row2) {
			$producto = $row2->producto;
			$precio = $row2->precio;
			$cantidad = $row2->cantidad;
			$total = $row2->montoTotal;
			$fecha = $row2->fechaPedido;
			$delivery = $row2->delivery;
			$this->pdf->Cell(35,5,utf8_decode($producto),'TBLR',0,'L',0);
			$this->pdf->Cell(15,5,utf8_decode($precio),'TBLR',0,'L',0);
			$this->pdf->Cell(20,5,utf8_decode($cantidad),'TBLR',0,'L',0);
			$this->pdf->Cell(15,5,utf8_decode($total),'TBLR',0,'L',0);
			$this->pdf->Cell(45,5,utf8_decode($fecha),'TBLR',0,'L',0);
			$this->pdf->Cell(25,5,utf8_decode($delivery),'TBLR',0,'L',0);
			$this->pdf->Ln(5);
		}
		$this->pdf->Output("recibopedido.pdf","I");
		// I Mostrar en navegador
		// D Forzar la descarga
	}
	public function comprar(){
		$aux = $_POST['id'];
		$cant[$aux] = $_POST['producto'];
		redirect('producto/index','refresh');
	}
	public function lista(){
		$data['lista'] = $this->pedido_m->getPedidos($this->session->userdata('idUsuario'));
		$this->load->view('inc/header');
		$this->load->view('pedido/lista_v', $data);
		$this->load->view('inc/footer');
	}
	/*
	public function recibo(){
		redirect('pedido/lista', 'refresh');
	}
	*/
	public function index()
	{
		$id=$_POST['id'];
		$id2=$_POST['idSucursal'];
		$data['pedido'] = $this->producto_m->getproducto($id2, $id);
		//$data['sucursal'] = $this->sucursal_m->getproducto();
		$data['delivery'] = $this->delivery_m->listadelivery();
		$data['cantidad'] = $_POST['cantidad'];
		$this->load->view('inc/header');
		$this->load->view('pedido/pedido_v', $data);
		$this->load->view('inc/footer');
	}
	public function modificar(){
		$id = $_POST['id'];
		$data['infousuario']=$this->pedido_m->recuperarpedido($id);
		$this->load->view('inc/header');
		$this->load->view('pedido/editar_v', $data);
		$this->load->view('inc/footer');
	}
	public function modificarbd(){
		$id = $_POST['id'];
		$data['nombre'] = $_POST['nombre'];
		$data['telefono'] = $_POST['telefono'];
		$data['direccion'] = $_POST['direccion'];
		$this->pedido_m->modificarpedido($id, $data);
		redirect('pedido/index','refresh');
	}
	public function registrar(){
		$this->load->view('inc/header');
		$this->load->view('pedido/registrar_v');
		$this->load->view('inc/footer');
	}
	public function registrarbd(){
		$data['idUsuario'] = $_POST['idUsuario'];
		$data['montoTotal'] = $_POST['total'];
		if($this->pedido_m->agregarpedido($data)){
			$idpedido = $this->pedido_m->lastID();
			$data2['idpedido'] = $idpedido;
			$data2['idProducto'] = $_POST['idProducto'];
			$data2['cantidad'] = $_POST['cantidad'];
			$data2['iddelivery'] = $_POST['delivery'];
			$this->pedido_m->agregardetalle($data2);
			//---------------------------------------------------------------------------
			$this->load->library('pdf');
			$pedido = $this->pedido_m->getRecibo($idpedido);
			$pedido = $pedido->result();

			$this->pdf = new Pdf();
			$this->pdf->AddPage();
			$this->pdf->AliasNbPages();
			$this->pdf->SetTitle("Recibo");
			$this->pdf->SetLeftMargin(15);
			$this->pdf->SetRightMargin(15);
			$this->pdf->SetFillColor(210,210,210);
			$this->pdf->SetFont('Arial','B',11);
			$this->pdf->Cell(30);
			$this->pdf->Cell(120,10,'Recibo de Pedido',0,0,'C');
			//ancho,alto,texto a mostrar,borde(LTRB),0 a la derecha-1 sig linea-2 debajo,centrado
			$this->pdf->Ln(10); // debe ser exacto
			// Celdas
			$this->pdf->Cell(35,5,utf8_decode("Cliente"),'TBLR',0,'L',1);
			//$this->pdf->Cell(50,5,utf8_decode(" "),0,0,'L',0);
			$this->pdf->Cell(25,5,utf8_decode("Sucursal"),'TBLR',0,'L',1);

			$this->pdf->Ln(5);
			$n = 1;
			foreach ($pedido as $row) {
				$cliente = $row->cliente;
				$sucursal = $row->sucursal;
				$this->pdf->Cell(35,5,utf8_decode($cliente),'TBLR',0,'L',0);
				$this->pdf->Cell(25,5,utf8_decode($sucursal),'TBLR',0,'L',0);
				$this->pdf->Ln(5);
				$n++;
			}
			$this->pdf->Cell(35,5,utf8_decode("Producto"),'TBLR',0,'L',1);
			$this->pdf->Cell(15,5,utf8_decode("Precio"),'TBLR',0,'L',1);
			$this->pdf->Cell(20,5,utf8_decode("Cantidad"),'TBLR',0,'L',1);
			$this->pdf->Cell(15,5,utf8_decode("Total"),'TBLR',0,'L',1);
			$this->pdf->Cell(45,5,utf8_decode("Fecha"),'TBLR',0,'L',1);
			$this->pdf->Cell(25,5,utf8_decode("Delivery"),'TBLR',0,'L',1);
			$this->pdf->Ln(5);
			foreach ($pedido as $row2) {
				$producto = $row2->producto;
				$precio = $row2->precio;
				$cantidad = $row2->cantidad;
				$total = $row2->montoTotal;
				$fecha = $row2->fechaPedido;
				$delivery = $row2->delivery;
				$this->pdf->Cell(35,5,utf8_decode($producto),'TBLR',0,'L',0);
				$this->pdf->Cell(15,5,utf8_decode($precio),'TBLR',0,'L',0);
				$this->pdf->Cell(20,5,utf8_decode($cantidad),'TBLR',0,'L',0);
				$this->pdf->Cell(15,5,utf8_decode($total),'TBLR',0,'L',0);
				$this->pdf->Cell(45,5,utf8_decode($fecha),'TBLR',0,'L',0);
				$this->pdf->Cell(25,5,utf8_decode($delivery),'TBLR',0,'L',0);
				$this->pdf->Ln(5);
			}
			$this->pdf->Output("recibopedido.pdf","I");
			// I Mostrar en navegador
			// D Forzar la descarga
			//redirect('pedido/lista', 'refresh');
		}
		else{
			echo "error";
		}
		
	}

	public function eliminar(){
		$id=$_POST['id'];
		$data['estado'] = 0;
		$this->pedido_m->eliminarpedido($id, $data);
		redirect('pedido/index', 'refresh');
	}
}
