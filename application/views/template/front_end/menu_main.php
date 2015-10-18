<!--Header-->
<header class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a id="logo" class="pull-left" href="<?=base_url()?>login/index/index"></a>
            <div class="nav-collapse collapse pull-right">
                <ul class="nav">
                    <li <?php if (strcmp($dia, 'index')     == 0) {?>class="active" <?php }?> ><a href="<?=base_url()?>login/index/index">Inicio</a></li>
                    <li <?php if (strcmp($dia, 'lunes')     == 0) {?>class="active" <?php }?>><a href="<?=base_url()?>login/index/lunes">Lunes </a></li>
                    <li <?php if (strcmp($dia, 'martes')    == 0) {?>class="active" <?php }?>><a href="<?=base_url()?>login/index/martes">Martes</a></li>
                    <li <?php if (strcmp($dia, 'miercoles') == 0) {?>class="active" <?php }?>><a href="<?=base_url()?>login/index/miercoles">Miercoles</a></li>
                    <li <?php if (strcmp($dia, 'jueves')    == 0) {?>class="active" <?php }?>><a href="<?=base_url()?>login/index/jueves">Jueves</a></li>
                    <li <?php if (strcmp($dia, 'viernes')   == 0) {?>class="active" <?php }?>><a href="<?=base_url()?>login/index/viernes">Viernes</a></li>
                    <li <?php if (strcmp($dia, 'sabado')    == 0) {?>class="active" <?php }?>><a href="<?=base_url()?>login/index/sabado">Sabado</a></li>
                    <li <?php if (strcmp($dia, 'domingo')   == 0) {?>class="active" <?php }?>><a href="<?=base_url()?>login/index/domingo">Domingo</a></li>
                    <li class="login">
                        <a data-toggle="modal" href="#loginForm"><i class="icon-lock"></i></a>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
</div>
</div>
</header>
<!-- /header -->