<form action="/contacto" method="POST">
	 <ul class="collapsible" data-collapsible="exapandible">
		  <li>
				<div class="collapsible-header active"><i class="fa fa-volume-control-phone"></i>Formulario de Contácto</div>
				<div class="collapsible-body">
					 <div class="row">

						  <div class="input-field col s12 ">
								<i class=" fa fa-user prefix" aria-hidden="true"></i>
								<input type="text" value= <?php echo $contacto['nombre']?> name="contact[nombre]" id="name" class="validate" required>
								<label for="name">Nombre *</label>
						  </div>

						  <div class="input-field col s12 ">
								<i class=" fa fa-envelope-o prefix" aria-hidden="true"></i>
								<label for="">Email *</label>
								<input type="email" value= <?php echo $contacto['email']?> name="contact[email]" id="email" class="validate" required>
						  </div>

						  <div class="input-field col s12">
								<i class=" fa fa-pencil prefix" aria-hidden="true"></i>
								<label for="icon_prefix2">Mensaje *</label>
								<input type="text" value= <?php echo $contacto['mensaje']?> name="contact[mensaje]" id="message" class="validate" required>
						  </div>
								  
						  <div class="buttons-wrapper center-align">
								<button class="btn waves-effect waves-light" type="submit" name="action"> <i class="fa fa-paper-plane right" aria-hidden="true"></i>Enviar</button>
					 
								<a  href='/home'>
								<button class="btn waves-effect waves-light" type="reset"><i class="fa fa-eraser right" aria-hidden="true"></i>Borrar</button>
						 </a>
					 
				</div>

					 </div>
				</div>
		  </li>
	 </ul>
</form>
<script>
	 $(function() {
		  <?php if ($error): ?>
				Materialize.toast('<?php echo $error ?>', 6000);
		  <?php endif ?>
	 });
</script>

