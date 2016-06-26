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
                        <input type="text" size='20' name="user[nombre]" id="name" class="validate" value=<?php echo $loggedUser['nombre']?> >
                    </div>

                    <div class="input-field col s12 l6">
                        <label for="">
						  <i class="fa fa-pencil right"></i>Cambia tu Apellido
						</label>
                        <input type="text" size='20' name="user[apellido]" id="lastname" class="validate" value=<?php echo $loggedUser['apellido']?> >
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
                        <input type="tel" name="user[telefono]" id="phone" class="validate" pattern="[0-9]{9}" value=<?php echo $loggedUser['telefono']?>>
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
                        <input type="text" size='25' name="user[calle]" id="street" class="validate" value=<?php echo $loggedUser['calle']?>>
                    </div>

                    <div class="input-field col s12 l9">
                        <label for="village">
						  <i class="fa fa-pencil right"></i>Cambia tu Población
						</label>
                        <input type="text" size='25' name="user[poblacion]" id="village" class="validate" value=<?php echo $loggedUser['poblacion']?>>
                    </div>

                    <div class="input-field col s12 l3">
                        <label for="zip">
						 <i class="fa fa-pencil right"></i>Cambia tu CP
						</label>
                        <input type="text" pattern="[0-9]{5}" placeholder="28000" name="user[codigo_postal]" id="zip" class="validate" value=<?php echo $loggedUser['codigo_postal']?>>
                    </div>

                    <div class="input-field col s12">
                        <label for="city">
						 <i class="fa fa-pencil right"></i>Cambia tu Ciudad
						</label>
                        <input type="text" size='25' name="user[ciudad]" id="city" class="validate" value=<?php echo $loggedUser['ciudad']?>>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="collapsible-header hoverable"><i class="fa fa-credit-card"></i>Editar Datos bancarios</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="input-field col s12 l9">
                        <label for="card">
						 <i class="fa fa-pencil right"></i>Cambia tu N.Tajeta de Crédito
						</label>
                        <input type="text" placeholder="5555666677778888" pattern="[0-9]{16}" name="user[tarjeta]" id="card" class="validate" value=<?php echo $loggedUser['tarjeta']?>>
                    </div>

                    <div class="input-field col s6 l3">
                        <label for="cvv">
						 <i class="fa fa-pencil right"></i>Cambia CVV
						</label>
                        <input type="text" placeholder="123" pattern="[0-9]{3}" name="user[cvv]" id="cvv" class="validate" value=<?php echo $loggedUser['cvv']?>>
                    </div>

                    <div id='exp' class="input-field col s6 l12">
						<label for="expiration">
						 <i class="fa fa-pencil right"></i>Cambia Fecha de Caducidad de tu Tarjeta
						</label><br/><br/>
                        <input type="text"  placeholder="01/2016" pattern="[0-9-/]{7}" name="user[caduca]" id="expiration" value=<?php echo $loggedUser['caduca']?>>
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
                        <input type="password" name="user[password]" id="pass" class="validate" value="">
                    </div>

                    <div class="input-field col s12 l6">
                        <label for="">
						<i class="fa fa-pencil right"></i>Confirmar contraseña
						</label>
                        <input type="password" name="user[password-r]" id="pass-r" class="validate" value="">
                    </div>


                    <div class="buttons-wrapper center-align col s12">
                        <button class="btn waves-effect waves-light" type="submit" enctype="multipart/form-data">Guardar</button>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</form>
