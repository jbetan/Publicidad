        <section id="portfolio" class="container main">
            <div class="container">
                <div class="center">
                    <div class="progress progress-warning">
                        <div class="bar" style="width: 100%; text-align:center; font-size: 20px;"><?=@$nota?></div>
                    </div>
                    <h3>Nuestras Imagenes</h3>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto asperiores at blanditiis commodi consectetur cupiditate dicta, dignissimos ducimus esse hic id illum iste laboriosam molestiae repellendus sed ullam ut voluptatum.</p>
                </div>
                <div class="gap"></div>
                <ul class="gallery col-4">
                    <!--Aqui empieza el  Foreach-->

                    <?php
                       $cont=0;
                       foreach($img as $im ) {
                           $cont++;
                       ?>

                    <li>
                        <div id="border_imagen" class="preview">
                            <img alt=" "   src="<?= base_url();?>uploads/<?=$im->ruta?>" style="width: 270px; height: 162px;">
                            <div class="overlay">
                            </div>
                            <div class="links">
                                <!--Este es el ojo para previsualizar-->
                                <a data-toggle="modal" href="#modal-<?=$im->id?>">
                                    <i class="icon-eye-open"></i>
                                </a>

                                <!--Este es el link para editar la imagen-->
                                <a id="editar" onclick="getInfo(<?=$im->id?>)" data-toggle="modal" href="#modal-f-<?=$im->id?>">
                                    <i class="icon-pencil"></i>
                                </a>
                            </div>
                        </div>

                        <div class="desc" style="text-align: center">

                                <h5 style="color: #000000"><?=$im->titulo?></h5>
                                <a href="#" onclick="borrar(<?=$im->id?>)" id="borrar">
                                    <i style="font-size: 40px" class="icon-trash"></i>
                                </a>

                        </div>


                        <div id="modal-<?=$im->id;?>" class="modal hide fade">
                            <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true">
                                <i class="icon-remove"></i>
                            </a>
                            <div  class="modal-body" >
                                <img src="<?= base_url();?>uploads/<?=$im->ruta?>" alt=" " width="100%" style="max-height:400px">
                            </div>
                        </div>


                        <div id="modal-f-<?=$im->id?>" class="modal hide fade"  style="width: 500px;">
                            <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true">
                                <i class="icon-remove"></i>
                            </a>
                                    <!--Formulario-->
                                    <?php
                                        $estilo = "width:300px;";
                                        $form = array(
                                            'class' => 'contact-form',
                                            'id'    => 'formulario_act'
                                        );
                                        $input_titulo = array(
                                            'name'        => 'titulo',
                                            'id'          => 'titulo',
                                            'class'       => 'input-block-level',
                                            'placeholder' => 'Titulo de la promocion',
                                            'style'       => $estilo

                                        );
                                        $input_descripcion = array(
                                            'name'        => 'descripcion',
                                            'id'          => 'descripcion',
                                            'class'       => 'input-block-level',
                                            'placeholder' => 'Descripcion de la promocion',
                                            'style'       => $estilo
                                        );
                                        $input_restriccion = array(
                                            'name'        => 'restriccion',
                                            'id'          => 'restriccion',
                                            'class'       => 'input-block-level',
                                            'placeholder' => 'Restriccion de la promocion',
                                            'style'       => $estilo
                                        );
                                        $input_ubicacion = array(
                                            'name'        => 'ubicacion',
                                            'id'          => 'ubi',
                                            'class'       => 'input-block-level',
                                            'placeholder' => 'Ubicacion de la promocion',
                                            'style'       => $estilo
                                        );
                                        $input_info = array(
                                            'name'        => 'info',
                                            'id'          => 'info',
                                            'class'       => 'input-block-level',
                                            'placeholder' => 'Informacion adicional (no necesario)',
                                            'style'       => $estilo
                                        );
                                        $input_dias = array(
                                            'name' => 'dias',
                                           // 'class' => 'input-block-level',
                                            'placeholder' => 'Dias de promocion',
                                            'id' => 'fechaDP',
                                            'style'      => $estilo
                                        );
                                        $input_submit = array(
                                            'value' => 'Actualizar',
                                            'class' => 'btn btn-primary btn-large pull-right',
                                            'id'    => 'submit',
                                            'name'  => 'update'
                                        );

                                    ?>
                                        <div class="row"  style="height: 537px; padding-top: 25px;" >
                                            <div class="span3 offset1"  >
                                            <h3>Editar  Imagen</h3>
                                            <div class="status alert alert-success" style="display: none"></div>
                                                <?php echo form_open('',$form) ?>
                                                <div class="row-fluid" style="width:100%;">
                                                    <div >
                                                        <?php

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

                                            <?php echo form_hidden('id', $im->id);
                                            echo form_submit($input_submit); ?>
                                            <?= form_close()?>
                                            </div>
                                        </div>
                        </div>
                    </li>
                    <?php }?>
                    <!--Aqui debe terminar el Foreach-->

                </ul>
            </div>
        </section>
    </div>
</section>





