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

// TODO: Add more tests that require the loading of a Specification object

?>
===DONE===
--EXPECT--
===DONE===