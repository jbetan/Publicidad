<?php

$form = array(
    'class' => 'contact-form'
);

$input_name_user = array(
    'name' => 'name_user',
    'class' => 'input-block-level',
    'placeholder' => 'Nombre de Usuario Completo',
    'value' => $name_user

);

$input_username = array(
    'name' => 'UserName',
    'class' => 'input-block-level',
    'placeholder' => 'Escriba su Correo Electronico',
    'value' => $username
);

$input_password = array(
    'name' => 'password',
    'class' => 'input-block-level',
    'placeholder' => 'Escriba su nuevo Password',
    'value' => '1234567'

);
$input_Conf_password = array(
    'class' => 'input-block-level',
    'placeholder' => 'Repita se Passwoed',
    'value' => '1234567'

);

$input_nameEmp = array(
    'name' => 'nameEmp',
    'class' => 'input-block-level',
    'placeholder' => 'Nombre de la Empresa',
    'value' => $name_emp
);

$input_ubicacion = array(
    'name' => 'ubicacion',
    'class' => 'input-block-level',
    'placeholder' => 'Direccion de la empresa',
    'value' => $ubicacion
);

$input_tel = array(
    'name' => 'tel',
    'class' => 'input-block-level',
    'placeholder' => 'Telefono de la empresa',
    'value' => $telefono

);

$input_email = array(
    'name' => 'email',
    'class' => 'input-block-level',
    'placeholder' => 'Email de la empresa',
    'value' => $correo

);

$input_face= array(
    'name' => 'face',
    'class' => 'input-block-level',
    'placeholder' => 'FaceBook de la empresa',
    'value' => $face

);

//Datos Ocultos
$hidden = array(
    'idUsuario' => $idU,
    'idEmpresa' => $idE
);



$input_submit = array(
    'value' => 'Enviar',
    'class' => 'btn btn-primary btn-large pull-right'
);

?>

<section id="contact-page" class="container">
    <div class="row">

        <h3>Editar Perfil</h3>

        <?php
        //echo $username;
        $this->load->view('conten_dinamic/admin/menu_admin_perfil');
        ?><br/>


        <div class="span7 offset1"  >
            <div class="row-fluid">
                <div class="span12">
                    <h3>Editar</h3>

                    <?php echo form_open('perfil/edit_profile',$form) ?>

                            <div class="progress progress-info"><div class="bar" style="width: 100%; text-align:center; padding-left:25px;">
                            <strong>Informacion Usuario</strong></div></div>

                            <?php
                            echo form_label('Nombre de usuario:').'<spa class="text-error">'. form_error("name_user") .'</spa>';
                            echo form_input($input_name_user);

                            echo form_label('UserName:').'<spa class="text-error">'. form_error("UserName") .'</spa>';
                            echo form_input($input_username);

                            echo form_label('Nuevo Password').'<spa class="text-error">'. form_error("password") .'</spa>';
                            echo form_input($input_password);

                            echo form_label('Confirmar Password').'<spa class="text-error">'. form_error("password") .'</spa>';
                            echo form_input($input_Conf_password);
                            ?>

                             <div class="progress progress-info"><div class="bar" style="width: 100%; text-align:center; padding-left:25px;">
                            <strong>Informacion Empresa</strong></div></div>
                            <?php

                            echo form_label('Nombre de la Empresa').'<spa class="text-error">'. form_error("nameEmp") .'</spa>';
                            echo form_input($input_nameEmp);

                            echo form_label('Ubicacion').'<spa class="text-error">'. form_error("ubicacion") .'</spa>';
                            echo form_input($input_ubicacion);
                            ?>

                           <div class="progress progress-info"><div class="bar" style="width: 100%; text-align:center; padding-left:25px;">
                            <strong>Contacto de la Empresa</strong></div></div>
                            <?php
                            echo form_label('Telefono').'<spa class="text-error">'. form_error("tel") .'</spa>';
                            echo form_input($input_tel);

                            echo form_label('Email de la Empresa:').'<spa class="text-error">'. form_error("email") .'</spa>';
                            echo form_input($input_email);

                            echo form_label('FaceBook').'<spa class="text-error">'. form_error("face") .'</spa>';
                            echo form_input($input_face);

                            //Imput Ocultos
                            echo form_hidden($hidden);


                            ?>
                            <?php echo form_submit($input_submit); ?><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                    <?= form_close()?>
                </div>
            </div>
        </div>

    </div>
</section>