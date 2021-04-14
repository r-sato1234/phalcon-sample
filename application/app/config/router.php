<?php

use Phalcon\Mvc\Router\Annotations as RouterAnnotations;

$di['router'] = function () {
    // Use the annotations router. We're passing false as we don't want the router to add its default patterns
    $router = new RouterAnnotations(false);

    $router->addResource('Robots', '/api/robots');

    $router->add(
        '/signup',
        [
            'namespace'  => 'Controllers',
            'controller' => 'signup',
            'action'     => 'index',
        ]
    );

    $router->add(
        '/session',
        [
            'controller' => 'session',
            'action'     => 'index',
        ]
    );

    $router->add(
        '/session/index',
        [
            'controller' => 'session',
            'action'     => 'index',
        ]
    );

    $router->add(
        '/session/start',
        [
            'controller' => 'session',
            'action'     => 'start',
        ]
    );

    $router->add(
        '/contact/index',
        [
            'controller' => 'contact',
            'action'     => 'index',
        ]
    );

    $router->add(
        "/admin",
        [
            'namespace'  => 'Controllers\Admin',
            "controller" => "index",
            "action"     => "index",
        ]
    );

    $router->add(
        "/admin/session",
        [
            'namespace'  => 'Controllers\Admin',
            "controller" => "session",
            "action"     => "index",
        ]
    );

    $router->add(
        '/admin/session/login',
        [
            'namespace'  => 'Controllers\Admin',
            'controller' => 'session',
            'action'     => 'login',
        ]
    );

    $router->add(
        '/admin/signup',
        [
            'namespace'  => 'Controllers\Admin',
            'controller' => 'signup',
            'action'     => 'index',
        ]
    );

    $router->add(
        '/admin/signup/register',
        [
            'namespace'  => 'Controllers\Admin',
            'controller' => 'signup',
            'action'     => 'register',
        ]
    );

    $router->add(
        '/admin/items',
        [
            'namespace'  => 'Controllers\Admin',
            'controller' => 'items',
            'action'     => 'index',
        ]
    );

    // いずれのルートにもマッチしなかった場合
    $router->notFound(array(
        "controller" => "index",
        "action" => "404"
    ));

    return $router;
};