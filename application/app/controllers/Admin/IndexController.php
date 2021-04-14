<?php
declare(strict_types=1);
namespace Controllers\Admin;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        // var_dump($this->session->get('auth'));
        // exit;
        echo $this->view->render("Admin/user", "index");
    }

}

