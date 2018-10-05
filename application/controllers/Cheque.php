<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cheque extends CI_Controller {

public function __construct()
{
  parent::__construct();  
  $this->load->model('cheque_model');
}

	

  public function crear_cheque()
  {

      $this->form_validation->set_rules('fecha_salida', 'Fecha de salida', 'required');
      $this->form_validation->set_rules('fecha_cheque', 'Fecha de cheque', 'required');
      $this->form_validation->set_rules('fecha_pago', 'Fecha de pago', 'required');
      $this->form_validation->set_rules('chequera', 'Chequera', 'required');
      $this->form_validation->set_rules('nro_cheque', 'Número de cheque', 'required');
      $this->form_validation->set_rules('titular', 'Titular', 'required');
      $this->form_validation->set_rules('banco_emision', 'Banco', 'required');
      $this->form_validation->set_rules('monto', 'Monto', 'required|numeric|greater_than[0]');
      $this->form_validation->set_rules('proveedor', 'Proveedor', 'required');
      $this->form_validation->set_rules('nro_factura', 'Número de factura', 'required');
      
      if ($this->form_validation->run() == FALSE)      
      {              
        $data=array();         
        $lista_chequeras=  $this->cheque_model->obtener_chequeras_selectbox();

        if (isset($lista_chequeras))
          $data['chequeras']= $lista_chequeras->result_array();
        
          $this -> load -> view('header');
          $this -> load -> view('menu');
          $this -> load -> view('nuevo_cheque_propio', $data);
      } 
      else
      {
        $data = array(
      'fecha_salida' => $this->input->post('fecha_salida'),
      'fecha_cheque' => $this->input->post('fecha_cheque'),
      'fecha_pago' => $this->input->post('fecha_pago'),
      'chequera' => $this->input->post('chequera'),
      'nro_cheque' => $this->input->post('nro_cheque'),
      'titular' => $this->input->post('titular'),
      'banco_emision' => $this->input->post('banco_emision'),
      'monto' => $this->input->post('monto'),
      'proveedor' => $this->input->post('proveedor'),
      'nro_factura' => $this->input->post('nro_factura'),
      'nota' => $this->input->post('nota'),
      );

        $this->cheque_model->crear_cheque($data);
        redirect("welcome/cheques_propios");
      }

  }




  public function eliminar_cheque()
  {
    $id_cheque = $this->uri->segment(3);       
    $this->cheque_model->eliminar_cheque($id_cheque);
    redirect('Welcome/cheques_propios');
  }



   public function eliminar_chequera()
  {
    $id_chequera = $this->uri->segment(3);       
    $this->cheque_model->eliminar_chequera($id_chequera);
    redirect('Welcome/chequeras');
  }



  public function crear_chequera()
  {

      $this->form_validation->set_rules('descripcion', 'Descripción', 'required');
      
      
      if ($this->form_validation->run() == FALSE)      
      {                   
          $this -> load -> view('header');
          $this -> load -> view('menu');
          $this -> load -> view('nueva_chequera');
      } 
      else
      {
        $data = array(
      
      'descripcion' => $this->input->post('descripcion'),
      'cuenta' => $this->input->post('cuenta'),
      'nro_inicial' => $this->input->post('nro_inicial'),
      'cant_cheques' => $this->input->post('cant_cheques'),
      
      );

        $this->cheque_model->crear_chequera($data);
        redirect("welcome/chequeras");
      }

  }




   public function eliminar_cliente()
  {
    $id_cliente = $this->uri->segment(3);       
    $this->cheque_model->eliminar_cliente($id_cliente);
    redirect('Welcome/clientes');
  }




  public function crear_cliente()
  {

      $this->form_validation->set_rules('nombre_apellido', 'Razón social', 'required');
      
      
      if ($this->form_validation->run() == FALSE)      
      {                   
          $this -> load -> view('header');
          $this -> load -> view('menu');
          $this -> load -> view('nuevo_cliente');
      } 
      else
      {
        $data = array(
      
      'nombre_apellido' => $this->input->post('nombre_apellido'),
      'domicilio' => $this->input->post('domicilio'),
      'telefono' => $this->input->post('telefono'),
      
      
      );

        $this->cheque_model->crear_cliente($data);
        redirect("welcome/clientes");
      }

  }



   public function eliminar_cuenta()
  {

    $id_cuenta = $this->uri->segment(3);           
    $this->cheque_model->eliminar_cuenta($id_cuenta);
    redirect('Welcome/cuentas');
  }


  public function crear_cuenta()
  {

      $this->form_validation->set_rules('nombre', 'Nombre', 'required');
      
      
      if ($this->form_validation->run() == FALSE)      
      {                   
          $this -> load -> view('header');
          $this -> load -> view('menu');
          $this -> load -> view('nueva_cuenta');
      } 
      else
      {
        $data = array(      
      'nombre' => $this->input->post('nombre'),
      'tipo_cuenta' => $this->input->post('tipo_cuenta'),
      'banco' => $this->input->post('banco'),
      'titular' => $this->input->post('titular'),
      
      
      );

        $this->cheque_model->crear_cuenta($data);
        redirect("welcome/cuentas");
      }

  }




}
