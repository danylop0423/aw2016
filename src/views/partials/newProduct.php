<script>
  $(document).ready(function() {
    $('select').material_select();
  });
</script>
<form action="/newProductRegistered" method="POST">
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
                              <input name="product[estado]" type="radio" id="nuevo" value ="nuevo" />
                              <label for="nuevo">Nuevo</label>
                            </p>
                            <p>
                              <input name="product[estado]" type="radio" id="usado" value = "usado" />
                              <label for="usado">Usado</label>
                            </p>
                        </form>
                    </div>

                    <div class="input-field col s12 l6">
                       
                        <form action="/uploadImage" method="POST" enctype="multipart/form-data">
                            <label>Imagen *</label><br><br><br>
                            <input type="file" name="product[imagen]" id="uploadImage">
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
                <select name='product[subcategoria]'>
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
            <<div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input name = 'producto[descripcion]' placeholder="Placeholder" id="first_name" type="text" class="validate">
          <label for="first_name">Descripcion</label>
        </div>
        </li>


        <li>

            <div class="buttons-wrapper center-align col s12">
                <button class="btn waves-effect waves-light" type="submit">Subastar!</button>
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


  var slider = document.getElementById('pujaMinima');
  noUiSlider.create(slider, {
   start: [20, 80],
   connect: true,
   step: 1,
   range: {
     'min': 1,
     'max': 50
   },
   format: wNumb({
     decimals: 0
   })
  });

</script>



