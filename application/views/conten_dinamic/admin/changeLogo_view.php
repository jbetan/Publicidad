<?php

$form = array(
    'class' => 'contact-form'
);

$input_upload = array(
    'name' => 'userfile',
    'class' => 'btn btn-primary btn-xs'
);

$input_submit = array(
    'value' => 'Guardar Logo',
    'class' => 'btn btn-primary btn-large pull-right'
);
?>

<section id="contact-page" class="container">
    <div class="row">

        <h3>Cambiar Logo</h3>

        <?php
        //echo $username;
        $this->load->view('conten_dinamic/admin/menu_admin_perfil');
        ?><br/>


        <div class="span7 offset1"  >
            <div class="row-fluid">
                <div class="span12">
                    <h3>Cambiar Logo de la Empresa </h3>

                    <?php echo form_open_multipart('perfil/change_logo',$form) ?>
                    <?php
                    echo '<spa class="text-error">'. @$res .'</spa>';
                    echo form_label('Elija una logo nuevo si desea cambir el logo. Recuerde que la imagen deb ser de tipo (jpg,png) y no debe pesar mas de 400kb:').'<spa class="text-error">'. form_error("file") .'</spa>';
                    echo form_upload($input_upload);

                    ?>
                    <br/> <br/>
                    <?php echo form_submit($input_submit); ?><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                    <?= form_close()?>

                </div>
            </div>
        </div>

    </div>
</section>