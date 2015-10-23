<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<title>Ejemplo 1</title>
	
	
	<!-- Add jQuery library 
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	-->
	<script src="<?= base_url();?>assets/js/vendor/jquery-1.9.1.min.js"></script>
	
	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="<?= base_url();?>assets/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
	
	<!-- Add fancyBox -->
	<link rel="stylesheet" href="<?= base_url();?>assets/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<script type="text/javascript" src="<?= base_url();?>assets/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
	
	<!-- Optionally add helpers - button, thumbnail and/or media -->
	<link rel="stylesheet" href="<?= base_url();?>assets/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
	<script type="text/javascript" src="<?= base_url();?>assets/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
	<script type="text/javascript" src="<?= base_url();?>assets/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
	
	<link rel="stylesheet" href="<?= base_url();?>assets/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
	<script type="text/javascript" src="<?= base_url();?>assets/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
	
	
	<style>
	
		h2{
			clear:both;
		}
	
		.single-image img{
			width:256px;
			height:auto;
		}
		
		.gallery-image img{
			width:256px;
			height:auto;
			float:left;
			margin-right:10px;
		}
		
		.fancyOther2{
			cursor:pointer;
		}
		
	
	</style>
	
	<script>
	
		$(function(){
		
			$(".single-image").fancybox({
				openEffect : 'elastic',   //'fade', 'elastic'
		    	closeEffect	: 'elastic',
		    	openSpeed:'normal', //ms, slow, normal, fast (default 250ms)
		    	closeSpeed:'normal',
		    	helpers : {
		    		title : {
		    			type : 'inside' //'float', 'inside', 'outside' or 'over'
		    		},
		    		overlay : {
		    			closeClick : true  // if true, se cierra al hacer click fuera de la imagen
       			    }
		    	},
		    	padding:11
		    	
			});
			
			$(".gallery-image").fancybox({
				openEffect : 'fade', 
		    	closeEffect	: 'fade',
		    	closeBtn: false,
		    	helpers : {
		    		title : {
		    			type : 'over' //'float', 'inside', 'outside' or 'over'
		    		},
		    		thumbs : {
			            width: 50
			        },
			        buttons	: {},
			        overlay : {
			            css : {
			                'background' : 'rgba(0,0,0,0.5)'
			            }
        			}
					
		    	}
		    			    	
			});
			
			
			$(".fancyOther").fancybox({
				width		: '70%',
				height		: '70%',
				maxWidth	: 800,
				maxHeight	: 600,
				fitToView	: false,
				autoSize	: false,
				closeClick	: false,
				openEffect	: 'none',
				closeEffect	: 'none'
			});
			
			
			$(".fancyOther2").click(function(){
				$.fancybox( '<div><h1>Lorem Lipsum</h1><p>Lorem lipsum</p></div>', {
   					 title : 'Custom Title',
   					 width		: '70%',
					height		: '70%',
					maxWidth	: 800,
					maxHeight	: 600,
					fitToView	: false,
					autoSize	: false,
					closeClick	: false	 
				});
			});
			
			
			$(".fancyMedia").fancybox({	
				helpers : {
					media : {}
				}
			});
			
			$(".fancyMediaMapa").fancybox({	
				helpers : {
					media : {}
				},
				 width		: '100%',
				height		: '100%'
				
			});

			
			
		});
		
	</script>

</head>

<body>
	<h3> prueba</h3>
	<?php 
$ruta = "http://localhost:8080/publicidad/imagenes"; // Indicar la ruta
$filehandle = opendir($ruta); // Abrir archivos de la carpeta
while ($file = readdir($filehandle)) {
if ($file != "." && $file != "..") {
//$tamanyo = GetImageSize($ruta . $file);
//echo "<p>   <img  src='$ruta$file' $tamanyo[3]><br></p>\n";
	echo '<a class="gallery-image" rel="gallery" href="'.$ruta."/".$file.'" title="titulo imagen"> <img src="'.$ruta."/".$file.'"> </a>'."\n";
// echo '<a class="gallery-image" rel="gallery"  title="titulo imagen"> <img src="'.$ruta."/".$file.'"> </a>'."\n";
} 
} 
closedir($filehandle); // Fin lectura archivos
?>
	
	
	<h2>Imagen Individual</h2>
	
	------------------------
	<a class="single-image" href="imgs/1.jpg" title="Ubuntu Computer"><img src="imgs/1.jpg" alt=""/></a>
	
	<h2>Galeria</h2>
	
	<?php
    $directory="http://localhost:8080/publicidad/imagenes";
    $dirint = dir($directory);
    while (($archivo = $dirint->read()) !== false)
    {
        if (eregi("gif", $archivo) || eregi("jpg", $archivo) || eregi("png", $archivo)){
            echo '<a class="gallery-image" rel="gallery" href="'.$directory."/".$archivo.'" title="titulo imagen"> <img src="'.$directory."/".$archivo.'"> </a>'."\n";
        }
    }
    $dirint->close();
?>*/
	----------------------
		
	<a class="gallery-image" rel="gallery" href="imgs/2.jpg" title="titulo imagen"><img src="imgs/2.jpg" alt=""/></a>
	<a class="gallery-image" rel="gallery" href="imgs/3.jpg" title="titulo imagen"><img src="imgs/3.jpg" alt=""/></a>
	<a class="gallery-image" rel="gallery" href="imgs/4.jpg" title="titulo imagen"><img src="imgs/4.jpg" alt=""/></a>
	<a class="gallery-image" rel="gallery" href="imgs/5.jpg" title="titulo imagen"><img src="imgs/5.jpg" alt=""/></a>
	
	<h2>Iframe</h2>
	<a class="fancyOther" data-fancybox-type="iframe" href="iframe.html">Abrir Iframe</a>
	
	<h2>Inline</h2>
	<div id="inline" style="display:none;width:500px;">
			<h2>Lorem ipsum dolor sit amet</h2>

			<p>
				<a href="javascript:$.fancybox.close();">Close</a>
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit.
			</p>
	</div>
	<a class="fancyOther" href="#inline">Abrir Inline</a><br/>
	<a class="fancyOther2">Abrir Inline2</a><br/>
	
	<a class="fancyOther" href="/data/non_existing_image.jpg">Non-existing url</a><br/>
	
	<h2>InlineMedia</h2>
	
	<a class="fancyMedia" data-fancybox-type="iframe" href="https://www.youtube.com/embed/hXI8RQYC36Q?list=TLvlzIx7MNqG4">Abrir Vídeo Youtube</a><br/>
	
	<a class="fancyMediaMapa" data-fancybox-type="iframe" href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12212.92000267421!2d-2.1371673179077013!3d40.070281430064014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd5d6741369751c3%3A0x6e81ab6ed08cd292!2sCuenca!5e0!3m2!1ses!2ses!4v1430095038086">Abrir Mapa</a><br/>
		
	</body>	
</html>