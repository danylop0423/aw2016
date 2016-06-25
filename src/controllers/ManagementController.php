<?php

class ManagementController extends AbstractController
{
    public function manageAuctionsAction($request, $response, $args)
    {
        $args['title'] = 'Gestión de subastas';
        $args['categories'] = $this->fetchCategories();

        $args['auctions'] = $this->db->select()
            ->from('subasta')
            ->join('productos', 'subasta.producto', '=', 'productos.id', 'INNER')
            // ->where('subasta.subastador', '=', $request->getAttribute('loggedUser')['id'])
            ->limit(25)
            ->execute()
            ->fetchAll()
        ;
		$now=new DateTime('now');
		$auct=&$args['auctions'];
		foreach ( $auct as $clave => &$auction){
		  	$caducidad=new DateTime($auction['caducidad']);
			if($caducidad <= $now)
               $auction['finished']=true;
			else
		      $auction['finished']=false;
		}

        if ($request->isPost()) {
			$selected_auctions= $request->getParam('auction');
			if ($args['action'] === 'crear') {

                $auction = $request->getParam('auction');

                //Calculo de fechas finales e iniciales
                $diasSubasta = $auction['caducidad'] *(24*60*60); //en segundos
                $fechaActual = time();
                $fechaFin = $diasSubasta + $fechaActual;
                $fechaActual = date("Y-m-d-H-m-s",$fechaActual);
                $fechaFin = date("Y-m-d-H-m-s",$fechaFin);

                var_dump($fechaActual);
                var_dump($fechaFin);
                die();

                //Falta relacionar la subasta con el subastador que sino la base de datos no se lo come.


                $create = $this->db->insert(array_keys($auction))
                    ->into('subasta')
                    ->values(array_values($auction))
                    ->execute()
                ;
                
                if($create) {
                    $args['error'] = 'Se ha creado una subasta con el id '.$create;
                } else {
                    $args['error'] = 'No se ha creado la subasta';
                }
            } elseif ($args['action'] === 'borrar') {
				 $deleted= $this->db->delete()
				   ->from('subasta')
				   ->whereIn('id',array_keys($selected_auctions['id']))
				   ->execute();

				if($deleted > 0){
				   $allAuctions=$args['auctions'];
				   $updatedArgs=[];
				   foreach ( $allAuctions as $k => $v){
					 $flag=$allAuctions[$k]["id"];
					 if(!array_key_exists($flag,$selected_auctions['id']))
						 $updatedArgs[$k]=$v;
				   }
				   $args['auctions']=$updatedArgs;
				   $args['error'] = 'Se han borrado '.$deleted.' Productos';
				   return $this->render($response, 'manageAuctions.php', $args);
				 }else{
					$args['error'] = 'Hubo un Problema al Borrar, intentelo de nuevo';
					return $this->render($response, 'manageAuctions.php', $args);
			      }

			  }
        }

        return $this->render($response, 'manageAuctions.php', $args);
    }

    public function manageProductsAction($request, $response, $args)
    {
        $args['title'] = 'Gestión de productos';
        $args['categories'] = $this->fetchCategories();

        $args['products'] = $this->db->select(array('p.id', 'p.nombre', 'p.foto', 'p.marca', 'p.descripcion', 's.nombre subcategoria', 's.id subcategoria_id', 'c.nombre categoria'))
            ->from('productos p')
            ->join('subcategoria s', 'p.subcategoria', '=', 's.id')
            ->join('categoria c', 's.categoria', '=', 'c.id')
            ->limit(25)
            ->execute()
            ->fetchAll()
        ;

        if ($request->isPost()) {
			$selected_auctions= $request->getParam('auction');
			if ($args['action'] === 'crear') {
                # code...

                $create = $this->db->create()
                	->from('subasta')
                	->whereIn('id',array_keys($selected_auctions['id']))
                	->execute();

                # distinguir caso intentar crear subasta de un producto con el mismo id...

                	return $this->render($response, 'manageProducts.php', $args);

            } elseif ($args['action'] === 'borrar') {
				 $deleted= $this->db->delete()
				   ->from('subasta')
				   ->whereIn('id',array_keys($selected_auctions['id']))
				   ->execute();

				if($deleted > 0){
				   $allAuctions=$args['auctions'];
				   $updatedArgs=[];
				   foreach ( $allAuctions as $k => $v){
					 $flag=$allAuctions[$k]["id"];
					 if(!array_key_exists($flag,$selected_auctions['id']))
						 $updatedArgs[$k]=$v;
				   }
				   $args['auctions']=$updatedArgs;
				   $args['error'] = 'Se han borrado '.$deleted.' Productos';
				   return $this->render($response, 'manageProducts.php', $args);
				 }else{
					$args['error'] = 'Hubo un Problema al Borrar, intentelo de nuevo';
					return $this->render($response, 'manageProducts.php', $args);
			      }

			  }
        }

        return $this->render($response, 'manageProducts.php', $args);
    }

    private function fetchCategories()
    {
        return $this->db->select(array('id', 'nombre'))
            ->from('categoria')
            ->execute()
            ->fetchAll()
        ;
    }
}