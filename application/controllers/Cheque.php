<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cheque extends CI_Controller {

public function __construct()
{
  parent::__construct();  
  $this->load->model('cheque_model');
}

	
//estados de un cheque: CUBRIR, ANULADO, VENCIDO, PAGADO.

  public function crear_cheque()
  {    
      $this->form_validation->set_rules('fecha_salida', 'Fecha de salida', 'required');
      $this->form_validation->set_rules('fecha_cheque', 'Fecha de cheque', 'required');
      $this->form_validation->set_rules('fecha_pago', 'Fecha de pago', 'required');
      $this->form_validation->set_rules('chequera', 'Chequera', 'required');
      $this->form_validation->set_rules('nro_cheque', 'Número de cheque', 'required');
      //$this->form_validation->set_rules('titular', 'Titular', 'required');
      //$this->form_validation->set_rules('banco_emision', 'Banco', 'required');
      $this->form_validation->set_rules('monto', 'Monto', 'required|numeric|greater_than[0]');
      $this->form_validation->set_rules('proveedor', 'Proveedor', 'required');
      $this->form_validation->set_rules('nro_factura', 'Número de factura', 'required');
      
      if ($this->form_validation->run() == FALSE)      
      {              
        $data=array();         
        $lista_chequeras=  $this->cheque_model->obtener_chequeras_selectbox();
        $lista_proveedores=  $this->cheque_model->obtener_proveedores();

        if (isset($lista_chequeras))
          $data['chequeras']= $lista_chequeras->result_array();
         if (isset($lista_proveedores))
          $data['proveedores']= $lista_proveedores->result_array();
        
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
      //'titular' => $this->input->post('titular'),
      //'banco_emision' => $this->input->post('banco_emision'),
      'monto' => $this->input->post('monto'),
      'proveedor' => $this->input->post('proveedor'),
      'nro_factura' => $this->input->post('nro_factura'),
      'nota' => $this->input->post('nota'),
      'estado' => "CUBRIR",
      );




        $this->cheque_model->crear_cheque($data);
        redirect("welcome/cheques_propios");
      }

  }

//estados de un cheque: COBRAR, ANULADO, VENCIDO, COBRADO.
   public function crear_cheque_terceros()
  {    
      $this->form_validation->set_rules('fecha_ingreso', 'Fecha de ingreso', 'required');
      $this->form_validation->set_rules('fecha_cheque', 'Fecha de cheque', 'required');
      $this->form_validation->set_rules('fecha_deposito', 'Fecha de depósito', 'required');
      $this->form_validation->set_rules('titular', 'Titular', 'required');
      $this->form_validation->set_rules('nro_cheque', 'Número de cheque', 'required');
      $this->form_validation->set_rules('monto', 'Monto', 'required|numeric|greater_than[0]');
      $this->form_validation->set_rules('banco_emision', 'Banco', 'required');
      $this->form_validation->set_rules('cliente', 'Cliente', 'required');
      $this->form_validation->set_rules('nro_factura', 'Número de factura', 'required');
      $this->form_validation->set_rules('depositar_en', 'Depositar en', 'required');

      
      if ($this->form_validation->run() == FALSE)      
      {              

        $data=array();    
        $lista_clientes=  $this->cheque_model->obtener_clientes();
        $lista_bancos=  $this->cheque_model->obtener_bancos();
        $lista_cuentas= $this->cheque_model->obtener_cuentas();

         if (isset($lista_clientes))
            $data['clientes']= $lista_clientes->result_array();
         if (isset($lista_bancos))
            $data['bancos']= $lista_bancos->result_array();
         if (isset($lista_cuentas))
            $data['cuentas']= $lista_cuentas->result_array();
               
          $this -> load -> view('header');
          $this -> load -> view('menu');
          $this -> load -> view('nuevo_cheque_terceros', $data);
      } 
      else
      {
        $data = array(
      'fecha_ingreso' => $this->input->post('fecha_ingreso'),
      'fecha_cheque' => $this->input->post('fecha_cheque'),
      'fecha_deposito' => $this->input->post('fecha_deposito'),      
      'titular' => $this->input->post('titular'),
      'nro_cheque' => $this->input->post('nro_cheque'),      
      'monto' => $this->input->post('monto'),
      'banco_emision' => $this->input->post('banco_emision'),
      'cliente' => $this->input->post('cliente'),      
      'depositar_en' => $this->input->post('depositar_en'),
      'nro_factura' => $this->input->post('nro_factura'),      
      'nota' => $this->input->post('nota'),
      'estado' => "COBRAR",
      );

        $this->cheque_model->crear_cheque_terceros($data);
        redirect("welcome/cheques_terceros");
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
      $this->form_validation->set_rules('cuenta', 'Cuenta', 'required');
      $this->form_validation->set_rules('nro_inicial', 'Número inicial', 'required|numeric');
      $this->form_validation->set_rules('cant_cheques', 'Cantidad de cheques', 'required|numeric');
      
      
      if ($this->form_validation->run() == FALSE)      
      {                   
        
        $lista_cuentas=  $this->cheque_model->obtener_cuentas();
        if (isset($lista_cuentas))
        $data['cuentas']= $lista_cuentas->result_array();

          $this -> load -> view('header');
          $this -> load -> view('menu');
          $this -> load -> view('nueva_chequera', $data);
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


  public function crear_proveedor()
  {

      $this->form_validation->set_rules('nombre_apellido', 'Razón social', 'required');
      $this->form_validation->set_rules('domicilio', 'Domicilio', 'required');
      $this->form_validation->set_rules('telefono', 'Teléfono', 'required');
      
      
      if ($this->form_validation->run() == FALSE)      
      {                   
          $this -> load -> view('header');
          $this -> load -> view('menu');
          $this -> load -> view('nuevo_proveedor');
      } 
      else
      {
        $data = array(
      
      'nombre_apellido' => $this->input->post('nombre_apellido'),
      'domicilio' => $this->input->post('domicilio'),
      'telefono' => $this->input->post('telefono'),
      
      
      );

        $this->cheque_model->crear_proveedor($data);
        redirect("welcome/proveedores");
      }

  }


    public function eliminar_proveedor()
  {
    $id_proveedor = $this->uri->segment(3);       
    $this->cheque_model->eliminar_proveedor($id_proveedor);
    redirect('Welcome/proveedores');
  }

  public function crear_cliente()
  {

      $this->form_validation->set_rules('nombre_apellido', 'Razón social', 'required');
      $this->form_validation->set_rules('domicilio', 'Domicilio', 'required');
      $this->form_validation->set_rules('telefono', 'Teléfono', 'required');

      
      
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
    $error_code = $this->cheque_model->eliminar_cuenta($id_cuenta);

    //problema de foreign key
    if ($error_code == 1451)
    {
      $this->session->set_flashdata('error', 'No es posible eliminar la cuenta, la misma está siendo utilizada');
    }
    else
    {
      $this->session->set_flashdata('success', 'La cuenta fue eliminada con éxito'); 
    }

    redirect('Welcome/cuentas');
  }


  public function crear_cuenta()
  {

      $this->form_validation->set_rules('nombre', 'Nombre', 'required');
      $this->form_validation->set_rules('tipo_cuenta', 'Tipo de cuenta', 'required');
      $this->form_validation->set_rules('banco', 'Banco', 'required');
      $this->form_validation->set_rules('titular', 'Titular', 'required');
      
      
      if ($this->form_validation->run() == FALSE)      
      {                   

        $data=array();    
        $lista_bancos=  $this->cheque_model->obtener_bancos();

        if (isset($lista_bancos))
          $data['bancos']= $lista_bancos->result_array();

          $this -> load -> view('header');
          $this -> load -> view('menu');
          $this -> load -> view('nueva_cuenta', $data);
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






 public function editar_cuenta()
  {

    $id_cuenta = $this->uri->segment(3);  


      $this->form_validation->set_rules('nombre', 'Nombre', 'required');
      $this->form_validation->set_rules('tipo_cuenta', 'Tipo de cuenta', 'required');
      $this->form_validation->set_rules('banco', 'Banco', 'required');
      $this->form_validation->set_rules('titular', 'Titular', 'required');
      
      
      if ($this->form_validation->run() == FALSE)      
      {                   

        $data=array();    
        $lista_bancos=  $this->cheque_model->obtener_bancos();
        $cuenta = $this->cheque_model->obtener_cuenta($id_cuenta);
    
        if (isset($cuenta))
          $data['cuenta']= $cuenta->result_array();

        if (isset($lista_bancos))
          $data['bancos']= $lista_bancos->result_array();

          $this -> load -> view('header');
          $this -> load -> view('menu');
          $this -> load -> view('editar_cuenta', $data);
      } 
      else
      {
        $data = array(      
      'nombre' => $this->input->post('nombre'),
      'tipo_cuenta' => $this->input->post('tipo_cuenta'),
      'banco' => $this->input->post('banco'),
      'titular' => $this->input->post('titular'),
      
      
      );

        $this->cheque_model->editar_cuenta($id_cuenta, $data);

        $this->session->set_flashdata('success', 'La cuenta "'. $data['nombre'] .'" fue modificada con éxito');

        redirect("welcome/cuentas");
      }

  }




 public function editar_proveedor()
  {

    $id_prov = $this->uri->segment(3);  

      $this->form_validation->set_rules('nombre_apellido', 'Razón social', 'required');
      $this->form_validation->set_rules('domicilio', 'Domicilio', 'required');
      $this->form_validation->set_rules('telefono', 'Teléfono', 'required');
      
      
      if ($this->form_validation->run() == FALSE)      
      {                   
        $data=array();           
        $proveedor = $this->cheque_model->obtener_proveedor($id_prov);
    
        if (isset($proveedor))
          $data['proveedor']= $proveedor->result_array();

          $this -> load -> view('header');
          $this -> load -> view('menu');
          $this -> load -> view('editar_proveedor', $data);
      } 
      else
      {
        $data = array(
      
      'nombre_apellido' => $this->input->post('nombre_apellido'),
      'domicilio' => $this->input->post('domicilio'),
      'telefono' => $this->input->post('telefono'),
      
      
      );

        $this->cheque_model->editar_proveedor($id_prov, $data);
        $this->session->set_flashdata('success', 'El proveedor "'. $data['nombre_apellido'] .'" fue modificado con éxito');
        redirect("welcome/proveedores");
      }

  }




 public function editar_cliente()
  {

    $id_cliente = $this->uri->segment(3);  

      $this->form_validation->set_rules('nombre_apellido', 'Razón social', 'required');
      $this->form_validation->set_rules('domicilio', 'Domicilio', 'required');
      $this->form_validation->set_rules('telefono', 'Teléfono', 'required');
      
      
      if ($this->form_validation->run() == FALSE)      
      {                   
        $data=array();           
        $cliente = $this->cheque_model->obtener_cliente($id_cliente);
    
        if (isset($cliente))
          $data['cliente']= $cliente->result_array();

          $this -> load -> view('header');
          $this -> load -> view('menu');
          $this -> load -> view('editar_cliente', $data);
      } 
      else
      {
        $data = array(
      
      'nombre_apellido' => $this->input->post('nombre_apellido'),
      'domicilio' => $this->input->post('domicilio'),
      'telefono' => $this->input->post('telefono'),
      
      
      );

        $this->cheque_model->editar_cliente($id_cliente, $data);
        $this->session->set_flashdata('success', 'El cliente "'. $data['nombre_apellido'] .'" fue modificado con éxito');
        redirect("welcome/clientes");
      }

  }




  public function editar_chequera()
  {

    $id_chequera = $this->uri->segment(3);  

       $this->form_validation->set_rules('descripcion', 'Descripción', 'required');
      $this->form_validation->set_rules('cuenta', 'Cuenta', 'required');
      $this->form_validation->set_rules('nro_inicial', 'Número inicial', 'required|numeric');
      $this->form_validation->set_rules('cant_cheques', 'Cantidad de cheques', 'required|numeric');
      
      
      if ($this->form_validation->run() == FALSE)      
      {                   
        
        $lista_cuentas=  $this->cheque_model->obtener_cuentas();
        $chequera = $this->cheque_model->obtener_chequera($id_chequera);
        if (isset($lista_cuentas))
        $data['cuentas']= $lista_cuentas->result_array();
        
        if (isset($chequera))
          $data['chequera']= $chequera->result_array();

          $this -> load -> view('header');
          $this -> load -> view('menu');
          $this -> load -> view('editar_chequera', $data);
      } 
      else
      {
        $data = array(
      
      'descripcion' => $this->input->post('descripcion'),
      'cuenta' => $this->input->post('cuenta'),
      'nro_inicial' => $this->input->post('nro_inicial'),
      'cant_cheques' => $this->input->post('cant_cheques'),
      
      );

        $this->cheque_model->editar_chequera($id_chequera,$data);
        $this->session->set_flashdata('success', 'La chequera "'. $data['descripcion'] .'" fue modificada con éxito');
        redirect("welcome/chequeras");
      }

  }





 public function editar_cheque_propio()
  {

    $id_cheque_propio = $this->uri->segment(3);  

       $this->form_validation->set_rules('fecha_salida', 'Fecha de salida', 'required');
      $this->form_validation->set_rules('fecha_cheque', 'Fecha de cheque', 'required');
      $this->form_validation->set_rules('fecha_pago', 'Fecha de pago', 'required');
      $this->form_validation->set_rules('chequera', 'Chequera', 'required');
      $this->form_validation->set_rules('nro_cheque', 'Número de cheque', 'required');
      //$this->form_validation->set_rules('titular', 'Titular', 'required');
      //$this->form_validation->set_rules('banco_emision', 'Banco', 'required');
      $this->form_validation->set_rules('monto', 'Monto', 'required|numeric|greater_than[0]');
      $this->form_validation->set_rules('proveedor', 'Proveedor', 'required');
      $this->form_validation->set_rules('nro_factura', 'Número de factura', 'required');
      
      
      if ($this->form_validation->run() == FALSE)      
      {                   
        
        $data=array();         
        $lista_chequeras=  $this->cheque_model->obtener_chequeras_selectbox();
        $lista_proveedores=  $this->cheque_model->obtener_proveedores();
        $cheque_propio = $this->cheque_model->obtener_cheque($id_cheque_propio);

        if (isset($lista_chequeras))
          $data['chequeras']= $lista_chequeras->result_array();
         if (isset($lista_proveedores))
          $data['proveedores']= $lista_proveedores->result_array();
        if (isset($cheque_propio))
          $data['cheque_propio']= $cheque_propio->result_array();
        
          $this -> load -> view('header');
          $this -> load -> view('menu');
          $this -> load -> view('editar_cheque_propio', $data);
      } 
      else
      {
       $data = array(
      'fecha_salida' => $this->input->post('fecha_salida'),
      'fecha_cheque' => $this->input->post('fecha_cheque'),
      'fecha_pago' => $this->input->post('fecha_pago'),
      'chequera' => $this->input->post('chequera'),
      'nro_cheque' => $this->input->post('nro_cheque'),
      //'titular' => $this->input->post('titular'),
      //'banco_emision' => $this->input->post('banco_emision'),
      'monto' => $this->input->post('monto'),
      'proveedor' => $this->input->post('proveedor'),
      'nro_factura' => $this->input->post('nro_factura'),
      'nota' => $this->input->post('nota'),
      //'estado' => $this->input->post('estado'),
      );


        $this->cheque_model->editar_cheque_propio($id_cheque_propio, $data);
        $this->session->set_flashdata('success', 'El cheque "'. $id_cheque_propio .'" fue modificado con éxito');
        redirect("welcome/cheques_propios");
      }

  }

}
