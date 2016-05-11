<form action="/nuevo-usuario" method="POST">
    <ul class="collapsible" data-collapsible="exapandible">
        <li>
            <div class="collapsible-header active"><i class="fa fa-user"></i>Datos de personales</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="input-field col s12 l4">
                        <label for="name">Nombre *</label>
                        <input type="text" name="name" id="name" class="validate" required>
                    </div>

                    <div class="input-field col s12 l8">
                        <label for="">Apellido *</label>
                        <input type="text" name="lastname" id="lastname" class="validate" required>
                    </div>

                    <div class="input-field col s12 l9">
                        <label for="">Email *</label>
                        <input type="email" name="email" id="email" class="validate" required>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="collapsible-header active"><i class="fa fa-home"></i>Datos domicilio</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="input-field col s12">
                        <label for="street">Dirección: *</label>
                        <input type="text" name="street" id="street" class="validate" required>
                    </div>

                </div>
            </div>
        </li>
        <li>
            <div class="collapsible-header active"><i class="fa fa-credit-card"></i>Datos bancarios</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="input-field col s6">
                        <label for="number">Número de la tarjeta *</label>
                        <input type="text" name="number" id="number" class="validate" required>
                    </div>

                    <div class="input-field col s12 l3">
                        <label for="cvv">CVV *</label>
                        <input type="text" name="cvv" id="cvv" class="validate" required>
                    </div>

                    <div class="input-field col s12 l3">
                        <label for="expiration">Caducidad *</label>
                        <input type="date" name="expiration" id="expiration" required>
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
                        <input type="password" name="pass" id="pass" class="validate" required>
                    </div>

                    <div class="input-field col s12 l6">
                        <label for="">Confirmar contraseña</label>
                        <input type="password" name="passagain" id="passagain" class="validate" required>
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
        $('#expiration').pickadate({
            selectMonths: true,
            selectYears: 16
        });
    });
</script>

