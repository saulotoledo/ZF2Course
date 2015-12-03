<?php

namespace Application\Helper;

use Zend\View\Helper\AbstractHelper;

class LeftLinks extends AbstractHelper
{
    public function __invoke($values, $urlPrefix)
    {
        $result = '<ul>' . PHP_EOL;
        foreach ($values as $item) {
            $result .= sprintf(
                '<li><a href="%s/%s">%s</a></li>' . PHP_EOL,
                $urlPrefix, $item, $item
            );
        }
        $result .= '</ul>' . PHP_EOL;

        return $result;
    }
}
