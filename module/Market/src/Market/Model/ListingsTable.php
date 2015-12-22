<?php

namespace Market\Model;

use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;

class ListingsTable extends TableGateway
{
    public static $tableName = 'listings';

    public function getTableName()
    {
        return self::$tableName;
    }

    public function getListingsByCategory($category)
    {
        return $this->select(array(
            'category' => $category
        ));
    }

    public function getListingsById($id)
    {
        return $this->select(array(
            'listings_id' => $id
        ))->current();
    }

    public function getLatestListing()
    {
        $select = new Select();
        $select
            ->from($this->getTableName())
            ->order('listings_id DESC')
            ->limit(1)
        ;
        return $this->selectWith($select)->current();
    }

    public function addPosting($data)
    {
        // Note that the form was not finished on the previous versions.
        // Complete it to see this full code working...
        if (isset($data['cityCode'])) {
            list($city, $country) = explode(",", $data['cityCode']);
            $data['city'] = trim($city);
            $data['country'] = trim($country);
        }

        $date = new \DateTime();

        if (isset($data['expires'])) {
            if ($data['expires'] == 30) {
                $date->add("P1M");
            } else {
                $date->add(new \DateInterval('P' . $data['expires'] . 'D'));
            }
        }

        $data['date_expires'] = $date->format("Y-,-d H:i:s");
        unset($data['cityCode'], $data['expires'], $data['captcha'], $data['submit']);

        $this->insert($data);
    }
}
