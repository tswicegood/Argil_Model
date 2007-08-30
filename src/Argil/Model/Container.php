<?php

/**
 * @todo cache property mapping so this doesn't go through everything on every get/set request
 */
class Argil_Model_Container
{
    private $_contained = array();
    private $_dirty = array();
    
    public function __construct()
    {
        $args = func_get_args();
        foreach ($args as $object) {
            $this->_contained[get_class($object)] = $object;
        }
    }
    
    public function is($name)
    {
        return isset($this->_contained[$name]);
    }
    
    public function revert()
    {
        $this->_dirty = array();
    }
    
    public function __get($key)
    {
        if (isset($this->_dirty[$key])) {
            return $this->_dirty[$key]['value'];
        }
        foreach ($this->_contained as $name => $model) {
            $vars = get_object_vars($model);
            if (isset($vars[$key])) {
                return $model->$key;
            }
        }
    }
    
    public function __set($key, $value)
    {
        foreach ($this->_contained as $name => $model) {
            $vars = get_object_vars($model);
            if (isset($vars[$key])) {
                $this->_dirty[$key] = array(
                    'model' => $name,
                    'value' => $value,
                );
                return;
            }
        }
        
        throw new Argil_Model_Container_UnknownPropertyException(
            'attempted to set an unknown property: foo',
            array($key => $value)
        );
    }
}

class Argil_Model_Container_UnknownPropertyException extends PEAR_Exception { }