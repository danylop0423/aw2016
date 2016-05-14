Información para montar la base de datos:

1) importa el fichero reverse_bid.sql desde phpMyAdmin 
2) importa el fichero de creación de usuario "rb_user"
	
3) también podeis crearlo vosotros directamente en phpMyAdmin, los datos que he usado
	en el fichero "config.php" son:  

		define('BD_HOST', 'localhost');
		define('BD_NAME', 'reversebid');  //nombre de la BD
		define('BD_USER', 'rb_user');     // usuario de acceso a la BD
		define('BD_PASS', 'rbpass');      // password de acceso a la BD
		define('RAIZ_APP', __DIR__);
		define('RUTA_APP', '/PR3/');	  // ojo con la ruta en local  		
		define('RUTA_IMGS', RUTA_APP.'img/');
		define('RUTA_CSS', RUTA_APP.'css/');
		define('RUTA_JS', RUTA_APP.'js/');
		define('INSTALADA', true );

		
	fijaros en los comentarios, prefiero que tengaís asi este fichero y adapteis vuestra BD
	para no hacernos un lio cada vez. Esto en "config.php" ya esta hecho,solo lo pongo para
	que pilleis los datos, os ruego no lo toqueís en el fichero original ;-)
		