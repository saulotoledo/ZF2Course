<?php
namespace Market\Form;

trait CategoryTrait
{
    protected $categories;

    public function getCategories()
    {
        return $this->categories;
    }

    public function setCategories($categories)
    {
        $this->categories = $categories;
        return $this;
    }
}
