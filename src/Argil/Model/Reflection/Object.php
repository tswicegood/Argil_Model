<?php

/**
 * @todo make a real decorator instead of relying on __call() hack
 */
class Argil_Model_Reflection_Object
{
    private $_decorated = null;
    
    public function __construct(ReflectionObject $object)
    {
        $this->_decorated = $object;
    }
    
    public function getProperty($name)
    {
        return new Argil_Model_Reflection_Property(
            $this->_decorated->getProperty($name)
        );
    }
    
    public function getProperties()
    {
        return array();
    }
    
    public function __call($method, $arguments)
    {
        return call_user_func_array(
            array($this->_decorated, $method),
            $arguments
        );
    }
}