<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Perfil_model extends CI_Model
{
    function  __construct()
    {
        parent::__construct();

    }

    public function datos_user ($iduser)
    {
        $query = $this
            ->db
            ->select('us.id AS idU, us.username, us.contrasena, em.id as idE, em.nombre_usuario, em.nombreEmpresa, em.ubicacion, em.telefono, em.email, em.face, em.ruta, em.idContrato ')
            ->from('usuario AS us')
            ->join('empresa AS em', 'us.idEmpresa = em.id', 'INNER')
            ->where('us.id', $iduser)
            ->limit(1)
            ->get();

        print_r($query ->num_rows);
        if ($query ->num_rows == 1)
        {
            return $query->row();
        }else{
            $this->session->set_flashdata('error','Datos usuario no encontrados ');
            redirect('perfil','refresh');
        }

    }

    public function delete_and_create_logo ($filename)
    {

        print_r($filename);
        echo "Nombre del archivo";
        return true;
        //eliminando del servidor
        //unlink($directorio.$foto);//sabiendo que estos son los parametros para tu caso
        /*
<?
	include_once('datos.php');
	conectar();

	//elimina archivo real
	$id= $_REQUEST[id];

$rs = mysql_query("SELECT foto FROM n1 WHERE id=$id");

	list($foto) = mysql_fetch_row($rs);

	unlink("imagenes/".$foto);
	unlink("imagenes/thumbs/thumb_".$foto);


	//reasigna imagen por defecto
	$foto = 'default.gif';

	// elimina registro
	mysql_query("UPDATE n1 SET foto = '$foto' WHERE id=$id");


	desconectar();
  header("Location: novedad_actualizar.php?id=$id ");
?>*/
    }

    public function save_user($idU, $idE, $username, $pw, $nombreUsuario, $nombreempresa, $ubicacion, $tel, $email, $face, $tipo, $idContrato, $ruta)
    {
          if (!is_null($idU) AND !is_null($idE)) {
            $dataU = array(
                'username' => $username,
                'contrasena' => sha1($pw),

            );
            $this->db->where('id', $idU);
            $this->db->update('usuario', $dataU);

            $dataE = array(
                'nombre_usuario' => $nombreUsuario,
                'nombreEmpresa' => $nombreempresa,
                'ubicacion' => $ubicacion,
                'telefono' => $tel,
                'email' => $email,
                'face' => $face
            );
            $this->db->where('id', $idE);
            $this->db->update('empresa', $dataE);
            return true;
        }else{
            $dataE = array(
                'idContrato' => $idContrato,
                'nombre_usuario' => $nombreUsuario,
                'ruta' => $ruta,
                'nombreEmpresa' => $nombreempresa,
                'ubicacion' => $ubicacion,
                'telefono' => $tel,
                'email' => $email,
                'face' => $face
            );
            $this->db->insert('empresa', $dataE);

            $sql = "SELECT id FROM empresa ORDER BY id DESC LIMIT 1 ";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0)
            {
                $row = $query->row();
                $row->id;
            }

            $dataU = array(
                'idEmpresa' => $row->id,
                'username' => $username,
                'contrasena' => $pw,
                'tipo' => $tipo
            );
            $this->db->insert('usuario', $dataU);
            return true;
        }

        return false;
    }

}