<?php
// Configuration for Slim Dependency Injection Container

$container = $app->getContainer();

// Using Twig as template engine
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('../templates/interface', [
        'cache' => false //'cache'
    ]);
    $view->addExtension(new \Slim\Views\TwigExtension(
        $container['router'],
        $container['request']->getUri()
    ));

    return $view;
};

// Homepage Controller
$container['BL00B1RD\Controller\HomepageController'] = function ($c) {
    return new BL00B1RD\Controller\HomepageController($c);
};