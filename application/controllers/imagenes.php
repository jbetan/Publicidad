<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imagenes extends CI_Controller {

   private $img = array();

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->library('form_validation');
        $this->load->model('imagen_model');
        $this->load->database('default');

    }

    public function index()
    {
        if($this->session->userdata('tipo') == FALSE || $this->session->userdata('tipo') != 'empresa')
        {
            redirect('login/index/index');
        }

       $img = $this->imagen_model->getImagenesbyUser();
       if($img){
           $datos['img']=$img;
       }else{
           $img = array();
           $datos['img']=$img;
           $datos['nota']='No tienes imagenes en este momento';
       }
        $datos['titulo'] = 'Mis Imagenes';
        $datos['contenido'] = 'imagenes_view';
        $this->load->view('template/template_empresa',$datos);
    }

    public function getinfo(){
     $id = $_GET['id'];
     $img = $this->imagen_model->getImagenbyId($id);

       $data["success"] = true;
       $data["message"] = "Exito al traer los datos";
       $data["data"] = array(
           'titulo'      => $img->titulo,
           'descripcion' => $img->descripcion,
           'restriccion'  => $img->restripcion,
           'ubicacion'   => $img->ubicacion,
           'info_extra'  => $img->infoadicional,
           'diaspromo'   => 'proximamente',

        );
        //header('Content-type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function borrarImagen(){
        $id = $_GET['id'];
        $delete = $this->imagen_model->deleteImagen($id);
        if($delete) {
            $data["success"] = true;
            $data["message"] = "Exito al traer los datos";
        }else{
            $data["success"] = false;
            $data["message"] = "Problemas para eliminar la imagen";
        }

        //header('Content-type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function update(){


            $this->form_validation->set_rules('titulo', 'titulo', 'required|min_length[5]|max_length[50]|trim|xss_clean');
            $this->form_validation->set_rules('descripcion', 'Descripcion', 'required|min_length[5]|max_length[50]|trim|xss_clean');
            $this->form_validation->set_rules('restriccion', 'Restriccion', 'required|min_length[5]|max_length[50]|trim|xss_clean');
            $this->form_validation->set_rules('ubicacion', 'Ubicacion', 'required|min_length[5]|max_length[50]|trim|xss_clean');


            if(!$this->form_validation->run() == FALSE)
            {
               echo $id = $this->input->post('id');
                echo $titulo = $this->input->post('titulo');
                echo $desc = $this->input->post('descripcion');
                echo $rest = $this->input->post('restriccion');
                echo $ubic = $this->input->post('ubicacion');
                echo $info = $this->input->post('info');
                echo $update = $this->imagen_model->updateImagen($id, $titulo, $desc, $rest, $ubic, $info, '');

                if($update) {
                    $data["success"] = true;
                    $data["message"] = "Exito al actualizar ";
                }else{
                    $data["success"] = false;
                    $data["message"] = "Error al actualizar";
                }
                echo json_encode($data);
            }else{
                $data["success"] = false;
                $data["message"] = "Error en los datos";
                echo json_encode($data);
            }

    }
}

