<div class="management-auctions management-page">
    <div class="row">
        <div class="col s12">
            <ul class="tabs z-depth-1">
                <li class="tab col s4"><a href="#create">Nuevo producto</a></li>
                <li class="tab col s4"><a href="#update">Modificar producto</a></li>
                <li class="tab col s4"><a href="#delete">Borrar producto</a></li>
            </ul>
        </div>

        <div id="create" class="col s12">
            <div class="">
                <script>
                  $(document).ready(function() {
                    $('select').material_select();
                  });
                </script>
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

<?php foreach ($auctions as $key => $auction): ?>
    <div id="modal<?php echo $key ?>" class="modal bottom-sheet">
        <div class="modal-content">
            <div class="row">
                <div class="col s12">
                    <table class="striped">
                        <thead>
                            <tr>
                                <th colspan="2">Producto</th>
                                <th>Fin subasta</th>
                                <th>Mínima</th>
                                <th>Ganadora</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
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
                                <td>20/05/2016 17:30</td>
                                <td>21€</td>
                                <td>31,5€</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

             <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                        <input id="auctionEnd" name="auction[caducidad]" type="text" class="datepicker validate" value="2016-06-28 17:30">
                        <label for="auctionEnd">Fin subasta</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="lowestBid" name="auction[pujaMin]" type="text" class="validate" value="31,5€">
                            <label for="lowestBid">Puja mínima</label>
                        </div>
                    </div>
                    <input type="hidden" name="auction[id]" value="<?php echo $auction['id'] ?>">
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn">Guardar</a>
        </div>
    </div>
<?php endforeach ?>

<script>
    $(function() {
        $('select').material_select();
        $('.modal-trigger').leanModal();

        $('#categoryCombo').on('change', function() {
            var value = $(this).val();

            $.ajax({
                type: 'POST',
                url: '/ajax/fetchSubcategories',
                data : {category: value},

                beforeSend: function() {
                    $('#subcategoryCombo').html('<option value disabled selected>Cargando...</option>').material_select()
                },

                success : function(data) {
                    $('#subcategoryCombo').populateSelect(data);
                    $('#subcategoryCombo').prop('disabled', false).material_select();
                }
            });
        });

        $('#subcategoryCombo').on('change', function() {
            var value = $(this).val();

            $.ajax({
                type: 'POST',
                url: '/ajax/fetchFilteredAuctions',
                data : {
                    filters: {'subcategoria.id': value}
                },

                beforeSend: function() {
                    $('#productCombo').html('<option value disabled selected>Cargando...</option>').material_select()
                },

                success: function(data) {
                    $('#productCombo').populateProductSelect(data);
                    $('#productCombo').prop('disabled', false).material_select();
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