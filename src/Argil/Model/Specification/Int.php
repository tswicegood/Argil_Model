<?php

class Argil_Model_Specification_Int extends Argil_Model_Specification_Abstract
{
    public function __construct($value)
    {
        $this->_valid = is_int($value);
    }
}