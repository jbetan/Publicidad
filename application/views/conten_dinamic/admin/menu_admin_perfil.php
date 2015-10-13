<div class="span2 offset1"  >
    <div class="widget ads">
        <div class="row-fluid">
            <div class="span12">
                <br/>
                <ul id="menu">
                    <li <?php if (strcmp($opc, 'perfil')     == 0) {?>class="color" <?php }?> ><a href="<?=base_url()?>perfil">Ver Perfil</a></li><br>
                    <li <?php if (strcmp($opc, 'editar')     == 0) {?>class="color" <?php }?> ><a href="<?=base_url()?>perfil/form_edit_profile">Editar</a></li><br>
                    <li <?php if (strcmp($opc, 'cambiar_img')     == 0) {?>class="color" <?php }?> ><a href="<?=base_url()?>perfil/form_change_logo">Cambiar Logo</a></li><br>
                </ul>
            </div>
        </div>
    </div>
</div>
