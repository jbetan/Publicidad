<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model('home_model');
        $this->load->database('default');

    }

	public function index()
	{
        
        $promo = $this->home_model->getAllpromocion();
        dbg($promo);

        if($promo){
            $datos['promo'] = $promo;
        } 
        

        $datos['dia'] = 'index';
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Inicio';
        //head
		$this->load->view('template/front_end/head', $datos);
        $this->load->view('template/front_end/menu_main');
        //Contenido Dinamico
        $this->load->view('conten_dinamic/cliente/index');

        //Footer
        $this->load->view('template/front_end/footer_azul');
        $this->load->view('template/front_end/footer_negro');
	}

    public function Lunes(){

        $promo = $this->home_model->getPromocionByDay('Lunes');
        dbg($promo);

        if($promo){
            $datos['promo'] = $promo;
        }  

        $datos['dia'] = 'lunes';
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Lunes';
        $datos['contenido'] = 'lunes';
        $this->load->view('template/template_main',$datos);
    }



    public function Martes(){
        $datos['dia'] = 'martes';
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Martes';
        $datos['contenido'] = 'martes';
        $this->load->view('template/template_main',$datos);
    }

    public function Miercoles(){
        $datos['dia'] = 'miercoles';
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Miercoles';
        $datos['contenido'] = 'miercoles';
        $this->load->view('template/template_main',$datos);
    }

    public function Jueves(){
        $datos['dia'] = 'jueves';
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Jueves';
        $datos['contenido'] = 'jueves';
        $this->load->view('template/template_main',$datos);
    }

    public function Viernes(){

       // $promo = $this->home_model->getPromocionByDay('Viernes');
        //dbg($promo);
        //if($promo){
        //    $datos['promo'] = $promo;
        //}

        $datos['dia'] = 'viernes';
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Viernes';
        $datos['contenido'] = 'viernes';
        $this->load->view('template/template_main',$datos);
    }


     public function ViernesPromo(){

       print_r("viernes");
       //$promo = $this->home_model->getPromocionByDay('Viernes');
                
       $data["success"] = true;
       $data["message"] = "Exito al traer los datos";
       //$data["data"] = $promo;
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($data);
    }



    public function Sabado(){
        $promo = $this->home_model->getPromocionByDay('Sabado');
        dbg($promo);
        if($promo){
            $datos['promo'] = $promo;
        }


        $datos['dia'] = 'sabado';
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Sabado';
        $datos['contenido'] = 'sabado';
        $this->load->view('template/template_main',$datos);
    }

    public function Domingo(){
        $promo = $this->home_model->getPromocionByDay('Domingo');
        dbg($promo);
        if($promo){
            $datos['promo'] = $promo;
        }

        $datos['dia'] = 'domingo';
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Domingo';
        $datos['contenido'] = 'domingo';
        $this->load->view('template/template_main',$datos);
    }

    public function Hoy(){
        $promo = $this->home_model->getPromocionToday();
        dbg($promo);
        if($promo){
            $datos['promo'] = $promo;
        }


        $datos['dia'] = 'hoy';
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Hoy';
        $datos['contenido'] = 'hoy';
        $this->load->view('template/template_main',$datos);
    }



    public function prueba()
    {
      //  $datos = array();

        $datos["form"] = array(
        'class'  => 'contact-form',
        'name'  => 'contact-form',
        'id'   => 'main-contact-form',
        );

        $datos["input"] = array(
        'class'  => 'input-block-level'
        );

        $datos["input_submit"] = array(
         'value' => 'Enviar',
        'class'  => 'btn btn-primary btn-large pull-right'
        );

        $datos['token'] = $this->token();
        $datos['titulo'] = 'Prueba';
        $datos['contenido'] = 'otro';
        $this->load->view('template/template_main',$datos);
    }

    public function token()
    {
        $token = md5(uniqid(rand(),true));
        $this->session->set_userdata('token',$token);
        return $token;
    }


}

/* End of file home.php */
/* Location: ./application/controllers/home.php */