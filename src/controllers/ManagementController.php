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
				
            } elseif ($args['action'] === 'borrar') {
                $deleted=1;   
				foreach($selected_auctions['id'] as $k => $v){
				  if($deleted === 1)
				   $deleted= $this->db->delete()
				   ->from('subasta')
				   ->where('id','=',$k)
				   ->execute();
				}
			
				if($deleted > 0){
				   $allAuctions=$args['auctions'];	
				   $updatedArgs=[];
				   foreach ( $allAuctions as $k => $v){
					 $flag=$allAuctions[$k]["id"];   
					 if(!array_key_exists($flag,$selected_auctions['id'])) 
						 $updatedArgs[$k]=$v;					   
				   }
				   $args['auctions']=$updatedArgs;
				   return $this->render($response, 'manageAuctions.php', $args);
				 }else{
					
					//error
			      }
				
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