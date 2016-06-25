<?php

class AjaxController extends AbstractAjaxController
{
    public function fetchSubcategoriesAction($request, $response, $args)
    {
        $category = $request->getParam('category');

        if ($category) {
            $categories = $this->db->select(array('subcategoria.id', 'subcategoria.nombre'))
                ->from('subcategoria')
                ->join('categoria', 'subcategoria.categoria', '=', 'categoria.id', 'INNER')
                ->where('categoria.id', '=', htmlspecialchars($category))
                ->orWhere('categoria.nombre', 'like', htmlspecialchars($category))
                ->execute()
                ->fetchAll()
            ;

            return $this->renderJSON($response, $categories);
        }

        return $response->withStatus(404);
    }

    public function fetchFilteredAuctionsAction($request, $response, $args)
    {
        $filters = $request->getParam('filters');

        if ($filters) {
            if (isset($filters['subasta.pujaMin'])) {
                $auctions = $this->filterAuctionsByPrice($filters);
            } else {
                $auctions = $this->db->select(array('subasta.id', 'productos.nombre', 'productos.foto', 'subasta.caducidad', 'subasta.pujaMin'))
                    ->from('subasta')
                    ->join('productos', 'subasta.producto', '=', 'productos.id', 'INNER')
                    ->join('subcategoria', 'productos.subcategoria', '=', 'subcategoria.id', 'INNER')
                    ->join('categoria', 'subcategoria.categoria', '=', 'categoria.id', 'INNER')
                    ->whereMany($filters, 'like')
                    ->orderBy('productos.nombre', 'ASC')
                    ->execute()
                    ->fetchAll()
                ;
            }

            return $this->renderJSON($response, $auctions);
        }

        return $response->withStatus(404);
    }

    public function makeBidAction($request, $response, $args)
    {
        $bid = $request->getParam('bid');
        $auctionId = $request->getParam('auction');
        $loggedUser = $request->getAttribute('loggedUser') || false;

        if ($loggedUser) {
            if ($this->isWinnerBid($auctionId, $bid)) {
                $args['error'] = false;
                $this->saveBid($auctionId, $loggedUser['id'], $bid);
            } else {
                $args['error'] = '¡Fallo al registrar la puja!';
            }
        } else {
            $args['error'] = '¡Debes iniciar sesión primero!';
        }

        return $this->renderJSON($response, $args);
    }

    public function updateProductAction($request, $response, $args)
    {
        $product = $request->getParam('product');

        if ($product) {
            if (isset($product['foto'])) {
                $product['foto'] = '/assets/images/products/' . $product['foto'];
            }

            $updateResponse = $this->db->update($product)
                ->table('productos')
                ->where('id', '=', $product['id'])
                ->execute()
            ;

            if ($updateResponse) {
                $args['response'] = '¡Producto actualizado correctamente!';
            } else {
                $args['response'] = '¡El producto no se actualizó!';
            }

            return $this->renderJSON($response, $args);
        }

        return $response->withStatus(404);
    }

    public function uploadProductImageAction($request, $response, $args)
    {
        $upload = $this->uploadImage($request);

        if (!$upload['errors']) {
            $args['foto'] = $upload['name'];
        } else {
            $args['error'] = $upload['errors'];
        }

        return $this->renderJSON($response, $args);
    }


    public function updateSubastaAction($request, $response, $args)
    {
        $subasta = $request->getParam('auction');

        //Cambiamos las comas por puntos
        $subasta['pujaMin'] = str_replace(",", ".", $subasta['pujaMin']);
        //var_dump($subasta); die;

        if ($subasta) {
            $updateResponse = $this->db->update($subasta)
                ->table('subasta')
                ->where('id', '=', $subasta['id'])
                ->execute()
            ;

            if ($updateResponse) {
                $args['response'] = '¡Subasta modificada correctamente!';
            } else {
                $args['response'] = '¡No se ha podido modificar subasta!';
            }

            return $this->renderJSON($response, $args);
        }

        return $response->withStatus(404);
    }

    private function filterAuctionsByPrice($filters)
    {
        $bid = $filters['subasta.pujaMin'];
        unset($filters['subasta.pujaMin']);

        return $this->db->select(array('subasta.id', 'productos.nombre', 'productos.foto', 'subasta.caducidad', 'subasta.pujaMin'))
            ->from('subasta')
            ->join('productos', 'subasta.producto', '=', 'productos.id', 'INNER')
            ->join('subcategoria', 'productos.subcategoria', '=', 'subcategoria.id', 'INNER')
            ->join('categoria', 'subcategoria.categoria', '=', 'categoria.id', 'INNER')
            ->whereMany($filters, 'like')
            ->where('subasta.pujaMin', '<', $bid)
            ->orderBy('productos.nombre', 'ASC')
            ->execute()
            ->fetchAll()
        ;
    }

    private function isWinnerBid($auctionId, $bid)
    {
        // $winnerBid = $this->db->select()
        //     ->from('pujas')
        //     ->where('producto', '=', $auctionId)
        //     ->having('ultimaPuja', '>=', $bid)
        //     ->execute()
        //     ->fetchAll()
        // ;

        return false;
    }

    private function saveBid($auctionId, $loggedUserId, $bid)
    {
        return $this->db->insert(array('usuario', 'producto', 'ultimaPuja'))
           ->into('pujas')
           ->values($loggedUserId, $auctionId, $bid)
           ->execute()
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
