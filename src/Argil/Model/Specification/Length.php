<?php

class Argil_Model_Specification_Length extends Argil_Model_Specification_Abstract
{
    public function __construct($value, $p1, $p2 = null)
    {
        if (!is_numeric($p1)) {
            switch ($p1) {
                case '<' :
                    $this->_valid = strlen($value) < $p2;
                    break;
                case '>' :
                    $this->_valid = strlen($value) > $p2;
                    break;
                case '>=' :
                    $this->_valid = strlen($value) >= $p2;
                    break;
                case '<=' :
                    $this->_valid = strlen($value) <= $p2;
                    break;
                case '<>' :
                case '!=' :
                    $this->_valid = strlen($value) <> $p2;
                    break;
            }
        } else {
            $this->_valid = strlen($value) == $p1;
        }
    }
}