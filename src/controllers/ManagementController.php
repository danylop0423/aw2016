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
            ->limit(15)
            ->execute()
            ->fetchAll()
        ;

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