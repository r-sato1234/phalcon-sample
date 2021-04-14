<?php

use Phalcon\Cli\Task;

class MainTask
{
    public function mainAction()
    {
        $robots = Robots::find();

        echo json_encode($robots);
    }

    /**
     * @param array $params
     */
    public function testAction($params)
    {
        echo sprintf(
            "hello %s",
            $params[0]
        );

        echo PHP_EOL;

        echo sprintf(
            "best regards, %s",
            $params[1]
        );

        echo PHP_EOL;
    }
}
