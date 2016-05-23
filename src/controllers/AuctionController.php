<?php

class AuctionController extends AbstractController
{
    public function showAuctionAction($request, $response, $args)
    {
        $args['title'] = 'Apple Watch Sport 38mm';

        return $this->render($response, 'showAuction.php', $args);
    }
}