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
            $args['categories'] = $this->fetchCategories();

            return $this->render($response, 'listAuctions.php', $args);
        }

        return $response->withStatus(404);
    }

    public function manageAuctionsAction($request, $response, $args)
    {
        $args['title'] = 'Gestión de subastas';
        $args['categories'] = $this->fetchCategories();

        return $this->render($response, 'manageAuctions.php', $args);
    }


    public function createAuctionAction($request, $response, $args){





        return $this->render($response, '/profile.php', $args);

    }

    public function uploadImageAction($request, $response, $args){




        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }




        return $this->render($response, 'uploadImage.php', $args);

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