<?php
use es\ucm\fdi\aw;
require_once 'util.php';
?>
<header>
	<div id="cabecera">
		<a href="index.php"><h1> ReverseBid </h1></a>
	</div>

	<div id="menu">
		<a href="index.php"><img id="logo"src="img/logo2.png" alt=“ReverseBid” ><img/></a>
		<ul class="barra">
				<li><a href="index.php">Home</a></li>

				<li><a href="#">Subastas</a>
					<ul>
						<li><a href="subastar.php">Subastar</a></li>
						<li><a href="subastadorregistrado.php">Registrate Subastador</a></li>
						<li><a href="destacadas.php">Subastas Destacadas</a>
							<ul>
								<li><a href="producto.php">HDD Toshiba 2TB</a></li>
								<li><a href="producto.php">Portátil Lenovo</a></li>
								<li><a href="producto.php">Bicicleta BMX</a></li>
								<li><a href="producto.php">Mueble Bar Rizoli</a></li>
							</ul>
						</li>
					</ul>
				</li>

				<li><a href="#">Productos</a>
					<ul>
						<li><a href="categoria.php">Electrónica</a>
						  <ul>
								<li><a href="subcategoria.php">DiscosDuros</a></li>
								<li><a href="subcategoria.php">Portátiles</a></li>
								<li><a href="subcategoria.php">SmartPhones</a></li>
								<li><a href="subcategoria.php">SmartWatches</a></li>
							</ul>
						</li>
						<li><a href="categoria.php">Deporte</a>
						  <ul>
							<li><a href="subcategoria.php">Bicicletas</a></li>
							<li><a href="subcategoria.php">Musculación</a></li>
							<li><a href="subcategoria.php">Accesorios</a></li>
							<li><a href="subcategoria.php">Zapatillas</a></li>
						  </ul>
						</li>
						<li><a href="categoria.php">Hogar</a>
						   <ul>
							  <li><a href="subcategoria.php">Muebles</a></li>
							  <li><a href="subcategoria.php">Jardín</a></li>
							  <li><a href="subcategoria.php">Electrodomésticos</a></li>
							  <li><a href="subcategoria.php">Decoración</a></li>
							</ul>
						</li>
					</ul>
				</li>

				<li><a href="login.php">Mi Cuenta</a>
					<?php $h=mostrarPerfil()?>
					<ul>
						<li><a href="<?= $h ?>">Mi Perfil</a></li>
					    <li><a href="<?php $h=$h.'#missubastas';echo $h;?>">Mis Subastas</a></li>
						<li><a href="<?php $h=$h.'#mispujas';echo $h;?>">Mis Pujas</a></li>
						<li><a href="login.php">Cerrar Sesión</a></li>
					</ul>
				</li>

				<li class="buscar">
				  <form action="producto.php" method="post" enctype="text/plain">Buscar:
				   <input type="text" name="findtext" placeholder="Search.." required/>
				   <a href="avanzada.php">Busqueda avanzada</a>
				   <button id="findbutt" name="find" type="submit" ><img id="findimg" src="./img/find.png" alt=“find” /></button>
				  </form>
				</li>

				<li><a href="#">Ayuda?</a>
				  <ul>
					 <li><a href="contacto.php">Contacto</a></li>
					 <li><a href="faq.php">FAQ</a></li>
				  </ul>
				</li>
		</ul>
	</div>
   </header>

