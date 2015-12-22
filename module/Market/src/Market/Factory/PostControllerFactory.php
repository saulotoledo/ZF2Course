<?php

namespace Market\Factory;

use Market\Controller\PostController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class PostControllerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        $allServices = $controllerManager->getServiceLocator();

        $categories = $allServices->get('categories');
        $postController = new PostController();
        $postController->setCategories($categories);
        $postController->setPostForm($allServices->get('market-post-form'));

        return $postController;
    }
}
