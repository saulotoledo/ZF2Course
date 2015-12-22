<?php

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PostController extends AbstractActionController
{
    public $categories;
    private $postForm;

    public function setPostForm($postForm)
    {
        $this->postForm = $postForm;
    }

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function indexAction()
    {
        $data = $this->params()->fromPost();

        $viewModel = new ViewModel(array(
            'postForm' => $this->postForm,
            'data' => $data
        ));
        $viewModel->setTemplate('market/post/index.phtml');

        if ($this->getRequest()->isPost()) {
            $this->postForm->setData($data);
            if ($this->postForm->isValid()) {
                $this->flashMessenger()->addMessage("Thank you!");
                $this->redirect()->toRoute('home');
            } else {
                $invalidViewModel = new ViewModel();
                $invalidViewModel->setTemplate('market/post/invalid.phtml');
                $invalidViewModel->addChild($viewModel, 'main');
                return $invalidViewModel;
            }
        }

        return $viewModel;
    }
}
