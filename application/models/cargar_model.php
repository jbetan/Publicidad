<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cargar_model extends CI_Model {

    public function construct() {
        parent::__construct();
        $this->load->library(array('session'));

    }

    //FUNCIÓN PARA INSERTAR LOS DATOS DE LA IMAGEN SUBIDA
    function subirPromocion($titulo, $desc, $rest, $ubic, $info ='', $ruta, $fecha )
    {
        $this->db->trans_start(TRUE);
        $idU = $this->session->userdata('id_usuario');

        $sql = "SELECT empresa.id FROM usuario, empresa WHERE usuario.id =".$idU." AND usuario.idEmpresa = empresa.id LIMIT 1 ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
        {
            $row = $query->row();
            $row->id;
           // print_r($row);
        }

        $data = array(
            'idEmpresa' => $row->id,
            'titulo' => $titulo,
            'descripcion' => $desc,
            'restripcion' => $rest,
            'ubicacion' => $ubic,
            'infoadicional' => $info,
            'ruta' => $ruta,
        );

       $this->db->insert('galeria', $data);




     //Este parte servira para hacer una consulta a la tabla galeria y podamos obtner el id
     // para poder insertralo en la tabla calendario para poder hacer la relacion
        $sql = "SELECT id FROM galeria ORDER BY id DESC LIMIT 1 ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
        {
            $row = $query->row();
            $row->id;
           // print_r($row);
        }

        //Convertir la variable $fecha en arreglo
        //print_r($fecha);
        $fechas = explode(", ", $fecha);
        $dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');

        foreach($fechas as $fech)
        {
            $dia = $dias[date('N', strtotime($fech))];//Para obtener le dia de la fecha
            $fechaF=date("Y-m-d",strtotime($fech)); //Fecha formateada pra poder insertarse en MySQL
            //echo $fechaF."<br>";

            $dataC = array(
                'idGaleria' => $row->id,
                'fecha' => $fechaF,
                'dia' => $dia
            );
            //echo '<pre>';  print_r($dataC);  echo '</pre>';
            $this->db->insert('calendario', $dataC);

        }
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            //echo "<BR>------- TRANS FAILED -------</BR>";
            //$this->registerError('Error al realizar operacion de actualizacion');
            return FALSE;
        }

        $this->db->trans_off();
        return TRUE;
    }


}