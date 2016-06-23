<script>
  $(document).ready(function() {
    $('select').material_select();
  });
</script>
<form action="/nuevaSubasta" method="POST">
    <ul class="collapsible" data-collapsible="exapandible">
        <li>
            <div class="collapsible-header active"><i class="fa fa-user"></i>Datos del producto</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="input-field col s12 l6">
                        <label for="name">Nombre del producto *</label>
                        <input type="text" name="product[nombre]" id="name" class="validate" required>
                    </div>

                    <div class="input-field col s12 l6">
                        <label for="">Marca *</label>
                        <input type="text" name="product[marca]" id="marca" class="validate" required>
                    </div>

                </div>
            </div>
        </li>
        <li>
            <div class="collapsible-header active"><i class="fa fa-home"></i>Estado del Producto</div>
            <div class="collapsible-body">
                <div class="row">

                    <div class="input-field col s12 l6">
                        <form action="#">
                           <p>
                              <input name="estado" type="radio" id="nuevo" />
                              <label for="nuevo">Nuevo</label>
                            </p>
                            <p>
                              <input name="estado" type="radio" id="usado" />
                              <label for="usado">Usado</label>
                            </p>
                        </form>
                    </div>

                    <div class="input-field col s12 l6">

                        <form action="/uploadImage" method="POST" enctype="multipart/form-data">
                            <label>Imagen *</label><br><br><br>
                            <input type="file" name="uploadImage" id="uploadImage">
                            <input type="submit" value="Subir" name="submit">
                        </form>
                         <label for="">Imagen *</label>
                     </div>

                </div>
            </div>
        </li>
        <li>
            <div class="collapsible-header active"><i class="fa fa-credit-card"></i>Categoria</div>
            <div class="collapsible-body">
                <div class="input-field col s12">
                    <select>
                      <option value="" disabled selected>Categoria</option>
                      <option value="1">Vehiculos</option>
                      <option value="2">Herramientas</option>
                      <option value="3">Tecnologia</option>
                      <option value="4">Consolas</option>
                      <option value="5">Telefonos</option>
                    </select>
                    <label>Selecciona Categoria</label>
                  </div>

               <div class="input-field col s12">
                <select>
                  <option value="" disabled selected>Subategoria</option>
                  <option value="1">Coches</option>
                  <option value="2">Motos</option>
                  <option value="3">Triciclos</option>
                  <option value="4">Patinetes</option>
                  <option value="5">Quads</option>
                </select>
                <label>Selecciona subCategoriaategoria</label>
              </div>
            </div>
        </li>
        <li>
            <div class="collapsible-header active"><i class="fa fa-check-circle-o"></i>Descripcion</div>
            <div class="collapsible-body">
                <div class="row">

                  <div class="row">
                    <form class="col s12">
                      <div class="row">
                        <div class="input-field col s12">
                          <textarea id="textarea1" class="materialize-textarea"></textarea>
                          <label for="textarea1">Escribe una descripcion de tu producto</label>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
        </li>
        <li>
            <div class="collapsible-header active"><i class="fa fa-check-circle-o"></i>Tiempo de subasta</div>
            <div class="collapsible-body">
                <div class="row">

                <div class="input-field col s12">
                    <select>
                      <option value="" disabled selected>Tiempo de subasta</option>
                      <option value="1">1 Dia</option>
                      <option value="2">2 Dias</option>
                      <option value="3">3 Dias</option>
                      <option value="4">4 Dias</option>
                      <option value="5">5 Dias</option>
                      <option value="6">6 Dias</option>
                      <option value="7">7 Dias</option>
                    </select>
                    <label>Selecciona el tiempo de subasta</label>
              </div>



                <div class="buttons-wrapper center-align col s12">
                    <button class="btn waves-effect waves-light" type="submit">Subastar!</button>
                </div>
                </div>
            </div>
        </li>
    </ul>
</form>
