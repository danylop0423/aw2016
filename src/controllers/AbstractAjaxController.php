<?php

class AbstractAjaxController
{
    protected $container;
    protected $db;

    public function __construct($container)
    {
        $this->container = $container;
        $this->db = $this->container->db;

        $method = $this->container->request->getMethod();
        $url = $this->container->request->getUri();
        $agent = $this->container->request->getServerParams()['HTTP_USER_AGENT'];

        $this->container->logger->info('Route: ' . $url . ' [' . $method . ']');
        $this->container->logger->info('Agent: ' . $agent);
    }

    public function executeAction($request, $response, $args)
    {
        if ($request->isXhr()) {
            $method = isset($args['method']) ? $args['method'] . 'Action' : false;

            if ($method && method_exists($this, $method)) {
                unset($args['method']);
                return $this->$method($request, $response, $args);
            }
        }

        return $response->withStatus(404);
    }

    protected function renderJSON($response, $args)
    {
        return $response->withStatus(200)
            ->withHeader('Content-Type', 'application/json')
            ->write(json_encode($args))
        ;
    }

    protected function render($response, $template, $args)
    {
        $status = $response->getStatusCode();
        $argsKeys = join(', ', array_keys($args));

        $this->container->logger->info('Template: ' . $template . ' [' . $status . ']');
        $this->container->logger->info('Arguments: [' . $argsKeys . ']');

        return $this->container->renderer->render($response, $template, $args);
    }
}
