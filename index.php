<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Conejos Panama - Buscador</title>

	<!-- Compiled and minified CSS -->
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="icon" type="image/png" href="Imagenes/ConejosPanamaIcon.png">
</head>
<body class="orange lighten-4">
	<!-- navBar -->
	<nav class="cyan darken-1 nav-extended" >
    	<div class="nav-wrapper container">
      		<a href="index.php" class="brand-logo hide-on-small-only left">
      			<i><img src="Imagenes/ConejosPanamaIcon.png" class="responsive-img" width="45px" ></i>Conejos Panamá</a>
      		 <a href="index.php" class="brand-logo show-on-small hide-on-med-and-up left" style="font-size: 1.4em;">
      			<i><img src="Imagenes/ConejosPanamaIcon.png" class="responsive-img" width="40px" ></i>Conejos Panamá
      		</a>
      		 <a href="#" data-target="mobile-demo" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
      		<ul class="right hide-on-med-and-down">
        		<li><a href="index.php">Inicio</a></li>
        		<li><a href="#">¿Quiénes Somos?</a></li>
        		<li><a href="#">Contáctanos</a></li>
      		</ul>
    	</div>
  	</nav>
  	<ul class="sidenav cyan darken-1 " id="mobile-demo">
    	<li><a href="#hola">Inicio</a></li>
        <li><a href="#">¿Quienes Somos?</a></li>
        <li><a href="#">Contactanos</a></li>
  	</ul>
  	<!-- Tarejetas -->

	<div class="container">
		<h2 class="center">Conejos Disponibles</h2>
			<div class="row">
    		    <form action="index.php" method="POST">
    			    <div class="input-field col s9 m5">
	    			    <select name="filtro" value="<?php  ?>"?>>
	    				    <option value="0" >Todos</option>
	    				    <option id="Nacional" value="Nacional" >Nacional</option>
	    	    			<option value="Cabeza de Leon"  id="Cabeza de Leon">Cabeza de Leon</option>
	        				<option id="Enano" value="Enano">Enanos</option>
	        				<option id="Mini" value="Mini">Minis</option>
	        				<option value="Belier" id="Belier">Belier</option>
	        				<option value="Angora" id="Belier">Angora</option>
	        			</select>
	        			<label>Filtro:</label>
    	    		</div>
    		    	<div class="col s3 m1">
    		    		<button type="submit" class="waves-effect waves-light btn" name="filtrar" style="margin-top: 20px">Buscar</button>
        			</div>
        			<div class="col m6"></div>
    	    	</form>
    		</div>
    	<div class="row">
		<?php
			$nfilas = 0;
			require_once("class/conejos.php");
			$obj_conejos = new conejo();
			if(array_key_exists('filtrar', $_POST)) {
				if($_POST['filtro'] != "0"){

					$conejos = $obj_conejos->consultar_conejos_filtro($_POST['filtro']);
					print("<script>document.getElementById('".$_POST['filtro']."').selected = true;</script>");
				}
				else{
					$conejos = $obj_conejos->consultar_conejos();	
				}
			}
			else{
				$conejos = $obj_conejos->consultar_conejos();	
			}
			if(is_array($conejos)){
				$nfilas = count($conejos);
			}
			else{
			    $nfilas = 0;
			}
			
			if($nfilas > 0){
				foreach ($conejos as $res) {
					print("<div class='col s12 m6 l4'>");
						print("<div class='card hoverable'>");
							print("<div class='card-title center-align'>");
								print("<span class='card-title' style='font-weight: bold;'>".$res['Codigo']."</span>");
							print("</div>");
							print("<div class='card-image'>");
								print("<img class='materialboxed' src='Imagenes/Conejos/".$res['Imagen']."'>");
							print("</div>");
							print("<div class='card-content'>");
								print("<span class='card-title' style='font-weight: bold;'>Raza: ".$res['raza']."</span>");
								print("<span class='card-title'>Precio: ".$res['precio']."<br></span>");
								print("<p>Sexo: ".$res['sexo']."<br>Fecha Nac.: ".$res['edad']."</p>");
								
							print("</div>");
							print("<div class='card-action center'>");
							    
								print("<a href='reserva.php?id=".$res['id']."' class='red btn waves-effect waves-light'>Reservar</a>");
							print("</div>");
						print("</div>");
					print("</div>");
				}
			}
			else{
					?>
					<h2 class="center">No hay Conejos Diponibles</h2>
			<?php } ?>
			

			<div class="fixed-action-btn">
  				<a class="btn-floating btn-large red">
    				<i class="large material-icons">link</i>
  				</a>
  				<ul>
  				    <li><a class="btn-floating green accent-3" href="https://wa.me/message/XLWXL6K4DGFXF1" target="_blank"><img src="Imagenes/whatsicon.png" class="responsive-img">Whatsapp</a></li>
    				<li><a class="btn-floating pink accent-3" href="https://www.instagram.com/conejospanama/" target="_blank"><img src="Imagenes/instaicons.svg" class="responsive-img">Instagram</a></li>
    				<li><a class="btn-floating blue" href="https://www.facebook.com/conejospanama" target="_blank"><i class="material-icons">facebook</i></a></li>
  				</ul>
			</div>
	
		</div>
    </div>
		<script>
			document.addEventListener('DOMContentLoaded', function() {
    			var elems = document.querySelectorAll('.sidenav');
    			var instances = M.Sidenav.init(elems);
			});
    		document.addEventListener('DOMContentLoaded', function() {
    			var elems = document.querySelectorAll('.materialboxed');
    			var instances = M.Materialbox.init(elems);
  			});
    		document.addEventListener('DOMContentLoaded', function() {
   				var elems = document.querySelectorAll('select');
    			var instances = M.FormSelect.init(elems);
  			});
  			document.addEventListener('DOMContentLoaded', function() {
    			var elems = document.querySelectorAll('.fixed-action-btn');
    			var instances = M.FloatingActionButton.init(elems, {
    				hoverEnabled: false
    			});
  			});
		</script>	
	
</body>
</html>