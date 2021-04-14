<?php
namespace Controllers;

class SessionController extends ControllerBase
{
    // ...
    public function initialize()
    {
        parent::initialize();

        $this->tag->setTitle('Sign Up/Sign In');
    }

    private function _registerSession($user)
    {
        $this->session->set(
            'auth',
            [
                'id'   => $user->id,
                'name' => $user->name,
            ]
        );
    }

    public function indexAction()
    {

    }

    /**
     * このアクションはユーザーを認証しアプリケーションにログインさせる
     */
    public function startAction()
    {
        if ($this->request->isPost()) {
            // POSTで送信された変数を受け取る
            $email    = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            // データベースからユーザーを検索
            $user = Users::findFirst(
                [
                    "(email = :email: OR username = :email:) AND password = :password: AND active = 'Y'",
                    'bind' => [
                        'email'    => $email,
                        'password' => sha1($password),
                    ]
                ]
            );
            var_dump($user);
            exit;

            if ($user !== false) {
                $this->_registerSession($user);

                $this->flash->success(
                    'Welcome ' . $user->name
                );

                // ユーザーが有効なら、'invoices' コントローラーに転送する
                return $this->dispatcher->forward(
                    [
                        'controller' => 'invoices',
                        'action'     => 'index',
                    ]
                );
            }

            $this->flash->error(
                'Wrong email/password'
            );
        }

        // ログインフォームへ再度転送
        return $this->dispatcher->forward(
            [
                'controller' => 'session',
                'action'     => 'index',
            ]
        );
    }
}
