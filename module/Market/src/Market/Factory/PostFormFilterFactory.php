<?php

namespace Market\Factory;

use Market\Form\PostForm;
use Market\Form\PostFormFilter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PostFormFilterFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $filter = new PostFormFilter();
        $filter->setCategories($serviceManager->get('categories'));
        $filter->setExpireDays($serviceManager->get('market-expire-days'));
        $filter->buildFilter();

        return $filter;
    }
}
