<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;

class ContactForm extends Form
{
    public function initialize()
    {
        $this->add(
            new Text(
                "name"
            )
        );

        $this->add(
            new Text(
                "telephone"
            )
        );

        $this->add(
            new Select(
                "telephoneType",
                TelephoneTypes::find(),
                [
                    "using" => [
                        "id",
                        "name",
                    ]
                ]
            )
        );
    }
}
