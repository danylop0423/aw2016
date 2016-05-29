<form action="/editProfile" method="POST" enctype="multipart/form-data">
    <ul class="collapsible" data-collapsible="exapandible">
        <li>
            <div class="collapsible-header active hoverable"><i class="fa fa-picture-o"></i>Editar Foto</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="file-field input-field">
						<div class="btn">
							<span>Browse...</span>
							<input type="file" value="" name="pic" >
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text" name="user[foto]">
						</div>
					</div>
				</div>
                    
        </li>
		<li>
            <div class="collapsible-header hoverable"><i class="fa fa-user"></i>Editar Datos personales</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="input-field col s12 l6">
                        <label for="name">
						  <i class="fa fa-pencil right"></i>Cambia tu Nombre 
						</label>
                        <input type="text" name="user[nombre]" id="name" class="validate" value=<?php echo $loggedUser['nombre']?> >
                    </div>

                    <div class="input-field col s12 l6">
                        <label for="">
						  <i class="fa fa-pencil right"></i>Cambia tu Apellido 
						</label>
                        <input type="text" name="user[apellido]" id="lastname" class="validate" value=<?php echo $loggedUser['apellido']?> >
                    </div>

                    <div class="input-field col s12 l6">
                        <label for="">
						 <i class="fa fa-pencil right"></i>Cambia tu Correo
						</label>
                        <input type="email" name="user[email]" id="email" class="validate" value=<?php echo $loggedUser['email']?>>
                    </div>

                    <div class="input-field col s12 l6">
                        <label for="">
						 <i class="fa fa-pencil right"></i>Cambia tu Teléfono
						</label>
                        <input type="text" name="user[telefono]" id="phone" class="validate" value=<?php echo $loggedUser['telefono']?>>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="collapsible-header hoverable"><i class="fa fa-home"></i> Editar Domicilio</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="input-field col s12">
                        <label for="street">
						 <i class="fa fa-pencil right"></i>Cambia tu Calle
						</label>
                        <input type="text" name="user[calle]" id="street" class="validate" value=<?php echo $loggedUser['calle']?>>
                    </div>

                    <div class="input-field col s12 l9">
                        <label for="village">
						  <i class="fa fa-pencil right"></i>Cambia tu Población 
						</label>
                        <input type="text" name="user[poblacion]" id="village" class="validate" value=<?php echo $loggedUser['poblacion']?>>
                    </div>

                    <div class="input-field col s12 l3">
                        <label for="zip">
						 <i class="fa fa-pencil right"></i>Cambia tu CP 
						</label>
                        <input type="text" name="user[codigo_postal]" id="zip" class="validate" value=<?php echo $loggedUser['codigo_postal']?>>
                    </div>

                    <div class="input-field col s12">
                        <label for="city">
						 <i class="fa fa-pencil right"></i>Cambia tu Ciudad 
						</label>
                        <input type="text" name="user[ciudad]" id="city" class="validate" value=<?php echo $loggedUser['ciudad']?>>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="collapsible-header hoverable"><i class="fa fa-credit-card"></i>Editar Datos bancarios</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="input-field col s12 l5">
                        <label for="card">
						 <i class="fa fa-pencil right"></i>Cambia tu N.Tajeta de Crédito
						</label>
                        <input type="password" name="user[tarjeta]" id="card" class="validate" value=<?php echo $loggedUser['tarjeta']?>>
                    </div>

                    <div class="input-field col s6 l3">
                        <label for="cvv">
						 <i class="fa fa-pencil right"></i>Cambia CVV
						</label>
                        <input type="password" name="user[cvv]" id="cvv" class="validate" value=<?php echo $loggedUser['cvv']?>>
                    </div>

                    <div class="input-field col s6 l4">
                        <label for="expiration">
						 <i class="fa fa-pencil right"></i>Cambia Fecha de Caducidad de tu Tarjeta 
						</label>
                        <input type="password" name="user[caduca]" id="expiration" value=<?php echo $loggedUser['caduca']?>>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="collapsible-header active hoverable"><i class="fa fa-check-circle-o"></i>Editar Contraseña</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="input-field col s12 l6">
                        <label for="">
						  <i class="fa fa-pencil right"></i>Cambia tu Contraseña
						</label>
                        <input type="password" name="user[password]" id="pass" class="validate" value=<?php echo $loggedUser['password']?>>
                    </div>

                    <div class="input-field col s12 l6">
                        <label for="">
						<i class="fa fa-pencil right"></i>Confirmar contraseña
						</label>
                        <input type="password" name="user[password-r]" id="pass-r" class="validate" value=<?php echo $loggedUser['password']?>>
                    </div>

                    
                    <div class="buttons-wrapper center-align col s12">
                        <button class="btn waves-effect waves-light" type="submit">Guardar</button>
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
