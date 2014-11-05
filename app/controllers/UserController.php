<?php

class UserController extends ControllerBase
{
    public function signupAction()
    {
        
    }
    public function registerAction()
    {
        $user = new Users();
        // Store and check for errors
        $success = $user->save(
            $this->request->getPost(),
            array('name', 'email')
        );

        if ($success) {
            $this->response->redirect("user/index?page=1");
        } else {
            foreach ($user->getMessages() as $message) {
                $this->view->setVar("message", $message);
            }
        }
    }

    public function indexAction()
    {
        $request = new Phalcon\Http\Request();

        $currentUser = $request->get("page");

        $user = new Users();
        $users = Users::find();
        
        // Create a Model paginator, show 5 rows by page starting from $currentPage
        $paginator = new \Phalcon\Paginator\Adapter\Model(
            array(
                "data" => $users,
                "limit"=> 5,
                "page" => $currentUser
            )
        );

        // Get the paginated results
        $page = $paginator->getPaginate();
        $this->view->setVar("page", $page);
    }

}