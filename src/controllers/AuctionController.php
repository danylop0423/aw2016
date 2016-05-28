<?php

class AuctionController extends AbstractController
{
    public function showAuctionAction($request, $response, $args)
    {
        $args['auction'] = $this->db->select(array(
                'productos.nombre',
                'productos.foto',
                'productos.caducidad',
                'productos.marca',
                'productos.descripcion',
                'subasta.pujaMin',
                'subcategoria.nombre as subcategoria',
                'categoria.nombre as categoria',
            ))
            ->from('subasta')
            ->join('productos', 'subasta.producto', '=', 'productos.id', 'INNER')
            ->join('subcategoria', 'productos.subcategoria', '=', 'subcategoria.id', 'INNER')
            ->join('categoria', 'subcategoria.categoria', '=', 'categoria.id', 'INNER')
            ->where('subasta.id', '=', htmlspecialchars($args['id']))
            ->execute()
            ->fetch()
        ;

        if ($args['auction']) {
            $args['title'] = $args['auction']['nombre'];
            return $this->render($response, 'showAuction.php', $args);
        }

        return $response->withStatus(404);
    }

    public function listAuctionsAction($request, $response, $args)
    {
        if (isset($args['subcategory'])) {
            $args['title'] = 'Subastas de ' . $args['subcategory'];

            $args['topAuctions'] = $this->db->select(array(
                    'subasta.id',
                    'productos.nombre',
                    'productos.foto',
                    'productos.caducidad',
                    'subasta.pujaMin'
                ))
                ->from('subasta')
                ->join('productos', 'subasta.producto', '=', 'productos.id', 'INNER')
                ->join('subcategoria', 'productos.subcategoria', '=', 'subcategoria.id', 'INNER')
                ->where('subcategoria.nombre', '=', htmlspecialchars($args['subcategory']))
                ->orderBy('productos.nombre', 'ASC')
                ->execute()
                ->fetchAll()
            ;
        } elseif (isset($args['category'])) {
            $args['title'] = 'Subastas de ' . $args['category'];

            $args['topAuctions'] = $this->db->select(array(
                    'subasta.id',
                    'productos.nombre',
                    'productos.foto',
                    'productos.caducidad',
                    'subasta.pujaMin'
                ))
               ->from('subasta')
                ->join('productos', 'subasta.producto', '=', 'productos.id', 'INNER')
                ->join('subcategoria', 'productos.subcategoria', '=', 'subcategoria.id', 'INNER')
                ->join('categoria', 'subcategoria.categoria', '=', 'categoria.id', 'INNER')
                ->where('categoria.nombre', '=', htmlspecialchars($args['category']))
                ->orderBy('productos.nombre', 'ASC')
                ->execute()
                ->fetchAll()
            ;
        } else {
            $args['title'] = 'Subastas destacadas';

            $args['topAuctions'] = $this->db->select(array(
                    'subasta.id',
                    'productos.nombre',
                    'productos.foto',
                    'productos.caducidad',
                    'subasta.pujaMin'
                ))
                ->from('subasta')
                ->join('productos', 'subasta.producto', '=', 'productos.id', 'INNER')
                ->orderBy('productos.nombre', 'ASC')
                ->limit(20, 35)
                ->execute()
                ->fetchAll()
            ;
        }

        if ($args['topAuctions']) {
            $args['categories'] = $this->db->select(array('nombre'))
                ->from('categoria')
                ->execute()
                ->fetchAll()
            ;

            return $this->render($response, 'listAuctions.php', $args);
        }

        return $response->withStatus(404);
    }
}