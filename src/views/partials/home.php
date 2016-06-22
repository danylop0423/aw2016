<script>
 $(document).ready(function(){
      $('.slider').slider({full_width: true,interval: 2500});
   });
</script>

<div id="contenedor">

		<div id= "principal_img">
   		  <div class="slider">
			<ul class="slides">
			  <li>
				<img class="img-responsive" src="http://www.titaniumkeys.com/tank/photo-laptop-mac-air.png"> <!-- random image -->
				<div class="caption left-align">
				  <h3 class="teal-text text-darken-3">Subasta...</h3>
				  <h5 class="light teal-text text-lighten-1">solo tienes que registrarte.</h5>
				</div>
			  </li>
			  <li>
				<img class="img-responsive" src="http://i1.wp.com/www.eleventel.es/wp-content/uploads/2016/03/Samsung-Gear-S2_apps.jpg?w=580"> <!-- random image -->
				<div class="caption left-align">
				  <h3 class="light grey-text text-lighten-3">Puja...</h3>
				  <h5 class="light grey-text text-lightten-3">participa en las subastas</h5>
				</div>
			  </li>
			  <li>
				<img class="img-responsive" src="http://galerymobiliario.es/4361-home_default/comedor-ados-580.jpg"> <!-- random image -->
				<div class="caption left-align">
				  <br/>
				  <h3 class="light grey-text text-lighten-3">Gana..</h3>
				  <h5 class="light grey-text text-lighten-3">Llevate cosas increibles</h5>
				</div>
			  </li>
			  <li>
				<img class="img-responsive" src="https://lh5.googleusercontent.com/-OGKIk5VBH9E/VJHGxe1iS6I/AAAAAAAAB1c/lzoCG_Fs_O8/w506-h750/PlayStation%2B4-580-90.png"> <!-- random image -->
				<div class="caption right-align">
				  <h3>Participa con Nosotros</h3>
				  <h5 class="light grey-text text-lighten-3">... y llevatelo ya!</h5>
				</div>
			  </li>
			</ul>
		</div>

	</div>

		<div id=" how">
			<ul class="row l12 collapsible hoverable" data-collapsible="accordion">
			 <li>
			  <div class="collapsible-header">
				<h3 class=" teal-text text-darken-2"><i class="fa fa-info-circle"></i> Como Funciona ? </h3></div>
			  <div class="collapsible-body">
				<h5 class="red-text text-darken-4"> Subastar:</h5>
				<div>
				<p class=""><i class="fa fa-angle-right"></i> Registrate </p>
				<p class="teal-text text-lighten-1"><i class="fa fa-angle-right"></i> Date de alta como Subastador </p>
				<p class="teal-text text-lighten-1"><i class="fa fa-angle-right"></i> Sube tus productos, Establece una Puja Minima </p>
				<p class="teal-text text-lighten-1"><i class="fa fa-angle-right"></i> ..y Empieza tu Subasta </p>
			    </div>
			  </div>
			  <div class="light-green lighten-5  collapsible-body">
			    <h5 class="red-text text-darken-4"> Participar en una Subasta: </h5>
				<div>
				<p class="teal-text text-lighten-1"><i class="fa fa-angle-right"></i> Registrate </p>
				<p class="teal-text text-lighten-1"><i class="fa fa-angle-right"></i> Escoge un Producto</p>
				<p class="teal-text text-lighten-1"><i class="fa fa-angle-right"></i> Puedes empezar con la puja Mínima u Otro valor superior</p>
				<p class="teal-text text-lighten-1"><i class="fa fa-angle-right"></i> Resiste hasta que finalice el tiempo de la subasta</p>
				<p class="teal-text text-lighten-1"><i class="fa fa-angle-right"></i> El Ganador va a ser aquel que haga una puja minima __No Repetida__!! </p>
			    </div>
			  </div>
			 </li>
			</ul>
		</div>
</div>
<script>
    $(function() {
        <?php if ($error): ?>
            Materialize.toast('<?php echo $error ?>', 6000);
        <?php endif ?>
    });
</script>
