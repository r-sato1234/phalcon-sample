<?php

use Phalcon\Loader;
use Phalcon\Mvc\Micro;
use Phalcon\Di\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Mysql as MysqlAdapter;


// $loader = new Loader();
// $loader->registerNamespaces(
//     [
//         'Store\Toys' => __DIR__ . '/models/',
//     ]
// );
// $loader->register();
$di = new FactoryDefault();
// Set up the database service
$di->set(
    'db',
    function () {
        return new DbAdapter(
            [
                'host'     => 'mysql',
                'username' => 'root',
                'password' => 'root',
                'dbname' => 'phalcon_app',
            ]
        );
    }
);
// Create and bind the DI to the application
$app = new Micro($di);

$app->get(
    '/api/robots',
    function () use ($app) {
        $phql = 'SELECT * FROM Store\Toys\Robots ORDER BY name';
        $robots = $app->modelsManager->executeQuery($phql);
        $data = [];
        foreach ($robots as $robot) {
            $data[] = [
                'id' => $robot->id,
                'name' => $robot->name,
            ];
        }
        echo json_encode($data);
    }
);

// $app->handle();
