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
                $user= $request->getAttribute('loggedUser');


                //Calculo de fechas finales e iniciales
                $diasSubasta = $auction['caducidad'] *(24*60*60); //en segundos
                $fechaActual = time();
                $fechaFin = $diasSubasta + $fechaActual;
                $fechaActual = date("Y-m-d H:i:s",$fechaActual);
                $fechaFin = date("Y-m-d H:i:s",$fechaFin);

                $auction['caducidad'] = $fechaFin;

                $auction['subastador'] = $user['id'];


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

        if ($request->isPost()) {
            $loggedUser = $request->getAttribute('loggedUser');
            if ($loggedUser) {
                if ($args['action'] === 'crear') {
                    $upload = $this->uploadImage($request);

                    if (!$upload['errors']) {
                        $product = $request->getParam('product');

                        $product['foto'] = '/assets/images/products/' . $upload['name'];
                        $product['estado'] = $product['estado'] === 'nuevo' ? 0 : 1;
                        $product['fecha_alta'] = date('Y-m-d H:m', time());

                        $id = $this->db->insert(array_keys($product))
                            ->into('productos')
                            ->values(array_values($product))
                            ->execute()
                        ;

                        if ($id) {
                            $args['error'] = '¡Producto añadido correctamente!';
                        }
                    } else {
                        $args['error'] = $upload['errors'];
                    }
                } elseif ($args['action'] === 'borrar') {
                    $products = $request->getParam('products');

                    $deleted = $this->db->delete()
                       ->from('productos')
                       ->whereIn('id', array_keys($products['id']))
                       ->execute()
                    ;

                    $args['error'] = '¡' . $deleted . ' productos borrados!';
                }
            } else {
                $args['error'] = 'No estas registrado';
            }
        }

        $args['products'] = $this->fetchLoggedUserProducts();

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

    private function fetchLoggedUserProducts()
    {
        return $this->db->select(array('p.id', 'p.nombre', 'p.foto', 'p.marca', 'p.descripcion', 's.nombre subcategoria', 's.id subcategoria_id', 'c.nombre categoria'))
            ->from('productos p')
            ->join('subcategoria s', 'p.subcategoria', '=', 's.id')
            ->join('categoria c', 's.categoria', '=', 'c.id')
            // ->where('producto.subastador', '=', $request->getAttribute('loggedUser')['id'])
            ->limit(25)
            ->execute()
            ->fetchAll()
        ;
    }

    private function uploadImage($request)
    {
        $fileKey = array_keys($request->getUploadedFiles())[0];
        $path = __DIR__ . '/../../public/assets/images/products';

        $storage = new \Upload\Storage\FileSystem($path);
        $file = new \Upload\File($fileKey, $storage);

        $file->setName($this->generateRandomName());

        $file->addValidations(array(
            new \Upload\Validation\Mimetype(array('image/png', 'image/jpg', 'image/jpeg')),
            new \Upload\Validation\Size('3M')
        ));

        $data = array(
            'name'       => $file->getNameWithExtension(),
            'extension'  => $file->getExtension(),
            'mime'       => $file->getMimetype(),
            'size'       => $file->getSize(),
            'dimensions' => $file->getDimensions(),
            'errors'     => false,
        );

        try {
            $file->upload();
        } catch (\Exception $e) {
            $data['errors'] = $file->getErrors();
        }

        return $data;
    }

    private function generateRandomName()
    {
        return substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 20)), 0, 20);
    }
}
