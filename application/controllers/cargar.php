<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cargar extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->library('form_validation');
        $this->load->model('cargar_model');
        $this->load->database('default');
    }

    public function index()
    {
        if ($this->session->userdata('tipo') == FALSE || $this->session->userdata('tipo') != 'empresa') {
            redirect('login/index/index');
        }
        $datos['res'] = '';
        $datos['titulo'] = 'Cargar Imagenes';
        $datos['contenido'] = 'cargarImagen_view';
        $this->load->view('template/template_empresa',$datos);
    }

    function cargarImg()
    {

        $this->form_validation->set_rules('titulo', 'titulo', 'required|min_length[5]|max_length[50]|trim|xss_clean');
        $this->form_validation->set_rules('descripcion', 'Descripcion', 'required|min_length[5]|max_length[50]|trim|xss_clean');
        $this->form_validation->set_rules('restriccion', 'Restriccion', 'required|min_length[5]|max_length[50]|trim|xss_clean');
        $this->form_validation->set_rules('ubicacion', 'Ubicacion', 'required|min_length[5]|max_length[50]|trim|xss_clean');
        $this->form_validation->set_rules('dias', 'Dias', 'required|min_length[5]|trim|xss_clean');

        if($this->form_validation->run() == true)
        {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '2000';
            $config['max_width']  = '2024';
            $config['max_height']  = '2008';

            $this->load->library('upload', $config);


            if (!$this->upload->do_upload()) {
                print_r('occurio un error');
                $datos = array('res' => $this->upload->display_errors());

                $datos['titulo'] = 'Cargar Imagenes';
                $datos['contenido'] = 'cargarImagen_view';
                $this->load->view('template/template_empresa',$datos);
            } else {
                $file_info = $this->upload->data();
                //$this->_create_thumbnail($file_info['file_name']);
                //$data = array('upload_data' => $this->upload->data());
                $titulo = $this->input->post('titulo');
                $desc = $this->input->post('descripcion');
                $rest = $this->input->post('restriccion');
                $ubic = $this->input->post('ubicacion');
                $info = $this->input->post('info');
                $fecha = $this->input->post('dias');
                $filename = $file_info['file_name'];
                $subir = $this->cargar_model->subirPromocion(
                $titulo,
                $desc,
                $rest,
                $ubic,
                $info,
                $filename,
                $fecha
                );
                if($subir)
                {
                    redirect("cargar", "refresh");
                    //$this->exito();
                }else{
                    print_r("ERROR");
                }


            }

        }else{
            $datos['res'] = '';
            $datos['titulo'] = 'Cargar Imagenes';
            $datos['contenido'] = 'cargarImagen_view';
            $this->load->view('template/template_empresa',$datos);
           //$this->index();

        }

    }

    public function exito()
    {
        $this->load->view('conten_dinamic/exito');
    }
}

/* End of file perfil.php */
/* Location: ./application/controllers/login.php */