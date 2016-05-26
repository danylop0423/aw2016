<form action="/asistencia" method="POST">
    <ul class="collapsible" data-collapsible="exapandible">
        <li>
            <div class="collapsible-header active"><i class="fa fa-user"></i>Datos de personales</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="input-field col s12 l4">
                        <label for="name">Usuario *</label>
                        <input type="text" name="user[usuario]" id="user" class="validate" required>
                    </div>

                    <div class="input-field col s12 l8">
                        <label for="">Apellido *</label>
                        <input type="text" name="user[apellido]" id="lastname" class="validate" required>
                    </div>

                    <div class="input-field col s12">
                        <select>
                          <option value="" disabled selected>Elija departamento</option>
                          <option value="1">Departamento 1</option>
                          <option value="2">Departamento 2</option>
                          <option value="3">Departamento 3</option>
                        </select>
                        <label>Departamentos</label>
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

