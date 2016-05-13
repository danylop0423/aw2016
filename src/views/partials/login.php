<div class="login-page">
    <div class="login-card">
        <form action="/login" method="POST">
            <div class="row">
                <div class="input-field col s12">
                    <i class="fa fa-user prefix"></i>
                    <input id="icon_prefix" name="user" type="text" class="validate" required>
                    <label for="icon_prefix">Nombre de usuario</label>
                </div>
                <div class="input-field col s12">
                    <i class="fa fa-lock prefix"></i>
                    <input id="icon_lock" name="password" type="password" class="validate" required>
                    <label for="icon_lock">Contraseña</label>
                </div>
            </div>

            <div class="buttons-wrapper center-align">
                <button class="btn waves-effect waves-light" type="submit" name="action">
                    Iniciar sesión
                </button>
                
                   <a  href='/nuevo-usuario' >
				   <button class="btn-flat waves-effect waves-light" type="button" >Nuevo usuario</button>
				   </a>
                
            </div>
        </form>
    </div>
</div>

<script>
    $(function() {
        <?php if ($error): ?>
            Materialize.toast('<?php echo $error ?>', 6000);
        <?php endif ?>

        $('.btn-flat').on('click', function(e) {
            e.preventDefault();
            window.location.href = '/nuevo-usuario';
        });
    });
</script>
