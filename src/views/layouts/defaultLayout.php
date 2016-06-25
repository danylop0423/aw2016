<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Reversebid | <?php echo $title ?></title>
    <link rel="stylesheet" href="/assets/styles/app.css">
    <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/vendor/sweetalert2/sweetalert2.css">
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/materialize.min.js"></script>
    <script src="/assets/vendor/sweetalert2/sweetalert2.min.js"></script>

</head>
<body>
    <header>
        <nav class="top-nav">
            <div class="container ">
                <div class="nav-wrapper left-align  ">
                    <a class="page-title"><?php echo $title ?></a>

                    <?php if ($loggedUser): ?>
                        <a class="dropdown-button" href="#" data-activates="dropdown">
                            <img src="<?php echo $loggedUser['foto']?>" alt="" class="avatar circle">
                            <span class="name"><?php echo $loggedUser['nombre'] ?></span>
                        </a>

                        <ul id="dropdown" class="dropdown-content">
                            <li><a href="/profile">Perfil</a></li>
                            <li class="divider"></li>
                            <li><a href="/profile#missubastas">Subastas</a></li>
                            <li class="divider"></li>
                            <li><a href="/profile#mispujas">Pujas</a></li>
                            <li class="divider"></li>
                            <li><a href="/logout">Cerrar sesión</a></li>
                        </ul>
                    <?php endif ?>
                </div>
            </div>
        </nav>
        <div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="fa fa-bars"></i></a></div>
        <ul id="nav-mobile" class="side-nav fixed" style="transform: translateX(0%);">
            <li class="logo">
                <a href="/" id="logo-container" class="brand-logo"><img class="brand" src="/assets/images/logo.png"></a>
            </li>
            <li class="bold"><a href="/">Home</a></li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li class="bold"><a class="collapsible-header">Subastas</a>
                        <div class="collapsible-body" style="">
                            <ul class="collapsible collapsible-accordion">
                                <li class="bold"><a href="/subastas">Destacadas</a></li>
                                <li class="bold"><a class="collapsible-header">Categorias</a>
                                    <div class="collapsible-body" style="">
                                        <ul class="collapsible collapsible-accordion">
                                            <?php foreach ($menuCategories as $category => $subcategories): ?>
                                                <li><a class="collapsible-header"><?php echo $category ?></a>
                                                    <div class="collapsible-body" style="">
                                                        <ul>
                                                            <?php foreach ($subcategories as $subcategory): ?>
                                                                <?php $link = '/subastas/' . $category . '/' . $subcategory ?>
                                                                <li class="<?php echo $link == $slug ? 'active' : '' ?>">
                                                                    <a href="<?php echo $link ?>">
                                                                        <?php echo $subcategory ?>
                                                                    </a>
                                                                </li>
                                                            <?php endforeach ?>
                                                        </ul>
                                                    </div>
                                                </li>
                                            <?php endforeach ?>
                                            </ul>
                                        </div>
                                    </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <li><a href="/gestion/productos">Productos</a></li>
            <?php if ($loggedUser): ?>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header">Mi cuenta</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <ul class="collapsible collapsible-accordion">
                                    <li class="bold "><a class="collapsible-header ">Gestión</a>
                                        <div class="collapsible-body">
                                            <ul>
                                                <li><a href="/gestion/subastas">Mis Subastas</a></li>
                                                <li><a href="/profile#mispujas">Mis pujas </a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    </ul>
                                     <li><a href="/profile">Mi perfil</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>

                <li class="bold"><a href="/logout">Cerrar sesión</a></li>
            <?php else: ?>
                <li class="bold"><a href="/nuevo-usuario">Registrarte</a></li>
                <li class="bold"><a href="/login">Iniciar sesión</a></li>
            <?php endif ?>
        </ul>
    </header>

    <main>
        <div class="container">
            <?php echo $content ?>
        </div>
    </main>

    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col l8 s12 white-text">
                    <h5 class="white-text">Redes sociales</h5>
                
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-square-o fa-stack-2x"></i>
                      <i class="fa fa-twitter fa-stack-1x"></i>
                    </span><a href="https://twitter.com/informaticaucm" style="color:white">Twitter</a><br>
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-square-o fa-stack-2x"></i>
                      <i class="fa fa-facebook fa-stack-1x"></i>
                    </span><a href="https://www.facebook.com/pages/Facultad-de-Inform%C3%A1tica-de-la-UCM/139004316153038?fref=ts" style="color:white">Facebook</a><br>
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-square-o fa-stack-2x"></i>
                      <i class="fa fa-youtube fa-stack-1x"></i>
                    </span><a href="https://www.youtube.com/user/finformaticaucm" style="color:white">Youtube</a><br>

                    <!-- <ul class="fa-ul">
                      <li><i class="fa-li fa fa-check-square"></i>List icons</li>
                      <li><i class="fa-li fa fa-check-square"></i>can be used</li>
                      <li><i class="fa-li fa fa-spinner fa-spin"></i>as bullets</li>
                      <li><i class="fa-li fa fa-square"></i>in lists</li>
                    </ul> -->
                </div>
                <div class="col l4 s12">
                    <h5 class="white-text">Enlaces</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="/contacto">Contacto</a></li>
                        <li><a class="grey-text text-lighten-3" href="/asistencia">Asistencia técnica</a></li>
                        <li><a class="grey-text text-lighten-3" href="/condiciones">Condiciones de uso</a></li>
                        <li><a class="grey-text text-lighten-3" href="/politicas">Politicas de privacidad</a></li>
                        <li><a class="grey-text text-lighten-3" href="/reembolso">Venta y reembolso</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2016 Todos los Derechos Reservados
                <a class="grey-text text-lighten-4 right" href="/">ReverseBid</a>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.24/vue.js"></script>
    <script src="/assets/scripts/main.js"></script>

    <script>
        $(function () {
            $(".button-collapse").sideNav();

            <?php if (isset($error)): ?>
                <?php if (is_array($error)): ?>
                    <?php foreach ($error as $e): ?>
                        Materialize.toast('<?php echo $e ?>', 10000);
                    <?php endforeach ?>
                <?php else: ?>
                    Materialize.toast('<?php echo $error ?>', 10000);
                <?php endif ?>
            <?php endif ?>
        });
    </script>
</body>
</html>