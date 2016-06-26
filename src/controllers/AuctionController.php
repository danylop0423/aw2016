<?php

class AuctionController extends AbstractController
{
    public function showAuctionAction($request, $response, $args)
    {
        $args['auction'] = $this->db->select(array(
                'productos.nombre',
                'productos.foto',
                'subasta.caducidad',
                'productos.marca',
                'productos.descripcion',
                'subasta.pujaMin',
                'subcategoria.nombre as subcategoria',
                'categoria.nombre as categoria',
                'usuarios.id as subastador_id',
                'usuarios.nombre as subastador_nombre',
                'usuarios.apellido as subastador_apellido',
                'usuarios.foto as subastador_foto',
            ))
            ->from('subasta')
            ->join('productos', 'subasta.producto', '=', 'productos.id', 'INNER')
            ->join('subcategoria', 'productos.subcategoria', '=', 'subcategoria.id', 'INNER')
            ->join('categoria', 'subcategoria.categoria', '=', 'categoria.id', 'INNER')
             ->join('usuarios', 'subasta.subastador', '=', 'usuarios.id', 'INNER')
            ->where('subasta.id', '=', $args['id'])
            ->execute()
            ->fetch()
        ;

        if ($args['auction']) {
            $args['title'] = $args['auction']['nombre'];

            $args['reviews'] = $this->db->select(array('c.texto as texto', 'u.nombre as origen'))
                ->from('comentarios c')
                ->join('usuarios u', 'c.origen', '=', 'u.id', 'INNER')
                ->where('c.destino', '=', $args['auction']['subastador_id'])
                ->execute()
                ->fetchAll()
            ;

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
                    'subasta.caducidad',
                    'subasta.pujaMin'
                ))
                ->from('subasta')
                ->join('productos', 'subasta.producto', '=', 'productos.id', 'INNER')
                ->join('subcategoria', 'productos.subcategoria', '=', 'subcategoria.id', 'INNER')
                ->where('subcategoria.nombre', '=', $args['subcategory'])
                ->where('subasta.caducidad', '>', date('Y-m-d H:i'))
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
                    'subasta.caducidad',
                    'subasta.pujaMin'
                ))
               ->from('subasta')
                ->join('productos', 'subasta.producto', '=', 'productos.id', 'INNER')
                ->join('subcategoria', 'productos.subcategoria', '=', 'subcategoria.id', 'INNER')
                ->join('categoria', 'subcategoria.categoria', '=', 'categoria.id', 'INNER')
                ->where('categoria.nombre', '=', $args['category'])
                ->where('subasta.caducidad', '>', date('Y-m-d H:i'))
                ->orderBy('productos.nombre', 'ASC')
                ->execute()
                ->fetchAll()
            ;
        } else {
            $args['title'] = 'Subastas destacadas';
            $products = array(
                    'subasta.id',
                    'productos.nombre',
                    'productos.foto',
                    'subasta.caducidad',
                    'subasta.pujaMin'
                );
            $args['topAuctions'] = $this->db->select($products)
                ->from('subasta')
                ->join('productos', 'subasta.producto', '=', 'productos.id', 'INNER')
                ->where('subasta.caducidad', '>', date('Y-m-d H:i'))
                ->orderBy('productos.nombre', 'DESC')
                ->limit(20, 35)
                ->execute()
                ->fetchAll()
            ;
            shuffle($args['topAuctions']);
        }

        if ($args['topAuctions']) {
            $args['categories'] = $this->fetchCategories();

            return $this->render($response, 'listAuctions.php', $args);
        }

        return $response->withStatus(404);
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