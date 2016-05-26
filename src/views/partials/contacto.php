<form action="/contacto" method="POST">
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
    </ul>
</form>
<script>
    $(function() {
        <?php if ($error): ?>
            Materialize.toast('<?php echo $error ?>', 6000);
        <?php endif ?>
    });
</script>

