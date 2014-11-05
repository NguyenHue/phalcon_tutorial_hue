<?php

class UserController extends ControllerBase
{
    public function registerAction()
    {
        if ($this->request->isPost()) {
            $user = new Users();
            // Store and check for errors
            $success = $user->save(
                $this->request->getPost(),
                array('name', 'email')
            );

            if ($success) {
                $this->response->redirect("user/index?page=1");
            } else {
                $errorMessage = array();
                foreach ($user->getMessages() as $message) {
                    $errorMessage[] = $message->getMessage();
                }
                $this->view->setVar("errorMessage", $errorMessage);

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