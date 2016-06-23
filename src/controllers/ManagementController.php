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
                # code...
                $create = $this->db->create()
                	->from('subasta')
                	->whereIn('id',array_keys($selected_auctions['id']))
                	->execute();

                # distinguir caso intentar crear subasta de un producto con el mismo id...

                	return $this->render($response, 'manageAuctions.php', $args);
				
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