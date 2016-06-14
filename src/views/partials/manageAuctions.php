<div class="management-auctions management-page">
    <div class="row">
        <div class="col s12">
            <ul class="tabs z-depth-1">
                <li class="tab col s4"><a href="#create">Nueva subasta</a></li>
                <li class="tab col s4"><a href="#update">Modificar subasta</a></li>
                <li class="tab col s4"><a href="#delete">Borrar subasta</a></li>
            </ul>
        </div>

        <div id="create" class="col s12">
            <div class="">
                <form>
                    <ul class="collapsible" data-collapsible="expandable">
                        <li>
                            <div class="collapsible-header active"><i class="fa fa-search"></i>Escoger producto</div>
                            <div class="collapsible-body">
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <select id="categoryCombo">
                                            <option value="" disabled selected>Seleccionar</option>
                                            <?php foreach ($categories as $category): ?>
                                                <option value="<?php echo $category['id'] ?>"><?php echo $category['nombre'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <label>Categoría</label>
                                    </div>

                                    <div class="input-field col s12 m6">
                                        <select id="subcategoryCombo" data-empty="Seleccionar" disabled>
                                            <option value="" disabled selected>Seleccionar</option>
                                        </select>
                                        <label>Subcategoría</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <select id="productCombo" data-empty="Seleccionar" disabled>
                                            <option value="" disabled selected>Seleccionar</option>
                                        </select>
                                        <label>Producto</label>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="collapsible-header active"><i class="fa fa-gavel"></i>Subasta</div>
                            <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
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
                            <th>Fin subasta</th>
                            <th>Mínima</th>
                            <th>Ganadora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($auctions as $key => $auction): ?>
                            <tr data-target="modal<?php echo $key ?>" class="modal-trigger"w>
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
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="delete" class="col s12">
            <div class="card-panel">
                <div class="delete-filter">
                    <button class="btn-flat waves-effect waves-light">SELECCIONAR TODAS</button>
                    <button class="btn-flat waves-effect waves-light">SELECCIONAR SUBASTAS CADUCADAS</button>
                    <button class="btn-flat waves-effect waves-light">CANCELAR SELECCIÓN</button>
                </div>

                <table class="striped">
                    <thead>
                        <tr>
                            <th colspan="2">Producto</th>
                            <th>Fin subasta</th>
                            <th>Mínima</th>
                            <th>Ganadora</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="">
                            <?php foreach ($auctions as $key => $auction): ?>
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
                                    <td>
                                        <input type="checkbox" id="check<?php echo $key ?>" name="auction[id][<?php echo $auction['id'] ?>]" />
                                        <label for="check<?php echo $key ?>"></label>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </form>
                    </tbody>
                </table>
            </div>
            <div class="fixed-action-btn">
                <a class="btn-floating btn-large red">
                    <i class="fa fa-trash-o"></i>
                </a>
            </div>
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
    });
</script>