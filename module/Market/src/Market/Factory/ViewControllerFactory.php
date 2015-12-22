<?php

namespace Market\Factory;

use Market\Controller\ViewController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class ViewControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        $allServices = $controllerManager->getServiceLocator();

        //$categories = $allServices->get('categories');
        $viewController = new ViewController();
        //$viewController->setCategories($categories);
        //$viewController->setViewForm($allServices->get('market-post-form'));
        $viewController->setListingsTable($allServices->get('listings-table'));

        return $viewController;
    }
}
