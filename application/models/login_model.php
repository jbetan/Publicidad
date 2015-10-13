<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model
{
    function  __construct()
    {
        parent::__construct();

    }

    public function login_user ($user, $pw)
    {
        $query = $this
             ->db
             ->select('us.id, us.username, us.tipo, em.nombre_usuario, em.nombreEmpresa')
             ->from('usuario AS us')
             ->join('empresa AS em', 'us.idEmpresa =em.id', 'INNER')
             ->where('username', $user)
             ->where('contrasena', $pw)
             ->limit(1)
             ->get();

        if ($query ->num_rows == 1)
        {
            return $query->row();
        }else{
            $this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
            redirect('login/index/index','refresh');
        }

    }
}
/*
 * Ejemplo de Joins con CodeIgniter
$this->db->select('*');
$this->db->from('TableA AS A');// I use aliasing make joins easier
$this->db->join('TableC AS C', 'A.ID = C.TableAId', 'INNER');
$this->db->join('TableB AS B', 'B.ID = C.TableBId', 'INNER');
$result = $this->db->get();
*/