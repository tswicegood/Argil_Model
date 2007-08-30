--TEST--
Argil_Model_Reflection_Property uses annotations on the given
property to determine whether it is valid or not.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

class ArgilReflectableClass
{
    /**
     * @is string
     */
    public $stringOnly = '';
    
    /**
     * @is int
     */
    public $intOnly = 123;
    
    /**
     * @is AlwaysFalse
     */
    public $neverPasses = true;
    
    /**
     * @is IceRing
     */
    public $onlyWhen = '';
}

$reflection = new Argil_Model_Reflection_Property(
    new ReflectionProperty('ArgilReflectableClass', 'stringOnly')
);

assert('$reflection->isValid("Hello World")');
assert('$reflection->isValid("123")');
assert('!$reflection->isValid(123)');

$reflection = new Argil_Model_Reflection_Property(
    new ReflectionProperty('ArgilReflectableClass', 'intOnly')
);
assert('!$reflection->isValid("Hello World")');
assert('!$reflection->isValid("123")');
assert('$reflection->isValid(123)');


class Argil_Model_Specification_AlwaysFalse implements Argil_Model_Specification
{
    public function isValid()
    {
        return false;
    }
}

$reflection = new Argil_Model_Reflection_Property(
    new ReflectionProperty('ArgilReflectableClass', 'neverPasses')
);
assert('!$reflection->isValid(true)');
assert('!$reflection->isValid(false)');


class Argil_Model_Specification_IceRing extends Argil_Model_Specification_Abstract
{
    public function __construct($value)
    {
        $this->_valid = $value == "when hell freezes over";
    }
}

$reflection = new Argil_Model_Reflection_Property(
    new ReflectionProperty('ArgilReflectableClass', 'onlyWhen')
);

assert('!$reflection->isValid("when pigs fly")');
assert('$reflection->isValid("when hell freezes over")');

?>
===DONE===
--EXPECT--
===DONE===