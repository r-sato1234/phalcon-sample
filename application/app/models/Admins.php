<?php
namespace Models;

use Phalcon\Mvc\Model\Behavior\Timestampable;
use Phalcon\Mvc\Model;

class Admins extends Model
{
    public $id;

    public $name;

    public $email;

    public $password;

    public $created_at;

    public $update_at;

    public function initialize()
    {
        $this->addBehavior(new Timestampable([
            'beforeValidationOnCreate' => [
                'field' => [
                    'created_at',
                    'updated_at'
                ],
                'format' => 'Y-m-d H:i:s'
            ],
            'beforeValidationOnUpdate' => [
                'field'  => 'updated_at',
                'format' => 'Y-m-d H:i:s'
            ],
        ]));
    }
}