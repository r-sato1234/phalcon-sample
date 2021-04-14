<?php
namespace Controllers\Admin;

use Models\Admins;

class SessionController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();

        $this->tag->setTitle('Sign Up/Sign In');
    }

    private function _registerSession($admin)
    {
        $this->session->set(
            'auth',
            [
                'id'   => $admin->id,
                'name' => $admin->name,
            ]
        );
    }

    public function indexAction()
    {

        echo $this->view->render("Admin/session", "index");
    }

    /**
     * このアクションはユーザーを認証しアプリケーションにログインさせる
     */
    public function loginAction()
    {
        try {
            if ($this->request->isPost()) {
                // if (!$this->security->checkToken()) {
                //     throw new \Exception("CSRFトークンが無効です");
                // }
                // POSTで送信された変数を受け取る
                $email    = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                // データベースからユーザーを検索
                $admin = Admins::findFirstByEmail($email);
                if ($admin) {
                    if (!$this->security->checkHash($password, $admin->password)) {
                        throw new \Exception("パスワードが無効です");
                    }
                    $this->_registerSession($admin);

                    $this->flash->success('ログインに成功しました');

                    return $this->dispatcher->forward(
                        [
                            'controller' => 'index',
                            'action'     => 'index',
                        ]
                    );
                } else {
                    // タイミング攻撃への対応 ユーザーの有無に関わらず、
                    // このスクリプトは常にハッシュ計算と
                    // 同程度の時間をかける
                    $this->security->hash(rand());
                }

                throw new \Exception("ログインに失敗しました");
            }
        } catch (\Exception $e) {
            $this->flash->error($e->getMessage());
        }

        return $this->dispatcher->forward(
            [
                'controller' => 'session',
                'action'     => 'index',
            ]
        );
    }
}
