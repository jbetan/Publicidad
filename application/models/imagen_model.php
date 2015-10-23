<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Imagen_model extends CI_Model{

    public function construct() {
        parent::__construct();
        $this->load->library(array('session'));
    }

    public function getImagenesbyUser()
    {

        $idUser = $this->session->userdata('id_usuario');
        $query = $this
            ->db
            ->select('gal.titulo, gal.ruta, gal.id ')
            ->from('galeria AS gal')
            ->join('empresa AS emp', 'gal.idEmpresa = emp.id', 'INNER')
            ->join('usuario AS us', 'us.idEmpresa = emp.id', 'INNER')
            ->where('us.id', $idUser)
            ->get();


        if ($query->num_rows > 0) {
            foreach ($query->result() as $fila) {
                $data[] = $fila;
            }
            return $data;

        } else {
            return false;
        }
    }
        public function getImagenbyId($id){

            $query = $this
                ->db
                ->select('*')
                ->from('galeria')
                ->where('id', $id)
                ->limit(1)
                ->get();

            if ($query ->num_rows == 1){

                return $query->row();

            }else{
               return false;
            }
        }

    public function getFechaId($id){
        $fechaParcial = "";
        $qry = $this
            ->db
            ->select('fecha')
            ->from('calendario')
            ->where('idGaleria', $id)
            ->get();
        if ($qry->num_rows > 0) {
            foreach ($qry->result() as $fila) {
                $fecha[] = $fila;
                $fechaParcial .=$fila->fecha.", ";
            }
        }

        $n = strlen($fechaParcial);
        $fechaTotal = substr($fechaParcial, 0, $n-2);
        //console_log($fechaTotal);
        return $fechaTotal;
    }

        public  function updateImagen($id, $titulo, $desc, $rest, $ubic, $info ='', $fecha='' ){
            $this->db->trans_start();
            $data = array(
                'id'    =>  $id,
                'titulo' => $titulo,
                'descripcion' => $desc,
                'restripcion' => $rest,
                'ubicacion' => $ubic,
                'infoadicional' => $info,
            );
            print_r($data);
            $this->db->where('id', $id);
            $this->db->update('galeria', $data);
            $this->db->trans_complete();
            dbg('model');
            return true;

            //Falta las fechas del calendario
        }

        public function  deleteImagen($id){

            $query = $this
                ->db
                ->select('ruta')
                ->from('galeria')
                ->where('id', $id)
                ->limit(1)
                ->get();

            if ($query ->num_rows() > 0){
                $data = $query->row();
                $delete = $this->db->delete('galeria', array('id' => $id));
                if($delete){
                    unlink("uploads/".$data->ruta);
                    return true;
                }else{return false;}
            }else{return false;}
        }

}