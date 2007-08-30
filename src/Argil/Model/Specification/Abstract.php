<?php

abstract class Argil_Model_Specification_Abstract implements Argil_Model_Specification
{
    protected $_valid = false;
    
    public function isValid()
    {
        return $this->_valid;
    }
}