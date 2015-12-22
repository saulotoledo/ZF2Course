<?php

namespace Market\Controller;
use Market\Model\ListingsTable;

trait ListingsTableTrait
{
    private $listingsTable;

    public function setListingsTable(ListingsTable $listingsTable)
    {
        $this->listingsTable = $listingsTable;
        return $this;
    }


}
