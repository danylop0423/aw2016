<div class="manage-auctions-page">
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
            <div class="card-panel"></div>

        </div>

        <div id="delete" class="col s12">
            <div class="card-panel"></div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('select').material_select();

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