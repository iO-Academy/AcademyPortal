<?php

declare(strict_types=1);


namespace Portal\Factories;


use Psr\Container\ContainerInterface;
use Slim\Views\PhpRenderer;

class PhpRendererFactory
{
    public function __invoke(ContainerInterface $container): PhpRenderer
    {
        $settings = $container->get('settings')['renderer'];
        return new PhpRenderer($settings['template_path']);
    }

}