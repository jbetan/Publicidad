<?php

$form = array(
    'class' => 'contact-form'
    //'id' => 'main-contact-form'
);

$input_titulo = array(
    'name' => 'titulo',
    'class' => 'input-block-level',
    'placeholder' => 'Titulo de la promocion'
);

$input_descripcion = array(
    'name' => 'descripcion',
    'class' => 'input-block-level',
    'placeholder' => 'Descripcion de la promocion'
);

$input_restriccion = array(
    'name' => 'restriccion',
    'class' => 'input-block-level',
    'placeholder' => 'Restriccion de la promocion'
);

$input_ubicacion = array(
    'name' => 'ubicacion',
    'class' => 'input-block-level',
    'placeholder' => 'Ubicacion de la promocion'
);

$input_info = array(
    'name' => 'info',
    'class' => 'input-block-level',
    'placeholder' => 'Informacion adicional (no necesario)'
);

$input_dias = array(
    'name' => 'dias',
    'class' => 'input-block-level',
    'placeholder' => 'Dias de promocion',
    'id' => 'fechaDP'

);

$input_upload = array(
    'name' => 'userfile',
    'class' => 'btn btn-primary btn-xs'
);


$input_submit = array(
    'value' => 'Guardar',
    'class' => 'btn btn-primary btn-large pull-right'
);

?>


<section id="contact-page" class="container">
    <div class="row">
        <div class="span6 offset3" >
            <h3>Carga de Imagen</h3>
            <div class="status alert alert-success" style="display: none"></div>


            <?php echo form_open_multipart('cargar/cargarImg',$form) ?>
            <div class="row-fluid">
                <div class="span12">

                    <?php
                        echo '<spa class="text-error">'. @$res .'</spa>';
                        echo form_label('Elegir imagen').'<spa class="text-error">'. form_error("userfile") .'</spa>';
                        echo form_upload($input_upload);

                        echo form_label('Titulo').'<spa class="text-error">'. form_error("titulo") .'</spa>';
                        echo form_input($input_titulo);

                        echo form_label('Descripcion').'<spa class="text-error">'. form_error("descripcion") .'</spa>';
                        echo form_input($input_descripcion);

                        echo form_label('Restriccion').'<spa class="text-error">'. form_error("restriccion") .'</spa>';
                        echo form_input($input_restriccion);

                        echo form_label('Ubicacion').'<spa class="text-error">'. form_error("ubicacion") .'</spa>';
                        echo form_input($input_ubicacion);

                        echo form_label('Info Extra');
                        echo form_input($input_info);

                        echo form_label('Dias de promocion').'<spa class="text-error">'. form_error("dias") .'</spa>';
                        echo form_input($input_dias);

                    ?>

                </div>
            </div>
            <?php echo form_submit($input_submit); ?><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            <?= form_close()?>
        </div>
    </div>
</section>

