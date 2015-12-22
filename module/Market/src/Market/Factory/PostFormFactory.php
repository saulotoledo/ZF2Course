<?php

namespace Market\Factory;

use Market\Form\PostForm;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PostFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $form = new PostForm();
        $form->setCategories($serviceManager->get('categories'));
        $form->setExpireDays($serviceManager->get('market-expire-days'));
        $form->setCaptchaOptions($serviceManager->get('market-captcha-options'));
        $form->setInputFilter($serviceManager->get('market-post-filter'));
        $form->buildForm();

        return $form;
    }
}
