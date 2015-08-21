<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
        $datos['titulo'] = 'Inicio';
        //header
		$this->load->view('template/front_end/header_p', $datos);
        //Contenido Dinamico
        $this->load->view('conten_dinamic/index');

        //Footer
        $this->load->view('template/front_end/footer_azul');
        $this->load->view('template/front_end/footer_negro');
	}

    public function service()
{

    $datos['titulo'] = 'Servicos';
    $datos['contenido'] = 'service';
    $this->load->view('template/template_main',$datos);
}
    public function prueba()
    {

        $datos['titulo'] = 'Prueba';
        $datos['contenido'] = 'prueba';
        $this->load->view('template/template_main',$datos);
    }
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */