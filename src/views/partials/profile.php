<div id="contenedor" class="profile-page">
		<div id="data">
		  <div class="row card-panel light-grey lighten-5 z-depth-3">
			<div class="col s12 l12 flow-text">
			  <div>
				  <div class="col s12 l6 card-content">
					  <h2 class="red-text text-darken-4 card-title">Datos Personales</h2>
					  <ul class="indigo-text text-darken-4" >
						<li>Name: <span class="blue-text text-darken-6"><?php echo $loggedUser['nombre']?></span></li>
						<li>Apellido: <span class="blue-text text-darken-6"><?php echo $loggedUser['apellido']?></span></li>
						<li>e-m@il: <span class="blue-text text-darken-6"><?php echo $loggedUser['email']?></span></li>
						<li>Teléfono (+34): <span class="blue-text text-darken-6"><?php echo $loggedUser['telefono']?></span></li>
						<div class="section">
						<li>Dirección:</li>
						<li><div class="col s12 l7 card-content"><ul class="indigo-text text-darken-4" >
							<li><h6><i class="fa fa-chevron-right"></i> Calle: <span class="blue-text text-darken-6"><?php echo $loggedUser['calle']?></span></h6></li>
							<li><h6><i class="fa fa-chevron-right"></i> CP: <span class="blue-text text-darken-6"><?php echo $loggedUser['codigo_postal']?></span></h6></li>
							<li><h6><i class="fa fa-chevron-right"></i> Ciudad: <span class="blue-text text-darken-6"><?php echo $loggedUser['ciudad']?></span></h6></li>
							<li><h6><i class="fa fa-chevron-right"></i> Población: <span class="blue-text text-darken-6"><?php echo $loggedUser['poblacion']?></span></h6></li>
						 </ul></div></li>
						 </div>
					  </ul>
				  </div>

				 <div class="col s11 l6 profile card-image right ">
					<img  class="profile_img circle responsive-img" src="<?php echo $loggedUser['foto']?>">
					<a class="col s11 l8 profile btn waves-effect waves-light btn-large" href="/editProfile">
					<i class="fa fa-pencil right"></i>Editar Datos</a>
				  </div>
			 </div>


		     </div>
		  </div>
		</div>
	  </div>

	
 </div>
