<form action="/nuevo-usuario" method="POST">
    <ul class="collapsible" data-collapsible="exapandible">
        <li>
            <div class="collapsible-header active"><i class="fa fa-user"></i>Datos de personales</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="input-field col s12 l4">
                        <label for="name">Nombre *</label>
                        <input type="text" name="user[nombre]" id="name" class="validate" required>
                    </div>

                    <div class="input-field col s12 l8">
                        <label for="">Apellido *</label>
                        <input type="text" name="user[apellido]" id="lastname" class="validate" required>
                    </div>

                    <div class="input-field col s12 l9">
                        <label for="">Email *</label>
                        <input type="email" name="user[email]" id="email" class="validate" required>
                    </div>

                    <div class="input-field col s12 l3">
                        <label for="">Teléfono</label>
                        <input type="tel" placeholder="612345678"  name="user[telefono]" id="phone" pattern="[0-9]{9}" class="validate">
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="collapsible-header active"><i class="fa fa-home"></i>Datos domicilio</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="input-field col s12">
                        <label for="street">Calle *</label>
                        <input type="text" name="user[calle]" id="street" class="validate" required>
                    </div>

                    <div class="input-field col s12 l9">
                        <label for="village">Población *</label>
                        <input type="text" name="user[poblacion]" id="village" class="validate" required>
                    </div>

                    <div class="input-field col s12 l3">
                        <label for="zip">Código postal *</label>
                        <input type="text" placeholder="28000" name="user[codigo_postal]" id="zip" pattern="[0-9]{5}" class="validate" required>
                    </div>

                    <div class="input-field col s12">
                        <label for="city">Ciudad *</label>
                        <input type="text" name="user[ciudad]" id="city" class="validate" required>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="collapsible-header active"><i class="fa fa-credit-card"></i>Datos bancarios</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="input-field col s12 l6">
                        <label for="card">Número de la tarjeta *</label>
                        <input type="text" placeholder="5555666677778888" pattern="[0-9]{16}" name="user[tarjeta]" id="card" class="validate" required>
                    </div>

                    <div class="input-field col s6 l3">
                        <label for="cvv">CVV *</label>
                        <input type="text" placeholder="123" pattern="[0-9]{3}" name="user[cvv]" id="cvv" class="validate" required>
                    </div>

                    <div class="input-field col s6 l3">
                        <label for="expiration">Caducidad *</label>
                        <input type="text" placeholder="01/2016" pattern="[0-9-/]{7}" name="user[caduca]" id="expiration" class="validate" required>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="collapsible-header active"><i class="fa fa-check-circle-o"></i>Finalizar registro</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="input-field col s12 l6">
                        <label for="">Contraseña *</label>
                        <input type="password" name="user[password]" id="pass" class="validate" required>
                    </div>

                    <div class="input-field col s12 l6">
                        <label for="">Confirmar contraseña *</label>
                        <input type="password" name="user[password-r]" id="pass-r" class="validate" required>
                    </div>

                    <div class="input-field center-align col s12">
                        <input type="checkbox" id="accept" name="accept" checked required>
                        <label for="accept">He leido y estoy de acuerdo con los <a href="politicas_privacidad.html">términos y las condiciones</a> de ReverseBid</label>
                    </div>

                    <div class="buttons-wrapper center-align col s12">
                        <button class="btn waves-effect waves-light"  type="submit">Registrate</button>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</form>
