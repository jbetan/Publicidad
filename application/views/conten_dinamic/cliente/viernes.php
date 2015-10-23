<h1>viernes</h1>

<script >

alert("Viernes");

  function getPromocionByDay(){
 	 	alert("Funcion");
	    $.ajax({
	    	 data: {'id':1},
	        url: "ViernesPromo",
	        type: "GET",
	        dataType: "json",
	        error: function(){
	            console.log("Error");
	        },
	        success:function(data){
	    	console.log("Exito");   
	        }
	    })

	}
 /*
Recores datos con jquery
========================
http://www.forosdelweb.com/f18/json-jquery-php-recorrer-datos-devueltos-969036/
http://pandamonios.com/blog/array-dinamico-en-jquery-php/
http://www.linux-party.com/index.php/54-programacion/9175-intercambio-de-variables-y-array-entre-javascript-php-y-viceversa
http://www.gestiweb.com/?q=content/c%C3%B3mo-pasar-variables-de-javascript-php-y-viceversa

AJAX .load
http://api.jquery.com/load/#urldatacallback
 */

</script>

