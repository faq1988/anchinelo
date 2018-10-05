<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cheque_model extends CI_Model{



public function __construct()
{
  parent::__construct();
}




function crear_cheque($data){
		
		$this->db->insert('cheque_propio', array('fecha_salida'=>$data['fecha_salida'], 'fecha_cheque'=>$data['fecha_cheque'], 'fecha_pago'=>$data['fecha_pago'], 'chequera'=>$data['chequera'], 'nro_cheque'=>$data['nro_cheque'], 'titular'=>$data['titular']
		, 'banco_emision'=>$data['banco_emision'], 'monto'=>$data['monto'], 'proveedor'=>$data['proveedor'], 'nro_factura'=>$data['nro_factura'], 
		'nota'=>$data['nota']));
	}



public function obtener_cheque($id){

$this->db->where('id', $id);
$q = $this->db->get('cheque_propio');
if ($q->num_rows() >0 ) return $q;//->result();
}


public function obtener_cheques(){

$q = $this->db->get('cheque_propio');
if ($q->num_rows() >0 ) return $q;//->result();
}



function eliminar_cheque($id)
	{
		$this->db->where('id =', $id);
		$this->db->delete('cheque_propio');
	}


public function obtener_chequeras(){

$q = $this->db->get('chequera');
if ($q->num_rows() >0 ) return $q;//->result();
}


public function obtener_chequeras_selectbox(){
$this->db->select('ch.id as id, ch.descripcion as descripcion, b.nombre as banco, c.titular as titular');
$this->db->from('chequera ch');
$this->db->join('cuenta c', 'c.id = ch.cuenta');
$this->db->join('banco b', 'b.id = c.banco');
$q = $this->db->get('');
if ($q->num_rows() >0 ) return $q;//->result();
}



function eliminar_chequera($id)
	{
		$this->db->where('id =', $id);
		$this->db->delete('chequera');
	}


function crear_chequera($data){
		
		$this->db->insert('chequera', array('descripcion'=>$data['descripcion'], 'cuenta'=>$data['cuenta'], 'nro_inicial'=>$data['nro_inicial'],
			'cant_cheques'=>$data['cant_cheques']));
	}	




public function obtener_clientes(){

$q = $this->db->get('cliente');
if ($q->num_rows() >0 ) return $q;//->result();
}




function eliminar_cliente($id)
	{
		$this->db->where('id =', $id);
		$this->db->delete('cliente');
	}


function crear_cliente($data){
		
		$this->db->insert('cliente', array('nombre_apellido'=>$data['nombre_apellido'], 'domicilio'=>$data['domicilio'], 'telefono'=>$data['telefono']));
	}	


public function obtener_cuentas(){

$q = $this->db->get('cuenta');
if ($q->num_rows() >0 ) return $q;//->result();
}

function crear_cuenta($data){
		
		$this->db->insert('cuenta', array('nombre'=>$data['nombre'], 'tipo_cuenta'=>$data['tipo_cuenta'], 'banco'=>$data['banco'], 'titular'=>$data['titular']));
	}	


function eliminar_cuenta($id)
	{
		$this->db->where('id =', $id);
		$this->db->delete('cuenta');
	}


public function obtener_bancos(){

$q = $this->db->get('banco');
if ($q->num_rows() >0 ) return $q;//->result();
}




  function obtener_monto_a_cubrir($begin_date, $end_date){
  		$this->db->select_sum('monto', 'monto');
  		$this->db->where('fecha_pago >=', $begin_date);
    	$this->db->where('fecha_pago <=', $end_date);    	
  		$query = $this->db->get('cheque_propio')->result();
  		if ($query[0]->monto != null) 
  			return $query[0]->monto;
  		else
  			return 0;
  			}


    function obtener_monto_a_cobrar($begin_date, $end_date){
  		$this->db->select_sum('monto', 'monto');
  		$this->db->where('fecha_deposito >=', $begin_date);
    	$this->db->where('fecha_deposito <=', $end_date);    	
  		$query = $this->db->get('cheque_terceros')->result();
  		if ($query[0]->monto != null) 
  			return $query[0]->monto;
  		else
  			return 0;
  			}


function cant_cheques_a_vencer($begin_date, $end_date){
  		
  		$this->db->where('fecha_pago >=', $begin_date);
    	$this->db->where('fecha_pago <=', $end_date);    	
  		$query = $this->db->get('cheque_propio');
  		return $query->num_rows();
  			}

  public function obtener_cheques_a_vencer($begin_date, $end_date){

	$this->db->where('fecha_pago >=', $begin_date);
	$this->db->where('fecha_pago <=', $end_date);    	
	$q = $this->db->get('cheque_propio');
	if ($q->num_rows() >0 ) return $q;//->result();
	}


  function obtener_cheques_vencidos($begin_date, $end_date){
  		
  		$this->db->where('fecha_pago >=', $begin_date);
    	$this->db->where('fecha_pago <=', $end_date);    	
  		$query = $this->db->get('cheque_propio');
  		return $query->num_rows();
  			}


public function obtener_proveedores(){

$q = $this->db->get('proveedor');
if ($q->num_rows() >0 ) return $q;//->result();
}






/*
function cambiar_password($username, $password)
{
	$this->db->set('password', $password);    
    $this->db->where('username', $username);
    $this->db->update('usuario');
}
*/
}


?>