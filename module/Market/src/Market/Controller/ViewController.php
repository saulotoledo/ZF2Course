<?php

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ViewController extends AbstractActionController
{
    public function indexAction()
    {
        $category = $this->params()->fromQuery('category');
        return new ViewModel(array(
            'category' => $category
        ));
    }

    public function itemAction()
    {
        $itemId = $this->params()->fromQuery('itemId');
        if (!$itemId) {
            $this->flashMessenger()->addMessage("Item Not Found");
            $this->redirect()->toRoute('market');
        }
        return new ViewModel(array(
            'itemId' => $itemId
        ));
    }
}
