<div class="management-auctions management-page">
    <div class="row">
        <div class="col s12">
            <ul class="tabs z-depth-1">
                <li class="tab col s4"><a href="#create">Nuevo producto</a></li>
                <li class="tab col s4"><a class="active" href="#update">Modificar producto</a></li>
                <li class="tab col s4"><a href="#delete">Borrar producto</a></li>
            </ul>
        </div>

        <div id="create" class="col s12">
            <div class="">
                <form action="/nuevoProducto" method="POST">
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
            </div>
        </div>

        <div id="update" class="col s12">
            <div class="card-panel">
                <table class="highlight">
                    <thead>
                        <tr>
                            <th colspan="2">Producto</th>
                            <th>Marca</th>
                            <th>Categoría</th>
                            <th>Subcategoría</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr data-target="modal<?php echo $product['id'] ?>" class="modal-trigger"w>
                                <td colspan="2">
                                    <div class="valign-wrapper">
                                        <div class="col s2 hide-on-small-only">
                                            <img class="responsive-img" src="<?php echo $product['foto'] ?>">
                                        </div>

                                        <div class="col s10">
                                            <span><?php echo $product['nombre'] ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo $product['marca'] ?></td>
                                <td><?php echo $product['categoria'] ?></td>
                                <td><?php echo $product['subcategoria'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="delete" class="col s12">
            <div class="card-panel">
                <div class="delete-filter">
                    <button class="btn-flat waves-effect waves-light" id='delete_selectAll'>SELECCIONAR TODOS</button>
                    <button class="btn-flat waves-effect waves-light" id='delete_cancelAll'>CANCELAR SELECCIÓN</button>
                </div>

             <table class="striped">
                     <thead>
                        <tr>
                            <th colspan="2">Producto</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="/gestion/subastas/borrar" method="POST">
                            <?php foreach ($auctions as $key => $auction): ?>
                                <tr class="deleteField" data-finished=<?php echo $auction['finished'] ? 'data-finished':'' ?> >
                                    <td colspan="2">
                                        <div class="valign-wrapper">
                                            <div class="col s2 hide-on-small-only">
                                                <img class="responsive-img" src="<?php echo $auction['foto'] ?>">
                                            </div>

                                            <div class="col s10">
                                                <span><?php echo $auction['nombre'] ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>31,5€</td>
                                    <td class="dates" ><?php echo $auction['caducidad']?></td>
                                    <td>
                                        <input type="checkbox" id="check<?php echo $key ?>" name="auction[id][<?php echo $auction['id'] ?>]" />
                                        <label for="check<?php echo $key ?>"></label>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                           <div class="fixed-action-btn" >
                            <button class="btn-floating btn-large red" type="submit">
                                <i class="fa fa-trash-o"></i>
                            </button>
                          </div>
                        </form>
                    </tbody>
                </table>
        </div>
    </div>
</div>

<?php foreach ($products as $product): ?>
    <div id="modal<?php echo $product['id'] ?>" class="modal bottom-sheet">
        <div class="modal-content">
            <div class="row">
                <div class="col s12">
                    <table class="striped">
                        <thead>
                            <tr>
                                <th colspan="2">Producto</th>
                                <th>Marca</th>
                                <th>Categoría</th>
                                <th>Subcategoría</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <div class="valign-wrapper">
                                        <div class="col s2 hide-on-small-only">
                                            <img class="responsive-img" src="<?php echo $product['foto'] ?>">
                                        </div>

                                        <div class="col s10">
                                            <span><?php echo $product['nombre'] ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo $product['marca'] ?></td>
                                <td><?php echo $product['categoria'] ?></td>
                                <td><?php echo $product['subcategoria'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

             <div class="row">
                <form name="updateProduct" class="col s12" action="/ajax/updateProduct">
                    <div class="row">
                        <div class="input-field col s6 l3">
                            <input id="productName" name="product[nombre]" type="text" class="validate" value="<?php echo $product['nombre'] ?>">
                            <label for="productName">Nombre</label>
                        </div>

                        <div class="input-field col s6 l3">
                            <input id="productMake" name="product[marca]" type="text" class="validate" value="<?php echo $product['marca'] ?>">
                            <label for="productMake">Marca</label>
                        </div>

                        <div class="input-field col s6 l3">
                            <select id="categoryCombo" class="categoryCombo">
                                <option value="" disabled selected>Seleccionar</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category['id'] ?>" <?php echo $category['nombre'] === $product['categoria'] ? 'selected' : '' ?>>
                                        <?php echo $category['nombre'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <label for="categoryCombo">Categoría</label>
                        </div>

                        <div class="input-field col s6 l3">
                            <select id="subcategoryCombo" name="product[subcategoria]" data-empty="Seleccionar">
                                <option value="<?php echo $product['subcategoria_id'] ?>" selected><?php echo $product['subcategoria'] ?></option>
                            </select>
                            <label for="subcategoryCombo">Subcategoría</label>
                        </div>

                        <div class="input-field col s12">
                            <textarea id="productDescription" class="materialize-textarea" name="product[descripcion]"><?php echo $product['descripcion'] ?></textarea>
                            <label for="productDescription">Descripción</label>
                        </div>

                        <div class="input-field col s12 right-align">
                            <button type="submit" class="btn waves-effect waves-red">Guardar</button>
                            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
                        </div>
                    </div>
                    <input type="hidden" name="product[id]" value="<?php echo $product['id'] ?>">
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>

<script>
    $(function() {
        $('select').material_select();
        $('.modal-trigger').leanModal();

        $('form[name="updateProduct"]').on('submit', function(event) {
            var $form = $(this);

            $.ajax({
                type: 'POST',
                url: $form.attr('action'),
                data : $form.serialize(),

                success: function(data) {
                    Materialize.toast(data.response, 6000);
                }
            });

            event.preventDefault();
        });

        $('.categoryCombo').on('change', function(event) {
            var value = $(event.target).val();

            $.ajax({
                type: 'POST',
                url: '/ajax/fetchSubcategories',
                data : {category: value},

                beforeSend: function() {
                    $('#subcategoryCombo').html('<option value disabled selected>Cargando...</option>').material_select()
                },

                success : function(data) {
                    $('#subcategoryCombo').populateSelect(data);
                    $('#subcategoryCombo').material_select();
                }
            });
        });

        $('#delete_selectAll').on('click', function() {
           $('.deleteField :input[type=checkbox]').prop('checked', true);
        });

        $('#delete_selectExpired').on('click', function() {
           $('.deleteField :input[type=checkbox]').prop('checked', false);
           $('.deleteField[data-finished="data-finished"]').each(function(i,elem){
               $(this).find('input[type=checkbox]').prop('checked', true);
            });
         });

        $('#delete_cancelAll').on('click', function() {
           $('.deleteField :input[type=checkbox]').prop('checked', false);
        });
    });
</script>