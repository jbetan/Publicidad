<!--  Login form -->
<?php
$data = array();
$data["form"] = array(
    'class'   => 'form-inline',
    'id'      => 'form-login'
);

$data["input_username"] = array(
    'name'          => 'username',
    'class'         => 'input-small',
    'placeholder'   => 'Usuario'
);

$data["input_password"] = array(
    'name'          => 'password',
    'class'         => 'input-small',
    'placeholder'   => 'Password'
);

$data["input_submit"] = array(
    'value' => 'Sign in',
    'class'  => 'btn btn-primary'
  );
?>

<div class="modal hide fade in" id="loginForm" aria-hidden="false">
    <div class="modal-header">
        <i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
        <h4>Login Form | token: <?= $token?></h4>
        <spa class="error"><?=form_error('username')?></spa>
        <spa class="error"><?=form_error('password')?></spa>

    </div>
    <!--Modal Body-->
    <div class="modal-body">

        <?php echo form_open('login/new_user',$data['form']) ?>
            <?= form_input($data['input_username']) ?>
            <?= form_password($data['input_password']) ?>
            <?= form_hidden('token',$token)?>
            <label class="checkbox">
                <?php echo form_checkbox() ?> Remember me
            </label>
            <?php echo form_submit($data['input_submit']); ?>
        <?=form_close()?>
        <?php
        if($this->session->flashdata('usuario_incorrecto'))
        {
            ?>
        <spa class="error"><?=$this->session->flashdata('usuario_incorrecto')?></spa>
        <?php
        }
        ?>
        <br/>
        <a href="#">Forgot your password?</a>
    </div>
    <!--/Modal Body-->
</div>
<!--  /Login form -->