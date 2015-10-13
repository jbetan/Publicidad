<?php
/*Header*/
$this->load->view('template/front_end/head');
$this->load->view('template/front_end/menu_admin');

$this->load->view('template/front_end/header_s_admin');
/*Contenido Dinamico*/
$this->load->view('conten_dinamic/adminGral/'.$contenido);
/*Footer------------*/

$this->load->view('template/front_end/footer_negro_admin');