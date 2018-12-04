<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cheque_model extends CI_Model{



public function __construct()
{
  parent::__construct();
}




function crear_cheque($data){
		
		$this->db->insert('cheque_propio', 
			array(	'fecha_salida'=>$data['fecha_salida'], 
					'fecha_cheque'=>$data['fecha_cheque'], 
					'fecha_pago'=>$data['fecha_pago'], 
					'chequera'=>$data['chequera'], 
					'nro_cheque'=>$data['nro_cheque'], 
					//'titular'=>$data['titular'], 
					'estado'=>$data['estado'], 
					//'banco_emision'=>$data['banco_emision'], 
					'monto'=>$data['monto'], 
					'proveedor'=>$data['proveedor'], 
					'nro_factura'=>$data['nro_factura'], 
					'nota'=>$data['nota']));
	}



function crear_cheque_terceros($data){
		
		$this->db->insert('cheque_terceros', array('fecha_ingreso'=>$data['fecha_ingreso'], 'fecha_cheque'=>$data['fecha_cheque'], 'fecha_deposito'=>$data['fecha_deposito'], 'nro_cheque'=>$data['nro_cheque'], 'titular'=>$data['titular'], 'estado'=>$data['estado']
		, 'banco_emision'=>$data['banco_emision'], 'monto'=>$data['monto'], 'cliente'=>$data['cliente'], 'nro_factura'=>$data['nro_factura'], 'depositar_en'=>$data['depositar_en'], 
		'nota'=>$data['nota']));
	}


public function obtener_cheque($id){
/*
$this->db->where('id', $id);
$q = $this->db->get('cheque_propio');
if ($q->num_rows() >0 ) return $q;//->result();
*/

$this->db->select('ch.id as id, ch.estado as estado, ch.fecha_cheque, ch.fecha_pago, ch.fecha_salida, ch.nro_factura, k.descripcion as chequera, k.id as id_chequera, g.titular, ch.nro_cheque, ch.monto, b.nombre as banco_emision, p.id as proveedor');
$this->db->from('cheque_propio ch');
$this->db->join('chequera k', 'k.id = ch.chequera');
$this->db->join('cuenta g', 'g.id = k.cuenta');
$this->db->join('banco b', 'b.id = g.banco');
$this->db->join('proveedor p', 'p.id = ch.proveedor');
$this->db->where('ch.id', $id);
$q = $this->db->get('');
//$q = $this->db->get('cheque_propio');
if ($q->num_rows() >0 ) return $q;//->result();

}


public function obtener_cheques(){
$this->db->select('ch.id as id, ch.estado as estado, ch.fecha_cheque, ch.fecha_pago, k.descripcion as chequera, g.titular, ch.nro_cheque, ch.monto, b.nombre as banco_emision, p.nombre_apellido as proveedor');
$this->db->from('cheque_propio ch');
$this->db->join('chequera k', 'k.id = ch.chequera');
$this->db->join('cuenta g', 'g.id = k.cuenta');
$this->db->join('banco b', 'b.id = g.banco');
$this->db->join('proveedor p', 'p.id = ch.proveedor');
$q = $this->db->get('');
//$q = $this->db->get('cheque_propio');
if ($q->num_rows() >0 ) return $q;//->result();
}


public function obtener_cheques_terceros(){
$this->db->select('ch.id as id, ch.estado as estado, ch.fecha_cheque, ch.fecha_deposito, g.titular, ch.nro_cheque, ch.monto, b.nombre as banco_emision, p.nombre_apellido as cliente');
$this->db->from('cheque_terceros ch');

$this->db->join('cuenta g', 'g.id = ch.depositar_en');
$this->db->join('banco b', 'b.id = g.banco');
$this->db->join('cliente p', 'p.id = ch.cliente');
$q = $this->db->get('');
//$q = $this->db->get('cheque_propio');
if ($q->num_rows() >0 ) return $q;//->result();
}


function eliminar_cheque($id)
	{
		$this->db->where('id =', $id);
		$this->db->delete('cheque_propio');
	}


public function obtener_chequeras(){
	$this->db->select('ch.id as id, ch.descripcion, c.nombre as cuenta, ch.nro_inicial, ch.cant_cheques');
	$this->db->from('chequera ch');	
	$this->db->join('cuenta c', 'c.id = ch.cuenta');	
	$q = $this->db->get('');
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


function crear_proveedor($data){
		
		$this->db->insert('proveedor', array('nombre_apellido'=>$data['nombre_apellido'], 'domicilio'=>$data['domicilio'], 'telefono'=>$data['telefono']));
	}	

function eliminar_proveedor($id)
	{
		$this->db->where('id =', $id);
		$this->db->delete('proveedor');
	}		


public function obtener_cuentas(){

	$this->db->select('c.id as id, c.nombre as nombre, c.tipo_cuenta, b.nombre as banco, c.titular');
	$this->db->from('cuenta c');	
	$this->db->join('banco b', 'b.id = c.banco');	
	$q = $this->db->get('');
	if ($q->num_rows() >0 ) return $q;//->result();
}

function crear_cuenta($data){
		
		$this->db->insert('cuenta', array('nombre'=>$data['nombre'], 'tipo_cuenta'=>$data['tipo_cuenta'], 'banco'=>$data['banco'], 'titular'=>$data['titular']));
	}	


function eliminar_cuenta($id)
	{
		$this->db->where('id =', $id);
		$this->db->delete('cuenta');

		$errors = $this->db->error();
		//error 1451: significa que no se pudo eliminar la entidad por problemas de foreign key
		return $errors['code'];	
	}


public function obtener_bancos(){

$q = $this->db->get('banco');
if ($q->num_rows() >0 ) return $q;//->result();
}




  function obtener_monto_a_cubrir($begin_date, $end_date){
  		//$this->db->select_sum('monto', 'monto');
  		$this->db->select('sum(monto) as monto, count(*) as cant');
  		$this->db->where('fecha_pago >=', $begin_date);
    	$this->db->where('fecha_pago <=', $end_date);
    	$this->db->where('estado', "CUBRIR");    	
  		$query = $this->db->get('cheque_propio')->result();
  		//if ($query[0]->monto != null) 
  		if ($query[0] != null) 
  			return $query[0];
  		else
  			return 0;
  			}


    function obtener_monto_a_cobrar($begin_date, $end_date){
  		//$this->db->select_sum('monto', 'monto');
  		$this->db->select('sum(monto) as monto, count(*) as cant');
  		$this->db->where('fecha_deposito >=', $begin_date);
    	$this->db->where('fecha_deposito <=', $end_date);    
    	$this->db->where('estado', "COBRAR");  	
  		$query = $this->db->get('cheque_terceros')->result();
  		//if ($query[0]->monto != null) 
  		//	return $query[0]->monto;
  		if ($query[0] != null) 
  			return $query[0];
  		else
  			return 0;
  			}


//en los proximos 7 dias
function cant_cheques_a_vencer($begin_date, $end_date){
  		
  		$this->db->where('fecha_pago >=', $begin_date);
    	$this->db->where('fecha_pago <=', $end_date);   
    	$this->db->where('estado', "CUBRIR");   	
  		$query = $this->db->get('cheque_propio');
  		return $query->num_rows();
  			}

  public function obtener_cheques_a_vencer($begin_date, $end_date){
	$this->db->select('ch.id as id, ch.estado as estado, ch.fecha_cheque, ch.fecha_pago, k.descripcion as chequera, g.titular, ch.nro_cheque, ch.monto, b.nombre as banco_emision, p.nombre_apellido as proveedor');
	$this->db->from('cheque_propio ch');
	$this->db->join('chequera k', 'k.id = ch.chequera');
	$this->db->join('cuenta g', 'g.id = k.cuenta');
	$this->db->join('banco b', 'b.id = g.banco');
	$this->db->join('proveedor p', 'p.id = ch.proveedor');
	$this->db->where('fecha_pago >=', $begin_date);
	$this->db->where('fecha_pago <=', $end_date);    	
	$this->db->where('estado', "CUBRIR");
	$q = $this->db->get('');
	if ($q->num_rows() >0 ) return $q;//->result();
	}


//en los ultimos 7 dias
  function obtener_cheques_vencidos($begin_date, $end_date){
  		
  		$this->db->where('fecha_pago >=', $begin_date);
    	$this->db->where('fecha_pago <', $end_date);
    	$this->db->where('estado', "CUBRIR");    	
  		$query = $this->db->get('cheque_propio');
  		return $query->num_rows();
  			}


public function obtener_proveedores(){

$q = $this->db->get('proveedor');
if ($q->num_rows() >0 ) return $q;//->result();
}




  function obtener_monto_a_pagar($begin_date, $end_date){
  		
  		$this->db->where('fecha_pago >=', $begin_date);
    	$this->db->where('fecha_pago <=', $end_date);    	
  		$query = $this->db->get('cheque_propio');
  		return $query->num_rows();
  			}



public function obtener_cuenta($id){

		$this->db->where('id', $id);
		$q = $this->db->get('cuenta');
		if ($q->num_rows() >0 ) return $q;//->result();
		}


public function editar_cuenta($id, $data)
{
	$this->db->set('nombre', $data['nombre']);
	$this->db->set('tipo_cuenta', $data['tipo_cuenta']);
	$this->db->set('banco', $data['banco']);
	$this->db->set('titular', $data['titular']);
	$this->db->where('id', $id);
	$this->db->update('cuenta');	
}


public function obtener_proveedor($id){

		$this->db->where('id', $id);
		$q = $this->db->get('proveedor');
		if ($q->num_rows() >0 ) return $q;//->result();
		}



public function editar_proveedor($id, $data)
{
	$this->db->set('nombre_apellido', $data['nombre_apellido']);
	$this->db->set('domicilio', $data['domicilio']);
	$this->db->set('telefono', $data['telefono']);	
	$this->db->where('id', $id);
	$this->db->update('proveedor');	
}



public function obtener_cliente($id){

		$this->db->where('id', $id);
		$q = $this->db->get('cliente');
		if ($q->num_rows() >0 ) return $q;//->result();
		}



public function editar_cliente($id, $data)
{
	$this->db->set('nombre_apellido', $data['nombre_apellido']);
	$this->db->set('domicilio', $data['domicilio']);
	$this->db->set('telefono', $data['telefono']);	
	$this->db->where('id', $id);
	$this->db->update('cliente');	
}



public function obtener_chequera($id){

		$this->db->where('id', $id);
		$q = $this->db->get('chequera');
		if ($q->num_rows() >0 ) return $q;//->result();
		}



public function editar_chequera($id, $data)
{
	$this->db->set('descripcion', $data['descripcion']);
	$this->db->set('cuenta', $data['cuenta']);
	$this->db->set('nro_inicial', $data['nro_inicial']);	
	$this->db->set('cant_cheques', $data['cant_cheques']);	
	$this->db->where('id', $id);
	$this->db->update('chequera');	
}



public function editar_cheque_propio($id, $data)
{
	$this->db->set('fecha_salida', $data['fecha_salida']);
	$this->db->set('fecha_cheque', $data['fecha_cheque']);
	$this->db->set('fecha_pago', $data['fecha_pago']);
	//$this->db->set('estado', $data['estado']);
	$this->db->set('chequera', $data['chequera']);	
	$this->db->set('nro_cheque', $data['nro_cheque']);	
	$this->db->set('monto', $data['monto']);	
	$this->db->set('proveedor', $data['proveedor']);	
	$this->db->set('nro_factura', $data['nro_factura']);	
	$this->db->set('nota', $data['nota']);	
	$this->db->where('id', $id);
	$this->db->update('cheque_propio');	



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