<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {




    public function index()
    {

        $datos['titulo'] = 'Usuarios';
        $datos['contenido'] = 'usuarios_view';
        $this->load->view('template/template_admin',$datos);


    }





}