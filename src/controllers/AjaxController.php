<?php

class AjaxController extends AbstractAjaxController
{
    public function getSubcategoriesAction($request, $response, $args)
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

    public function getFilteredAuctionsAction($request, $response, $args)
    {
        $filters = $request->getParam('filters');

        if ($filters) {
            $auctions = $this->db->select(array('productos.nombre', 'productos.foto', 'productos.caducidad', 'subasta.pujaMin'))
                ->from('subasta')
                ->join('productos', 'subasta.producto', '=', 'productos.id', 'INNER')
                ->join('subcategoria', 'productos.subcategoria', '=', 'subcategoria.id', 'INNER')
                ->whereMany($filters, 'like')
                ->execute()
                ->fetchAll()
            ;

            return $this->renderJSON($response, $auctions);
        }

        return $response->withStatus(404);
    }
}
