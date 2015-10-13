<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library(array('session','form_validation'));
        $this->load->database('default');
    }


    public function index($menu)
    {
        switch ($this->session->userdata('tipo')) {
            case '':
                if (strcmp($menu, '') !== 0) {
                    if (strcmp($menu, 'index') == 0) {
                        redirect('home');
                    } else {
                        redirect('home/'.$menu);
                    }
                }
                break;
            case 'empresa':
                redirect('perfil');
                break;
            case 'admin':
                redirect('usuarios');
                break;

            default:
                if (strcmp($menu, '') !== 0) {
                    if (strcmp($menu, 'index') == 0) {
                        redirect('home');
                    } else {
                        redirect('home/'.$menu);
                    }
                }
                break;
        }
    }

    public function new_user()
    {
     print_r('fase 1');
        if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
        {
            $this->form_validation->set_rules('username', 'nombre de usuario', 'required|trim|min_length[5]|max_length[150]|xss_clean');
            $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]|max_length[150]|xss_clean');

            //lanzamos mensajes de error si es que los hay

            if($this->form_validation->run() == FALSE)
            {
                //redirect('home');
                $this->index('index');
            }else{
                print_r('fase 2');
                $username = $this->input->post('username');
                $password = sha1($this->input->post('password'));
                $check_user = $this->login_model->login_user($username,$password);
                print_r('fase 3');
                if($check_user == TRUE)
                {

                    $data = array(
                        'is_logued_in' 	=> 		TRUE,
                        'id_usuario' 	=> 		$check_user->id,
                        'tipo'		=>		$check_user->tipo,
                        'username' 		=> 		$check_user->username,
                        'nom' 		=> 		$check_user->nombre_usuario,
                        'empresa' 		=> 		$check_user->nombreEmpresa
                    );
                    $this->session->set_userdata($data);
                    //redirect('home');
                    $this->index('index/index');
                }
                print_r('fase 4');
               // $this->index('index');
            }
        }else{

            $this->index('index');
        }
    }


    public function token()
    {
        $token = md5(uniqid(rand(),true));
        $this->session->set_userdata('token',$token);
        return $token;
    }

    public  function  cerrar ()
    {
        $data = array(
        'is_logued_in' 	=>'',
        'id_usuario' 	=>'',
        'tipo'		=>'',
        'username' 		=>'',
        'nom' 		=> '',
        'empresa' 		=>''
        );
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
        $this->index('index');
    }





}

/* End of file login.php */
/* Location: ./application/controllers/login.php */