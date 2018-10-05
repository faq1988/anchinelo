<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->load->view('header');
		//$this->load->view('menu');
		//$this->load->view('welcome_message');
		redirect('Login');
	}



	 public function login()
  {
    if (!$this->session->userdata('username'))
    {
      redirect('login');
    }

    $this->load->model('usuario_model');
    $usuario= $this->usuario_model->obtener_usuario($this->session->userdata('username')) ->result();
    
    //calculo monto cheques a cubrir en 7 dias
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $begin_date = date( 'Y-m-d', strtotime( 'today' ) );
    $end_date = date( 'Y-m-d', strtotime( '+7 day' ) );
    
    $data=array();
	$this->load->model('cheque_model');
	$cheques_a_cubrir=  $this->cheque_model->obtener_monto_a_cubrir($begin_date, $end_date);
	$cheques_a_cobrar=  $this->cheque_model->obtener_monto_a_cobrar($begin_date, $end_date);

	$cant_cheques_a_vencer=  $this->cheque_model->cant_cheques_a_vencer($begin_date, $end_date);
	$cheques_a_vencer=  $this->cheque_model->obtener_cheques_a_vencer($begin_date, $end_date);

	$begin_date = date( 'Y-m-d', strtotime( '-7 day' ) );
    $end_date = date( 'Y-m-d', strtotime( 'today' ) );

	$cheques_vencidos=  $this->cheque_model->obtener_cheques_vencidos($begin_date, $end_date);

	
    $data['cheques_a_cubrir']= $cheques_a_cubrir;
    $data['cheques_a_cobrar']= $cheques_a_cobrar;
    $data['cant_cheques_a_vencer']= $cant_cheques_a_vencer;
    $data['cheques_vencidos']= $cheques_vencidos;

    if (isset($cheques_a_vencer))
    $data['cheques_a_vencer']= $cheques_a_vencer->result_array();

    $this->load->view('header');
	$this->load->view('menu');
	$this->load->view('welcome_message', $data);
  }




   public function cheques_propios()
  {
  	if (!$this->session->userdata('username'))
    {
      redirect('login');
    }
	$data=array();
    $this->load->model('cheque_model');
    $lista_cheques=  $this->cheque_model->obtener_cheques();

    if (isset($lista_cheques))
    	$data['cheques']= $lista_cheques->result_array();

    $this->load->view('header');
	$this->load->view('menu');
	//$this->load->view('cheques_propios', $data);
	$this->load->view('datatables', $data);
  }



   public function nuevo_cheque_propio()
  {
  	if (!$this->session->userdata('username'))
    {
      redirect('login');
    }

    $data=array();
    $this->load->model('cheque_model');
    $lista_proveedores=  $this->cheque_model->obtener_proveedores();
    $lista_chequeras=  $this->cheque_model->obtener_chequeras_selectbox();

    if (isset($lista_proveedores))
    	$data['proveedores']= $lista_proveedores->result_array();
    if (isset($lista_chequeras))
    	$data['chequeras']= $lista_chequeras->result_array();

     $this -> load -> view('header');
     $this -> load -> view('menu');
	 $this -> load -> view('nuevo_cheque_propio', $data);
  }



   public function chequeras()
  {
  	if (!$this->session->userdata('username'))
    {
      redirect('login');
    }
	$data=array();
    $this->load->model('cheque_model');
    $lista_chequeras=  $this->cheque_model->obtener_chequeras();

    if (isset($lista_chequeras))
    	$data['chequeras']= $lista_chequeras->result_array();

    $this->load->view('header');
	$this->load->view('menu');
	$this->load->view('chequeras', $data);
  }



  public function nueva_chequera()
  {
  	if (!$this->session->userdata('username'))
    {
      redirect('login');
    }

    $this->load->model('cheque_model');
    $lista_cuentas=  $this->cheque_model->obtener_cuentas();

    if (isset($lista_cuentas))
    	$data['cuentas']= $lista_cuentas->result_array();

     $this -> load -> view('header');
     $this -> load -> view('menu', $data);
	 $this -> load -> view('nueva_chequera');
  }


  public function clientes()
  {
  	if (!$this->session->userdata('username'))
    {
      redirect('login');
    }
	$data=array();
    $this->load->model('cheque_model');
    $lista_clientes=  $this->cheque_model->obtener_clientes();

    if (isset($lista_clientes))
    	$data['clientes']= $lista_clientes->result_array();

    $this->load->view('header');
	$this->load->view('menu');
	$this->load->view('clientes', $data);
  }




  public function nuevo_cliente()
  {
  	if (!$this->session->userdata('username'))
    {
      redirect('login');
    }

     $this -> load -> view('header');
     $this -> load -> view('menu');
	 $this -> load -> view('nuevo_cliente');
  }


  public function cuentas()
  {
  	if (!$this->session->userdata('username'))
    {
      redirect('login');
    }
	$data=array();
    $this->load->model('cheque_model');
    $lista_cuentas=  $this->cheque_model->obtener_cuentas();

    if (isset($lista_cuentas))
    	$data['cuentas']= $lista_cuentas->result_array();

    $this->load->view('header');
	$this->load->view('menu');
	$this->load->view('cuentas', $data);
  }



  public function nueva_cuenta()
  {
  	if (!$this->session->userdata('username'))
    {
      redirect('login');
    }

    $data=array();
    $this->load->model('cheque_model');
    $lista_bancos=  $this->cheque_model->obtener_bancos();

    if (isset($lista_bancos))
    	$data['bancos']= $lista_bancos->result_array();

     $this -> load -> view('header');
     $this -> load -> view('menu');
	 $this -> load -> view('nueva_cuenta', $data);
  }



    public function perfil()
  {
  	if (!$this->session->userdata('username'))
    {
      redirect('login');
    }

    $data=array();
    $this->load->model('usuario_model');
    $usuario=  $this->usuario_model->obtener_usuario($this->session->userdata('username')) ->result_array();
    $data['usuario']= $usuario;

    $this->load->view('header');
	$this->load->view('menu');
	$this->load->view('perfil', $data);
  }



}