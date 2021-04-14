<?php
namespace Controllers\Admin;

use Models\Admins;
use Phalcon\Mvc\Controller;

class SignupController extends Controller
{
    public function indexAction()
    {
        echo $this->view->render("Admin/signup", "index");
    }

    public function registerAction()
    {
        $admin = new Admins();
        $admin->name = $this->request->getPost('name');
        $admin->email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $admin->password = $this->security->hash($password);
        $success = $admin->save();

        if ($success) {
            echo "Thanks for registering!";
        } else {
            echo "Sorry, the following problems were generated: ";

            $messages = $admin->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        $this->view->disable();
    }
}
