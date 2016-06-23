<?php

class ProductController extends AbstractController
{
    public function showProductAction($request, $response, $args)
    {
        $args['product'] = $this->db->select(array(
                'productos.nombre',
                'productos.foto',
                'productos.caducidad',
                'productos.marca',
                'productos.descripcion',
                'subasta.pujaMin',
                'subcategoria.nombre as subcategoria',
                'categoria.nombre as categoria',
            ))
            ->from('productos')
            ->join('productos', 'subasta.producto', '=', 'productos.id', 'INNER')
            ->join('subcategoria', 'productos.subcategoria', '=', 'subcategoria.id', 'INNER')
            ->join('categoria', 'subcategoria.categoria', '=', 'categoria.id', 'INNER')
            ->where('productos.id', '=', htmlspecialchars($args['id']))
            ->execute()
            ->fetch()
        ;

        if ($args['product']) {
            $args['title'] = $args['product']['nombre'];
            return $this->render($response, 'showProduct.php', $args);
        }

        return $response->withStatus(404);
    }

    public function listProductsAction($request, $response, $args)
    {
        if (isset($args['subcategory'])) {
            $args['title'] = 'Subastas de ' . $args['subcategory'];

            $args['topProducts'] = $this->db->select(array(
                    'subasta.id',
                    'productos.nombre',
                    'productos.foto',
                    'productos.caducidad',
                    'subasta.pujaMin'
                ))
                ->from('productos')
                ->join('productos', 'subasta.producto', '=', 'productos.id', 'INNER')
                ->join('subcategoria', 'productos.subcategoria', '=', 'subcategoria.id', 'INNER')
                ->where('subcategoria.nombre', '=', htmlspecialchars($args['subcategory']))
                ->orderBy('productos.nombre', 'ASC')
                ->execute()
                ->fetchAll()
            ;
        } elseif (isset($args['category'])) {
            $args['title'] = 'Subastas de ' . $args['category'];

            $args['topProducts'] = $this->db->select(array(
                    'subasta.id',
                    'productos.nombre',
                    'productos.foto',
                    'productos.caducidad',
                    'subasta.pujaMin'
                ))
               ->from('productos')
                ->join('productos', 'subasta.producto', '=', 'productos.id', 'INNER')
                ->join('subcategoria', 'productos.subcategoria', '=', 'subcategoria.id', 'INNER')
                ->join('categoria', 'subcategoria.categoria', '=', 'categoria.id', 'INNER')
                ->where('categoria.nombre', '=', htmlspecialchars($args['category']))
                ->orderBy('productos.nombre', 'ASC')
                ->execute()
                ->fetchAll()
            ;
        } else {
            $args['title'] = 'Productos destacados';

            $args['topProducts'] = $this->db->select(array(
                    'subasta.id',
                    'productos.nombre',
                    'productos.foto',
                    'productos.caducidad',
                    'subasta.pujaMin'
                ))
                ->from('productos')
                ->join('productos', 'subasta.producto', '=', 'productos.id', 'INNER')
                ->orderBy('productos.nombre', 'ASC')
                ->limit(20, 35)
                ->execute()
                ->fetchAll()
            ;
        }

        if ($args['topProducts']) {
            $args['categories'] = $this->fetchCategories();

            return $this->render($response, 'listProducts.php', $args);
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