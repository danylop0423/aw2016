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
                        <input type="text" name="user[telefono]" id="phone" class="validate">
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
                        <input type="text" name="user[codigo_postal]" id="zip" class="validate" required>
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
                        <input type="text" name="user[tarjeta]" id="card" class="validate" required>
                    </div>

                    <div class="input-field col s6 l3">
                        <label for="cvv">CVV *</label>
                        <input type="text" name="user[cvv]" id="cvv" class="validate" required>
                    </div>

                    <div class="input-field col s6 l3">
                        <label for="expiration">Caducidad *</label>
                        <input type="text" name="user[caduca]" id="expiration" required>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="collapsible-header active"><i class="fa fa-check-circle-o"></i>Finalizar registro</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="input-field col s12 l6">
                        <label for="">Contraseña</label>
                        <input type="password" name="user[password]" id="pass" class="validate" required>
                    </div>

                    <div class="input-field col s12 l6">
                        <label for="">Confirmar contraseña</label>
                        <input type="password" name="user[password-r]" id="pass-r" class="validate" required>
                    </div>

                    <div class="input-field center-align col s12">
                        <input type="checkbox" id="accept" name="accept" checked required>
                        <label for="accept">He leido y estoy de acuerdo con los <a href="politicas_privacidad.html">términos y las condiciones</a> de ReverseBid</label>
                    </div>

                    <div class="buttons-wrapper center-align col s12">
                        <button class="btn waves-effect waves-light" type="submit">Registrate</button>
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
