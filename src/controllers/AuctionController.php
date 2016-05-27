<?php

class AuctionController extends AbstractController
{
    public function showAuctionAction($request, $response, $args)
    {
        $args['title'] = 'Apple Watch Sport 38mm';

        return $this->render($response, 'showAuction.php', $args);
    }

    public function listAuctionsAction($request, $response, $args)
    {
        if (isset($args['subcategory'])) {
            $args['title'] = 'Subastas ' . $args['subcategory'];
        } elseif (isset($args['category'])) {
            $args['title'] = 'Subastas ' . $args['category'];
        } else {
            $args['title'] = 'Subastas destacadas';
        }

        $args['categories'] = $this->db->select(array('nombre'))
            ->from('categoria')
            ->execute()
            ->fetchAll()
        ;

        $args['topAuctions'] = $this->db->select(array('subasta.id', 'productos.nombre', 'productos.foto', 'productos.caducidad', 'subasta.pujaMin'))
            ->from('subasta')
            ->join('productos', 'subasta.producto', '=', 'productos.id', 'INNER')
            ->orderBy('productos.nombre', 'ASC')
            ->limit(20, 35)
            ->execute()
            ->fetchAll()
        ;

        return $this->render($response, 'listAuctions.php', $args);
    }
}