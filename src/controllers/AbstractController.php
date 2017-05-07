<?php

class AbstractController
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

    public function render($response, $partial, $args)
    {
        $status = $response->getStatusCode();
        $argsKeys = join(', ', array_keys($args));

        $this->container->logger->info('Layout: DefaultLayout.php [' . $status . ']');
        $this->container->logger->info('Partial: ' . $partial . ' [' . $status . ']');
        $this->container->logger->info('Arguments: [' . $argsKeys . ']');

        return $this->container->renderer->renderPartial($response, $partial, $args);
    }

    public function renderTemplate($response, $template, $args)
    {
        $status = $response->getStatusCode();
        $argsKeys = join(', ', array_keys($args));

        $this->container->logger->info('Template: ' . $template . ' [' . $status . ']');
        $this->container->logger->info('Arguments: [' . $argsKeys . ']');

        return $this->container->renderer->render($response, $template, $args);
    }
}