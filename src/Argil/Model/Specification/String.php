<?php

class Argil_Model_Specification_String extends Argil_Model_Specification_Abstract
{
    public function __construct($value)
    {
        $this->_valid = (
            is_string($value) ||
            (is_object($value) && method_exists($value, '__toString'))
        );
    }
}