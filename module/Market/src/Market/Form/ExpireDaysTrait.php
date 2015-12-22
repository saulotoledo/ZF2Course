<?php
namespace Market\Form;

trait ExpireDaysTrait
{
    protected $expireDays;

    public function getExpireDays()
    {
        return $this->expireDays;
    }

    public function setExpireDays($expireDays)
    {
        $this->expireDays = $expireDays;
    }
}
