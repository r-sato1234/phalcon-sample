<?php
declare(strict_types=1);
namespace Controllers\Admin;

use Models\Items;

class ItemsController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->items = Items::find();

        echo $this->view->render("Admin/item", "index");
    }

}

