<form action="/asistencia" method="POST">
    <ul class="collapsible" data-collapsible="exapandible">
        <li>
            <div class="collapsible-header active">
              <i class="fa fa-list-alt prefix" aria-hidden="true"></i>
              Formulario de Asistencia Técnica
            </div>
                <div class="collapsible-body">
                  <div class="row">
                    <div class="input-field col s12 l4">
                       <i class=" fa fa-user prefix" aria-hidden="true"></i>
                        <label for="name">Nombre *</label>
                        <input type="text" name="user[usuario]" id="user" class="validate" required>
                    </div>

                    <div class="input-field col s12 ">
                       <i class=" fa fa-envelope-o prefix" aria-hidden="true"></i>
                       <label for="">Email *</label>
                       <input type="email" value= "<?php echo $asistencia['email']?> " name="assistance[email]" id="email" class="validate" required>
                    </div>

                    <div class="input-field col s12">
                      <i class="fa fa-phone prefix" aria-hidden="true"></i>
                      <label for="">Teléfono</label>
                      <input type="tel" name="telephone" id="telephone" class="validate">
                    </div>

                    <div class="input-field col s12">
                      <i class="fa fa-plus prefix" aria-hidden="true"></i>
                      <textarea type="text" value= "<?php echo $asistencia['mensaje']?>" name="assistance[mensaje]" id="textarea1" class="materialize-textarea" length="120" required ></textarea>
                      <label for="textarea1">Indíquenos por qué motivo necesita asistencia *</label>
                    </div>

                    <div class="input-field col s12">
                      <select>
                        <option value="" disabled selected>Indique su problema</option>
                        <option value="1">No consigo subastar productos</option>
                        <option value="2">No puedo ver los productos subastados</option>
                        <option value="3">No consigo pujar por un producto</option>
                        <option value="4">No puedo ver mis pujas</option>
                      </select>
                      <label>Indíquenos la naturaleza de su problema</label>
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

<script type="text/javascript">
  $(document).ready(function() {
  $('select').material_select();
  });
</script>

<script>
    $(function() {
       $('select').material_select();
        <?php if ($error): ?>
            Materialize.toast('<?php echo $error ?>', 6000);
        <?php endif ?>
    });
</script>

