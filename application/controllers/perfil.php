<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model('perfil_model');
        $this->load->library('form_validation');
        $this->load->database('default');
    }

    public function index()
    {
        if($this->session->userdata('tipo') == FALSE || $this->session->userdata('tipo') != 'empresa')
        {
            redirect('login/index/index');
        }

        $idUser =$this->session->userdata('id_usuario');
        $check_user = $this->perfil_model->datos_user($idUser);


        if($check_user == TRUE)
        {
            //print_r($check_user);
            $datos = array(
                'name_user' 	=> 		$check_user->nombre_usuario,
                'username' 	    => 		$check_user->username,
                'pw' 	        => 		"********",
                'name_emp' 	    => 		$check_user->nombreEmpresa,
                'ubicacion' 	=> 		$check_user->ubicacion,
                'numContrato' 	=> 		$check_user->idContrato,
                'telefono'		=>		$check_user->telefono,
                'face' 		    => 		$check_user->face,
                'correo' 		=> 		$check_user->email,
                'imagen' 	    => 		$check_user->ruta,

            );
        }
        $datos['opc'] = 'perfil';
        $datos['titulo'] = 'Perfil';
        $datos['contenido'] = 'perfil_view';
        $this->load->view('template/template_empresa',$datos);
    }

    public function edit_profile()
    {
        $this->form_validation->set_rules('name_user',  'Nombre de usuario',         'required|min_length[5]|max_length[50]|trim|xss_clean');
        $this->form_validation->set_rules('UserName',   'Nombre de Cuenta',          'required|min_length[5]|max_length[50]|trim|xss_clean');
        $this->form_validation->set_rules('password',   'Password',                  'required|min_length[5]|max_length[50]|trim|xss_clean');
        $this->form_validation->set_rules('nameEmp',    'Nombre de la empresa',      'required|min_length[5]|max_length[50]|trim|xss_clean');
        $this->form_validation->set_rules('ubicacion',  'Ubicacion',                 'required|min_length[5]|max_length[50]|trim|xss_clean');
        $this->form_validation->set_rules('tel',        'Telefono',                  'required|min_length[5]|max_length[50]|trim|xss_clean');
        $this->form_validation->set_rules('email',      'Email',                     'required|min_length[5]|max_length[50]|trim|xss_clean');
        $this->form_validation->set_rules('face',       'Facebook',                  'required|min_length[5]|max_length[50]|trim|xss_clean');
      // echo "Paso 1 <br>";
        //echo $this->input->post('password');

        if($this->form_validation->run() == false)
        {
           // print_r('Error');
               $this->form_edit_profile();
        } else {

            //print_r('paso 2 <br>');


                $nombreUsuario = $this->input->post('name_user');
                $userName      = $this->input->post('UserName');
                $pw            = $this->input->post('password');
                $nameEmp       = $this->input->post('nameEmp');
                $ubicacion     = $this->input->post('ubicacion');
                $tel           = $this->input->post('tel');
                $email         = $this->input->post('email');
                $face          = $this->input->post('face');

                $idU           = $this->input->post('idUsuario');
                $idE           = $this->input->post('idEmpresa');
                $idContrato    = '';
                $ruta          ='';
                $tipo          ='';

                $subir = $this->perfil_model->save_user(
                    $idU,
                    $idE,
                    $userName,
                    $pw,
                    $nombreUsuario,
                    $nameEmp,
                    $ubicacion,
                    $tel,
                    $email,
                    $face,
                    $tipo,
                    $idContrato,
                    $ruta
                );

                if($subir == TRUE) {
                    $this->index();
                }

                if($subir == FALSE) {
                echo "<br> Hubo un error al guardar en la bse de datos";
                }

                $this->form_edit_profile();


            }

    }

    public function form_edit_profile()
    {
        if($this->session->userdata('tipo') == FALSE || $this->session->userdata('tipo') != 'empresa')
        {
            redirect('login/index/index');
        }

        $idUser =$this->session->userdata('id_usuario');
        $check_user = $this->perfil_model->datos_user($idUser);


        if($check_user == TRUE)
        {
            $datos = array(
                'name_user' 	=> 		$check_user->nombre_usuario,
                'username' 	    => 		$check_user->username,
                'name_emp' 	    => 		$check_user->nombreEmpresa,
                'ubicacion' 	=> 		$check_user->ubicacion,
                'numContrato' 	=> 		$check_user->idContrato,
                'telefono'		=>		$check_user->telefono,
                'face' 		    => 		$check_user->face,
                'correo' 		=> 		$check_user->email,
                'imagen' 	    => 		$check_user->ruta,
                'idU'           =>      $check_user->idU,
                'idE'           =>      $check_user->idE
            );
        }
        $datos['opc'] = 'editar';
        $datos['titulo'] = 'Perfil / Editar Perfil';
        $datos['contenido'] = 'editProfile_view';
        $this->load->view('template/template_empresa',$datos);
    }



    public  function form_change_logo()
    {   $datos['opc'] = 'cambiar_img';
        $datos['titulo'] = 'Perfil';
        $datos['contenido'] = 'changeLogo_view';
        $this->load->view('template/template_empresa',$datos);
    }

    public  function change_logo()
    {

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);


        if (!$this->upload->do_upload()) {
            print_r('occurio un error');
            $datos = array('res' => $this->upload->display_errors());
            $datos['opc'] = 'cambiar_img';
            $datos['titulo'] = 'Perfil';
            $datos['contenido'] = 'changeLogo_view';
            $this->load->view('template/template_empresa', $datos);
        } else {
            echo "paso 1";
            $file_info = $this->upload->data();

            print_r($file_info);

            $filename = $file_info['file_name'];
            echo $filename;
            echo "paso 2";
            $subir = $this->perfil_model->delete_and_create_logo($filename);
            if ($subir == true) {
                $this->form_change_logo();
                echo "paso 3";
                //$this->index();
            } else {
                print_r("ERROR");
                $this->form_change_logo();

            }
        }
    }
}

/* End of file perfil.php */
/* Location: ./application/controllers/login.php */