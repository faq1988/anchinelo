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

	date_default_timezone_set('America/Argentina/Buenos_Aires');
    $begin_date = date( 'Y-m-d', strtotime( 'today' ) );
    $end_date = $begin_date;    
    $monto_hoy = $this->cheque_model->obtener_monto_a_cubrir($begin_date, $end_date);
    $begin_date = date( 'Y-m-d', strtotime( '+1 day' ) );
    $end_date = date( 'Y-m-d', strtotime( '+8 day' ) );
    $monto_1a7 = $this->cheque_model->obtener_monto_a_cubrir($begin_date, $end_date);
    $begin_date = date( 'Y-m-d', strtotime( '+9 day' ) );
    $end_date = date( 'Y-m-d', strtotime( '+22 day' ) );
    $monto_8a15 = $this->cheque_model->obtener_monto_a_cubrir($begin_date, $end_date);
    $begin_date = date( 'Y-m-d', strtotime( '+23 day' ) );
    $end_date = date( 'Y-m-d', strtotime( '+45 day' ) );
    $monto_16a30 = $this->cheque_model->obtener_monto_a_cubrir($begin_date, $end_date);
    $begin_date = date( 'Y-m-d', strtotime( '+46 day' ) );
    $end_date = date( 'Y-m-d', strtotime( '+90 day' ) );
    $monto_31a60 = $this->cheque_model->obtener_monto_a_cubrir($begin_date, $end_date);
    $begin_date = date( 'Y-m-d', strtotime( '+91 day' ) );
    $end_date = date( 'Y-m-d', strtotime( '+360 day' ) );
    $monto_mas60 = $this->cheque_model->obtener_monto_a_cubrir($begin_date, $end_date);

    if (isset($lista_cheques))
    	$data['cheques']= $lista_cheques->result_array();
    $data['monto_hoy']= $monto_hoy;
    $data['monto_1a7']= $monto_1a7;
    $data['monto_8a15']= $monto_8a15;
    $data['monto_16a30']= $monto_16a30;
    $data['monto_31a60']= $monto_31a60;
    $data['monto_mas60']= $monto_mas60;

    $total_monto= $monto_hoy->monto + $monto_1a7->monto + $monto_8a15->monto + $monto_16a30->monto + $monto_31a60->monto + $monto_mas60->monto;
    $total_cant= $monto_hoy->cant + $monto_1a7->cant + $monto_8a15->cant + $monto_16a30->cant + $monto_31a60->cant + $monto_mas60->cant;

    $data['total_monto']= $total_monto;
    $data['total_cant']= $total_cant;

    $this->load->view('header');
	$this->load->view('menu');
	$this->load->view('cheques_propios', $data);
	
  }






 public function cheques_terceros()
  {
  	if (!$this->session->userdata('username'))
    {
      redirect('login');
    }
	$data=array();
    $this->load->model('cheque_model');
    $lista_cheques=  $this->cheque_model->obtener_cheques_terceros();

	date_default_timezone_set('America/Argentina/Buenos_Aires');
    $begin_date = date( 'Y-m-d', strtotime( 'today' ) );
    $end_date = $begin_date;    
    $monto_hoy = $this->cheque_model->obtener_monto_a_cobrar($begin_date, $end_date);
    $begin_date = date( 'Y-m-d', strtotime( '+1 day' ) );
    $end_date = date( 'Y-m-d', strtotime( '+8 day' ) );
    $monto_1a7 = $this->cheque_model->obtener_monto_a_cobrar($begin_date, $end_date);
    $begin_date = date( 'Y-m-d', strtotime( '+9 day' ) );
    $end_date = date( 'Y-m-d', strtotime( '+22 day' ) );
    $monto_8a15 = $this->cheque_model->obtener_monto_a_cobrar($begin_date, $end_date);
    $begin_date = date( 'Y-m-d', strtotime( '+23 day' ) );
    $end_date = date( 'Y-m-d', strtotime( '+45 day' ) );
    $monto_16a30 = $this->cheque_model->obtener_monto_a_cobrar($begin_date, $end_date);
    $begin_date = date( 'Y-m-d', strtotime( '+46 day' ) );
    $end_date = date( 'Y-m-d', strtotime( '+90 day' ) );
    $monto_31a60 = $this->cheque_model->obtener_monto_a_cobrar($begin_date, $end_date);
    $begin_date = date( 'Y-m-d', strtotime( '+91 day' ) );
    $end_date = date( 'Y-m-d', strtotime( '+360 day' ) );
    $monto_mas60 = $this->cheque_model->obtener_monto_a_cobrar($begin_date, $end_date);

    if (isset($lista_cheques))
    	$data['cheques']= $lista_cheques->result_array();
    $data['monto_hoy']= $monto_hoy;
    $data['monto_1a7']= $monto_1a7;
    $data['monto_8a15']= $monto_8a15;
    $data['monto_16a30']= $monto_16a30;
    $data['monto_31a60']= $monto_31a60;
    $data['monto_mas60']= $monto_mas60;

    $total_monto= $monto_hoy->monto + $monto_1a7->monto + $monto_8a15->monto + $monto_16a30->monto + $monto_31a60->monto + $monto_mas60->monto;
    $total_cant= $monto_hoy->cant + $monto_1a7->cant + $monto_8a15->cant + $monto_16a30->cant + $monto_31a60->cant + $monto_mas60->cant;

    $data['total_monto']= $total_monto;
    $data['total_cant']= $total_cant;

    $this->load->view('header');
	$this->load->view('menu');
	$this->load->view('cheques_terceros', $data);
	
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




   public function nuevo_cheque_terceros()
  {
  	if (!$this->session->userdata('username'))
    {
      redirect('login');
    }

    $data=array();
    $this->load->model('cheque_model');
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

  public function proveedores()
  {
  	if (!$this->session->userdata('username'))
    {
      redirect('login');
    }
	$data=array();
    $this->load->model('cheque_model');
    $lista_proveedores=  $this->cheque_model->obtener_proveedores();

    if (isset($lista_proveedores))
    	$data['proveedores']= $lista_proveedores->result_array();

    $this->load->view('header');
	$this->load->view('menu');
	$this->load->view('proveedores', $data);
  }


   public function nuevo_proveedor()
  {
  	if (!$this->session->userdata('username'))
    {
      redirect('login');
    }

     $this -> load -> view('header');
     $this -> load -> view('menu');
	 $this -> load -> view('nuevo_proveedor');
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






  public function editar_cuenta()
  {
  	if (!$this->session->userdata('username'))
    {
      redirect('login');
    }
    $data=array();
	$this->load->model('cheque_model');
 	$id_cuenta = $this->uri->segment(3);           
    $cuenta = $this->cheque_model->obtener_cuenta($id_cuenta);
    $lista_bancos=  $this->cheque_model->obtener_bancos();

    if (isset($cuenta))
    	$data['cuenta']= $cuenta->result_array();

    if (isset($lista_bancos))
    	$data['bancos']= $lista_bancos->result_array();

     $this -> load -> view('header');
     $this -> load -> view('menu');
	 $this -> load -> view('editar_cuenta', $data);
  }



  public function editar_proveedor()
  {
  	if (!$this->session->userdata('username'))
    {
      redirect('login');
    }
    $data=array();
	$this->load->model('cheque_model');
 	$id_prov = $this->uri->segment(3);           
    $proveedor = $this->cheque_model->obtener_proveedor($id_prov);

    if (isset($proveedor))
    	$data['proveedor']= $proveedor->result_array();
    
     $this -> load -> view('header');
     $this -> load -> view('menu');
	 $this -> load -> view('editar_proveedor', $data);
  }



  public function editar_cliente()
  {
  	if (!$this->session->userdata('username'))
    {
      redirect('login');
    }
    $data=array();
	$this->load->model('cheque_model');
 	$id_cliente = $this->uri->segment(3);           
    $cliente = $this->cheque_model->obtener_cliente($id_cliente);

    if (isset($cliente))
    	$data['cliente']= $cliente->result_array();
    
     $this -> load -> view('header');
     $this -> load -> view('menu');
	 $this -> load -> view('editar_cliente', $data);
  }



  public function editar_chequera()
  {
  	if (!$this->session->userdata('username'))
    {
      redirect('login');
    }
    $data=array();
	$this->load->model('cheque_model');
 	$id_cheq = $this->uri->segment(3);           
    $chequera = $this->cheque_model->obtener_chequera($id_cheq);
    $lista_cuentas=  $this->cheque_model->obtener_cuentas();

    if (isset($lista_cuentas))
    	$data['cuentas']= $lista_cuentas->result_array();

    if (isset($chequera))
    	$data['chequera']= $chequera->result_array();
    
     $this -> load -> view('header');
     $this -> load -> view('menu');
	 $this -> load -> view('editar_chequera', $data);
  }


   public function editar_cheque_propio()
  {
  	if (!$this->session->userdata('username'))
    {
      redirect('login');
    }
    $data=array();
	$this->load->model('cheque_model');
 	$id_cheque = $this->uri->segment(3);           
    $cheque = $this->cheque_model->obtener_cheque($id_cheque);
    $lista_proveedores=  $this->cheque_model->obtener_proveedores();
    $lista_chequeras=  $this->cheque_model->obtener_chequeras_selectbox();

    if (isset($lista_proveedores))
    	$data['proveedores']= $lista_proveedores->result_array();
    if (isset($lista_chequeras))
    	$data['chequeras']= $lista_chequeras->result_array();
	if (isset($cheque))
    	$data['cheque']= $cheque->result_array();


    
     $this -> load -> view('header');
     $this -> load -> view('menu');
	 $this -> load -> view('editar_cheque_propio', $data);
  }




}
