<div class="management-auctions management-page">
    <div class="row">
        <div class="col s12">
            <ul class="tabs z-depth-1">
                <li class="tab col s4"><a href="#create" <?php echo strpos($slug, 'crear') ? 'class="active"' : '' ?>>Nuevo producto</a></li>
                <li class="tab col s4"><a href="#update" <?php echo strpos($slug, 'editar') ? 'class="active"' : '' ?>>Modificar producto</a></li>
                <li class="tab col s4"><a href="#delete" <?php echo strpos($slug, 'borrar') ? 'class="active"' : '' ?>>Borrar producto</a></li>
            </ul>
        </div>

        <div id="create" class="col s12">
            <div class="">
                <form action="/gestion/productos/crear" method="POST" enctype="multipart/form-data">
                    <ul class="collapsible" data-collapsible="exapandible">
                        <li>
                            <div class="collapsible-header active"><i class="fa fa-gift"></i>Datos del producto</div>
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
                            <div class="collapsible-header active"><i class="fa fa-battery-quarter"></i>Estado del Producto</div>
                            <div class="collapsible-body center-align">
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                            <input name="product[estado]" type="radio" id="nuevo" value ="nuevo" />
                                            <label for="nuevo">Nuevo</label>
                                    </div>

                                    <div class="input-field col s12 m6">
                                            <input name="product[estado]" type="radio" id="usado" value = "usado" />
                                            <label for="usado">Usado</label>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header active"><i class="fa fa-camera"></i>Imagen del Producto</div>
                            <div class="collapsible-body">
                                <div class="row">
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>Imagen</span>
                                            <input type="file" name="fileimage">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header active"><i class="fa fa-level-down"></i>Categoría del Producto</div>
                            <div class="collapsible-body clear-fix">
                                <div class="input-field col s12">
                                    <select id="categoryCombo" class="categoryCombo">
                                        <option value="" disabled selected>Seleccionar</option>
                                        <?php foreach ($categories as $category): ?>
                                            <option value="<?php echo $category['id'] ?>"><?php echo $category['nombre'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <label for="categoryCombo">Categoría</label>
                                </div>

                                <div class="input-field col s12">
                                    <select id="chivaste" name="product[subcategoria]" data-empty="Seleccionar" disabled>
                                        <option disabled selected>Seleccionar</option>
                                    </select>
                                    <label for="subcategoryCombo">Subcategoría</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header active"><i class="fa fa-question-circle-o"></i>Descripción del Producto</div>
                            <div class="collapsible-body">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea name='product[descripcion]' id="descripcion" class="materialize-textarea"></textarea>
                                        <label for="descripcion">Descripcion</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col s12 buttons-wrapper center-align">
                                        <button class="btn waves-effect waves-light" type="submit">Añadir producto</button>
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
                    <button class="btn-flat waves-effect waves-light" id='selectAll'>SELECCIONAR TODOS</button>
                    <button class="btn-flat waves-effect waves-light" id='cancelAll'>CANCELAR SELECCIÓN</button>
                </div>

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
                        <form action="/gestion/productos/borrar" method="POST">
                            <?php foreach ($products as $key => $product): ?>
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
                                    <td>
                                        <input type="checkbox" id="check<?php echo $key ?>" name="products[id][<?php echo $product['id'] ?>]" />
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
                                    <option value="<?php echo $category['id'] ?>" <?php echo $category['nombre'] === $product['categoria'] ? 'selected' : '' ?>><?php echo $category['nombre'] ?></option>
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

                        <div class="file-field input-field col s12 l6">
                            <div class="btn">
                                <span>Imagen</span>
                                <input type="file" name="fileimage">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
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
            var $file = $form.find('input[name="fileimage"]')[0];

            if ($file.files.length > 0) {
                var formData =  new FormData();
                formData.append('fileimage', $file.files[0]);

                $.ajax({
                    type: 'POST',
                    url: '/ajax/uploadProductImage',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,

                    success: function(data) {
                        if (typeof data.foto !== 'undefined') {
                            Materialize.toast('Imagen subida correctamente', 10000);

                            $.ajax({
                                type: 'POST',
                                url: $form.attr('action'),
                                data: $form.serialize() + '&product%5Bfoto%5D=' + data.foto,

                                success: function(data) {
                                    Materialize.toast(data.response, 10000);
                                }
                            });
                        } else if (typeof data.error !== 'undefined') {
                            $.each(data.error, function(i, error) {
                                Materialize.toast(error, 10000);
                            });
                        }
                    }
                });
            } else {
                $.ajax({
                    type: 'POST',
                    url: $form.attr('action'),
                    data: $form.serialize(),

                    success: function(data) {
                        Materialize.toast(data.response, 10000);
                    }
                });
            }

            event.preventDefault();
        });

        $('.categoryCombo').on('change', function(event) {
            var value = $(event.target).val();

            $.ajax({
                type: 'POST',
                url: '/ajax/fetchSubcategories',
                data : {category: value},

                beforeSend: function() {
                    $('#chivaste').html('<option value disabled selected>Cargando...</option>').material_select()
                },

                success : function(data) {
                    $('#chivaste').populateSelect(data);
                    $('#chivaste').prop('disabled', false).material_select();
                }
            });
        });

        $('#selectAll').on('click', function() {
            $('input[type=checkbox]').prop('checked', true);
        });

        $('#cancelAll').on('click', function() {
           $('input[type=checkbox]').prop('checked', false);
        });
    });
</script>
