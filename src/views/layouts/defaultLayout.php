<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reversebid | <?php echo $title ?></title>
    <link rel="stylesheet" href="/assets/styles/app.css">
    <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/materialize.min.js"></script>
</head>
<body>
    <header>
        <nav class="top-nav">
            <div class="container">
                <div class="nav-wrapper left-align">
                    <a class="page-title"><?php echo $title ?></a>

                    <?php if ($loggedUser): ?>
                        <a class="dropdown-button" href="#" data-activates="dropdown">
                            <img src="http://materializecss.com/images/yuna.jpg" alt="" class="avatar circle">
                            <span class="name"><?php echo $loggedUser['nombre'] ?></span>
                        </a>

                        <ul id="dropdown" class="dropdown-content">
                            <li><a href="#!">Perfil</a></li>
                            <li class="divider"></li>
                            <li><a href="#!">Subastas</a></li>
                            <li class="divider"></li>
                            <li><a href="#!">Pujas</a></li>
                            <li class="divider"></li>
                            <li><a href="#!">Cerrar sesión</a></li>
                        </ul>
                    <?php endif ?>
                </div>
            </div>
        </nav>
        <div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="fa fa-bars"></i></a></div>
        <ul id="nav-mobile" class="side-nav fixed" style="transform: translateX(0%);">
            <li class="logo">
                <a id="logo-container" class="brand-logo"><img class="brand" src="/assets/images/logo.png"></a>
                <div class="search-wrapper card">
                    <input id="search" maxlength="24"><i class="fa fa-search" style="color: black;"></i>
                    <div class="search-results"></div>
                </div>
            </li>
            <li class="bold"><a href="/">Home</a></li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li class="bold "><a class="collapsible-header ">Subastas</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="#">Subastar</a></li>
                                <li><a href="#">Subastador</a></li>
                                <li><a href="#">Destacadas</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li class="bold"><a class="collapsible-header">Productos</a>
                        <div class="collapsible-body" style="">
                            <ul class="collapsible collapsible-accordion">
                                <li><a class="collapsible-header">Electrónica</a>
                                    <div class="collapsible-body" style="">
                                        <ul>
                                            <li><a href="#">Discos duros</a></li>
                                            <li><a href="#">Portátiles</a></li>
                                            <li><a href="#">Smartphone</a></li>
                                            <li><a href="#">Smartwatch</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a class="collapsible-header">Deporte</a>
                                    <div class="collapsible-body" style="">
                                        <ul>
                                            <li><a href="#">Discos duros</a></li>
                                            <li><a href="#">Portátiles</a></li>
                                            <li><a href="#">Smartphone</a></li>
                                            <li><a href="#">Smartwatch</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a class="collapsible-header">Hogar</a>
                                    <div class="collapsible-body" style="">
                                        <ul>
                                            <li><a href="#">Discos duros</a></li>
                                            <li><a href="#">Portátiles</a></li>
                                            <li><a href="#">Smartphone</a></li>
                                            <li><a href="#">Smartwatch</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li class="bold"><a class="collapsible-header">Mi cuenta</a>
                        <div class="collapsible-body" style="">
                            <ul>
                                <li><a href="/miperfil">Mi perfil</a></li>
                                <li><a href="#">Mis subastas </a></li>
                                <li><a href="#">Mis pujas </a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <?php if ($loggedUser): ?>
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
                <div class="col l8 s12">
                    <h5 class="white-text">Redes sociales</h5>
                </div>
                <div class="col l4 s12">
                    <h5 class="white-text">Enlaces</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Contacto</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Asistencia técnica</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Condiciones de uso</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Politicas de privacidad</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Venta y reembolso</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2016 Todos los Derechos Reservados
                <a class="grey-text text-lighten-4 right" href="#!">ReverseBid</a>
            </div>
        </div>
    </footer>

    <script src="/assets/scripts/search.js"></script>

    <script>
        $(function () {
            $(".button-collapse").sideNav();
        });
    </script>
</body>
</html>