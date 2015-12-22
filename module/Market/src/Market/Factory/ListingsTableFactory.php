<?php

namespace Market\Factory;

use Market\Model\ListingsTable;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ListingsTableFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        return new ListingsTable(
            ListingsTable::$tableName,
            $serviceManager->get('general-adapter')
        );
    }
}
