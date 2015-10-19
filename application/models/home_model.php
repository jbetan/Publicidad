<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home_model extends CI_Model{

    public function construct() {
        parent::__construct();
        $this->load->library(array('session'));
    }


    public function getPromocionByDay($dia)
    {
    	 
        	$query = $this
            ->db
            ->select('gal.ruta, gal.titulo, gal.descripcion, gal.restripcion, ')
            ->from('galeria AS gal')
            ->join('calendario AS cal', 'gal.id = cal.idGaleria', 'INNER')
            ->where('cal.dia', $dia)
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

     public function getPromocionfecha($fecha)
    {
    	 
        	$query = $this
            ->db
            ->select('gal.ruta, gal.titulo, gal.descripcion, gal.restripcion, ')
            ->from('galeria AS gal')
            ->join('calendario AS cal', 'gal.id = cal.idGaleria', 'INNER')
            ->where('cal.fecha', $fecha)
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

       public function getPromocionToday()
    {
    	 	$fecha_actual = date("Y-m-d");
    	 	dbg($fecha_actual);
        	$query = $this
            ->db
            ->select('gal.ruta, gal.titulo, gal.descripcion, gal.restripcion, ')
            ->from('galeria AS gal')
            ->join('calendario AS cal', 'gal.id = cal.idGaleria', 'INNER')
            ->where('cal.fecha', $fecha_actual)
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

      public function getAllpromocion()
    {    	 	    	 	
        	$query = $this
            ->db
            ->select('gal.ruta, gal.titulo, gal.descripcion, gal.restripcion, ')
            ->from('galeria AS gal')
            ->join('calendario AS cal', 'gal.id = cal.idGaleria', 'INNER')
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

       public function getPromocionPremium()
    {    	 	    	 	
        	$query = $this
            ->db
            ->select('gal.ruta, gal.titulo, gal.descripcion, gal.restripcion, ')
            ->from('galeria AS gal')
            ->join('calendario AS cal', 'gal.id = cal.idGaleria', 'INNER')
            ->where('gal.premium', 'SI')
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

}
/*
Busqueda Aleatoria
=======================
$sql = “SELECT * FROM blogroll ORDER BY rand() LIMIT 10”;
$sql = “SELECT * FROM blogroll ORDER BY rand(” . time() . ” * ” . time() . “) LIMIT 10”;
otra forma 
SELECT TOP 10 Products.ProductName, Products.UnitPrice, Suppliers.CompanyName, Suppliers.ContactName, Products.UnitsInStock
FROM Products INNER JOIN Suppliers ON Products.SupplierID = Suppliers.SupplierID
WHERE (Products.Discontinued = 0) AND (Products.UnitsInStock > 0)
ORDER BY NEWID()
*/

