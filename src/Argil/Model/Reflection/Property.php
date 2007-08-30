<?php

class Argil_Model_Reflection_Property
{
    private $_decorated = null;
    
    public function __construct(ReflectionProperty $reflection)
    {
        $this->_decorated = $reflection;
    }
    
    /**
     * @todo refactor to use Specification object
     */
    public function isValid($value)
    {
        $doc = $this->_decorated->getDocComment();
        preg_match('/@is ([^\s]+)/', $doc, $matches);
        switch ($matches[1]) {
            case 'string' :
                return is_string($value);
            
            case 'int' :
                return is_int($value);
        }
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