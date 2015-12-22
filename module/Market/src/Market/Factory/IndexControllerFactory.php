<?php

namespace Market\Factory;

use Market\Controller\IndexController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class IndexControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        $allServices = $controllerManager->getServiceLocator();

        //$categories = $allServices->get('categories');
        $indexController = new IndexController();
        //$indexController->setCategories($categories);
        //$indexController->setIndexForm($allServices->get('market-post-form'));
        $indexController->setListingsTable($allServices->get('listings-table'));

        return $indexController;
    }
}
