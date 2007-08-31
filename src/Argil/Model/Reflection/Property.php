<?php

class Argil_Model_Reflection_Property
{
    private $_decorated = null;
    
    public function __construct(ReflectionProperty $reflection)
    {
        $this->_decorated = $reflection;
    }
    
    public function isValid($value)
    {
        $doc = $this->_decorated->getDocComment();
        preg_match('/@is ([^\s]+)/', $doc, $matches);
        $specification_name = 'Argil_Model_Specification_' . ucfirst($matches[1]);
        $specification = new $specification_name($value);
        return $specification->isValid();
    }
    
    /**
     * @todo decorate all methods for documentation/reflection purposes instead
     *       of using the __call() cheat
     */
    public function __call($method, $arguments)
    {
        return call_user_func_array(
            array($this->_decorated, $method),
            $arguments
        );
    }
}