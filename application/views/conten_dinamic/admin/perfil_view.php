<?php
//http://freakshare.com/files/wvnl82hd/Inteligencia-Artificial-CON-APLICACIONES-A-LA-INGENIER--A.pdf.html
?>

<section id="contact-page" class="container">
    <div class="row">

        <h3>Perfil de Usuario</h3>



        <?php
        //echo $username;
        $this->load->view('conten_dinamic/admin/menu_admin_perfil');
        ?><br/>


            <div class="span3 "  >
                <div class="widget ads">
                    <div class="row-fluid">
                        <div class="span12" style="background: #ffffff">

                           <img src="<?= base_url();?>uploads/ph.png" width='270' height='270' >

                            <!--
                            <img src="uploads/u/Desert.jpg" width='270' height='270' >
                            -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="span5 "  >
                <div class="row-fluid">
                    <div class="span12">

                        <h1 style="text-align: center">  <em> <?=$this->session->userdata('nom')?></em> </h1><br/>
                        <h5 style="text-align: center"><?=$this->session->userdata('nom')?> es un trabajaro para <em><?=$this->session->userdata('empresa')?></em></h5>
                        <br/>
                        <div class="progress progress-info"><div class="bar" style="width: 80%; text-align:left; padding-left:25px;">
                                <strong>Informacion Usuario</strong></div></div>

                        <table WIDTH=450 table cellpadding="5"   >
                              <tr  >
                                  <td WIDTH=130 style="border-right:1px solid #000000; padding-left:15px;" >Nombre Usuario:</td>
                                  <td style="padding-left:20px"><?=$name_user;?></td>
                              </tr>
                              <tr >
                                  <td WIDTH=130  style="border-right:1px solid #000000; padding-left:15px;" >UserName:</td>
                                  <td style="padding-left:20px"><?=$username;?></td>
                              </tr>
                              <tr>
                                  <td WIDTH=130 style="border-right:1px solid #000000;padding-left:15px;" >Password:</td>
                                  <td style="padding-left:20px"><?=$pw;?></td>
                              </tr>
                        </table>
                        <br/>
                        <div class="progress progress-info"><div class="bar" style="width: 80%; text-align:left; padding-left:25px;">
                                <strong>Informacion Empresa</strong></div></div>

                        <table WIDTH=450 table cellpadding="5"  >
                            <tr  >
                                <td WIDTH=130 style="border-right:1px solid #000000; padding-left:15px;" >Nombre Empresa:</td>
                                <td style="padding-left:20px"><?=$name_emp;?></td>
                            </tr>
                            <tr >
                                <td  WIDTH=130 style="border-right:1px solid #000000; padding-left:15px;" >Ubicacion:</td>
                                <td style="padding-left:20px"><?=$ubicacion;?></td>
                            </tr>
                            <tr>
                                <td WIDTH=130 style="border-right:1px solid #000000; padding-left:15px;" >Num de Contrato:</td>
                                <td style="padding-left:20px"><?=$numContrato;?></td>
                            </tr>

                        </table>
                        <br/>

                        <div class="progress progress-info"  ><div class="bar" style="width: 80%; text-align:left; padding-left:25px; ">
                                <strong>Contactos de la Empresa</strong></div></div>
                        <table WIDTH=450 table cellpadding="5"  >
                            <tr  >
                                <td WIDTH=130 style="border-right:1px solid #000000; padding-left:15px;" >Telefono:</td>
                                <td style="padding-left:20px"><?=$telefono;?></td>
                            </tr>
                            <tr >
                                <td  WIDTH=130 style="border-right:1px solid #000000; padding-left:15px;" >Email:</td>
                                <td style="padding-left:20px"><?=$correo;?><br/></td>
                            </tr>
                            <tr>
                                <td WIDTH=130 style="border-right:1px solid #000000; padding-left:15px;" >Facebook:</td>
                                <td style="padding-left:20px"><?=$face;?><br/></td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>




    </div>
</section>