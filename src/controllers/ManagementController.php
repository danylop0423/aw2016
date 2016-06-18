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
            if ($args['action'] === 'crear') {
                # code...
            } elseif ($args['action'] === 'borrar') {
                # code...
            }
        }

        return $this->render($response, 'manageAuctions.php', $args);
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