<form action="/editProfile" method="POST" enctype="multipart/form-data">
    <ul class="collapsible" data-collapsible="exapandible">
        <li>
            <div class="collapsible-header active hoverable"><i class="fa fa-picture-o"></i>Editar Foto</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="file-field input-field">
						<div class="btn">
							<span>Browse...</span>
							<input type="file">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text">
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
						  <i class="tiny material-icons right">edit</i>Cambia tu Nombre - <?php echo $loggedUser['nombre']?>
						</label>
                        <input type="text" name="user[nombre]" id="name" class="validate" >
                    </div>

                    <div class="input-field col s12 l6">
                        <label for="">
						  <i class="tiny material-icons right">edit</i>Cambia tu Apellido - <?php echo $loggedUser['apellido']?>
						</label>
                        <input type="text" name="user[apellido]" id="lastname" class="validate" >
                    </div>

                    <div class="input-field col s12 l6">
                        <label for="">
						 <i class="tiny material-icons right">edit</i>Cambia tu Correo - <?php echo $loggedUser['email']?>
						</label>
                        <input type="email" name="user[email]" id="email" class="validate">
                    </div>

                    <div class="input-field col s12 l6">
                        <label for="">
						 <i class="tiny material-icons right">edit</i>Cambia tu Teléfono - <?php echo $loggedUser['telefono']?>
						</label>
                        <input type="text" name="user[telefono]" id="phone" class="validate">
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
						 <i class="tiny material-icons right">edit</i>Cambia tu Calle - <?php echo $loggedUser['calle']?>
						</label>
                        <input type="text" name="user[calle]" id="street" class="validate">
                    </div>

                    <div class="input-field col s12 l9">
                        <label for="village">
						  <i class="tiny material-icons right">edit</i>Cambia tu Población - <?php echo $loggedUser['poblacion']?>
						</label>
                        <input type="text" name="user[poblacion]" id="village" class="validate">
                    </div>

                    <div class="input-field col s12 l3">
                        <label for="zip">
						 <i class="tiny material-icons right">edit</i>Cambia tu CP - <?php echo $loggedUser['codigo_postal']?>
						</label>
                        <input type="text" name="user[codigo_postal]" id="zip" class="validate">
                    </div>

                    <div class="input-field col s12">
                        <label for="city">
						 <i class="tiny material-icons right">edit</i>Cambia tu Ciudad - <?php echo $loggedUser['ciudad']?>
						</label>
                        <input type="text" name="user[ciudad]" id="city" class="validate">
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
						 <i class="tiny material-icons right">edit</i>Cambia tu N.Tajeta de Crédito - <?php echo "****************"?>
						</label>
                        <input type="text" name="user[tarjeta]" id="card" class="validate">
                    </div>

                    <div class="input-field col s6 l3">
                        <label for="cvv">
						 <i class="tiny material-icons right">edit</i>Cambia CVV -<?php echo"***"?>
						</label>
                        <input type="text" name="user[cvv]" id="cvv" class="validate" >
                    </div>

                    <div class="input-field col s6 l4">
                        <label for="expiration">
						 <i class="tiny material-icons right">edit</i>Cambia Fecha de Caducidad - <?php echo "**/**"?>
						</label>
                        <input type="text" name="user[caduca]" id="expiration" >
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
						  <i class="tiny material-icons right">edit</i>Cambia tu Contraseña
						</label>
                        <input type="password" name="user[password]" id="pass" class="validate">
                    </div>

                    <div class="input-field col s12 l6">
                        <label for="">
						<i class="tiny material-icons right">edit</i>Confirmar contraseña
						</label>
                        <input type="password" name="user[password-r]" id="pass-r" class="validate">
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
