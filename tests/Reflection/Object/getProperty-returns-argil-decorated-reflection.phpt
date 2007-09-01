--TEST--
Argil_Model_Reflection_Object::getProperty() returns an
Argil_Model_Reflection_Property object decorating the property
we've requested.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

class SampleReflectionObject
{
    public $publicProperty;
    protected $protectedProperty;
    private $privateProperty;
}

$reflection = new Argil_Model_Reflection_Object(
    new ReflectionObject(new SampleReflectionObject())
);
$property = $reflection->getProperty('publicProperty');
assert('$property instanceof Argil_Model_Reflection_Property');
assert('$property->getName() == "publicProperty"');

?>
===DONE===
--EXPECT--
===DONE===