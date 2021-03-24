<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Conejos Panama - Reserva</title>

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
    	<li><a href="index.php">Inicio</a></li>
        <li><a href="#">¿Quienes Somos?</a></li>
        <li><a href="#">Contactanos</a></li>
  	</ul>
  	<!-- Tarejetas -->

		<?php
			require_once("class/conejos.php");
			$obj_conejo = new conejo();
			
			if(array_key_exists('reservar', $_POST)) {
				$obj_conejo->agregar_reserva($_POST['nombre'], $_POST['direccion'], $_POST['celular'], "espera", $_POST["id"]);
				?>
					<br><br>
					<h3 class="center">Su reserva se realizo con éxito!</h3>
					<div class="row">
					    <div class="col s1 m2 l3"></div>
					    <div class="col s10 m8 l6 container grey lighten-2 z-depth-4">
					        <h5>- Para Completar su reserva debe realizar el abono de la mitad del valor del conejito.</h5>
					        <h5>- Mantendremos la reserva de su conejito por 48 horas en espera de abono una vez pasado este tiempo y no se haya recibido dicho abono el conejito volvera a estar disponible.</h5>
					        <h5 >- Puede realizar su abono a nuestra cuenta de Yappy; para ello debes buscarnos en el directorio de Yappy como: <spam style="font-weight: bold;">Conejos Panamá</spam> o a nuestra cuenta de ahorro del Banco General <spam style="font-weight: bold;">N°047298566390</spam> a nombre de <spam style="font-weight: bold;">Francisco Arias.</spam></h5>
					        <h5>- Una vez realizado el abono debe enviarnos el comprobante a nuestro whatsapp <spam style="font-weight: bold;">6312-1166</spam>.</h5>
					        <h5>- Luego de recibir el comprobante se le estara brindando detalles de como sería la entrega y pago final.</h5>
					        <br>
					    </div>
					    <div class="col s1 m2 l3"></div>
					    
					</div>
					<!-- Mail -->

				<?php
				$to = "conejospanama@gmail.com";
				$subject = "Conejo Reservado";
				$mensaje = $_POST['nombre']. " ha reservado un conejo.";
				$header = "From: reservas@conejospanama.com" . "\r\n";
				mail($to, $subject, $mensaje, $header);
			}
			else{
				$id = $_GET['id'];
		?>
			<br><br>

				<div class="row container">
					<h3 class="center">Registro de reserva</h3>
					<div class="col m2 l3 s1"></div>
					<div class="col m8 l6 s10 z-depth-4 brown lighten-4">
						<form action="reserva.php" method="post" class="" enctype="multipart/form-data" id="usrform">
							
							<div class="row ">
								<input style="visibility: hidden" type="text" name="id" value=<?php print($id) ?> required>
								<div class="input-field col s12">

									<label class="black-text" for="nombre">Nombre</label>
									<input type="text" class="validate" name="nombre" required>
								</div>
							</div>
							<div class="row ">
								<div class="input-field col s12">
									<label class="black-text" for="nombre">Dirección</label>
									<input type="text" class="validate" name="direccion" required>
								</div>
							</div>
							<div class="row ">
								<div class="input-field col s12">
									<label class="black-text" for="nombre">Celular</label>
									<input type="number" class="validate" name="celular" required>
								</div>
							</div>
							<div class="row ">
								<div class="input-field col s12 m12 l12 center">
									<button type="submit" class="waves-effect waves-light btn" name="reservar" value="Reservar">Reservar</button>

								</div>
							</div>
							
						</form>
					</div>
					<div class="col m2 l3 s1"></div>
				</div>
		<?php 
		} 
		?>


		<div class="fixed-action-btn">
  			<a class="btn-floating btn-large red">
    			<i class="large material-icons">link</i>
  			</a>
  			<ul>
    			<li><a class="btn-floating pink accent-3" href="https://www.instagram.com/conejospanama/"><img src="Imagenes/instaicons.svg" class="responsive-img">Instagram</a></li>
    			<li><a class="btn-floating blue" href="https://www.facebook.com/conejospanama"><i class="material-icons large">facebook</i></a></li>
  			</ul>
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
    				hoverEnabled: false});
  			});
		</script>	
	
</body>
</html>