<?php

class AjaxController extends AbstractAjaxController
{
    public function fetchSubcategoriesAction($request, $response, $args)
    {
        $category = $request->getParam('category');

        if ($category) {
            $categories = $this->db->select(array('subcategoria.nombre'))
                ->from('subcategoria')
                ->join('categoria', 'subcategoria.categoria', '=', 'categoria.id', 'INNER')
                ->where('categoria.nombre', 'like', htmlspecialchars($category))
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
                $auctions = $this->db->select(array('subasta.id', 'productos.nombre', 'productos.foto', 'productos.caducidad', 'subasta.pujaMin'))
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

    private function filterAuctionsByPrice($filters)
    {
        $bid = $filters['subasta.pujaMin'];
        unset($filters['subasta.pujaMin']);

        return $this->db->select(array('subasta.id', 'productos.nombre', 'productos.foto', 'productos.caducidad', 'subasta.pujaMin'))
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
}
