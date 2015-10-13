<?php
/*Header*/
$this->load->view('template/front_end/head');
$this->load->view('template/front_end/menu_main');
$this->load->view('template/front_end/header_s');
/*Contenido Dinamico*/
$this->load->view('conten_dinamic/cliente/'.$contenido);
/*Footer*/
$this->load->view('template/front_end/footer_azul');
$this->load->view('template/front_end/footer_negro');