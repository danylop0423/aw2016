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

        return $this->render($response, 'listAuctions.php', $args);
    }
}