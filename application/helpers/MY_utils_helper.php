<?php
/**
 * Created by PhpStorm.
 * User: J. Betancourt
 * Date: 02/10/2015
 * Time: 12:03 AM
 */
	if(!defined('BASEPATH'))
        exit('No direct script access allowed');

	function dbg($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }



?>