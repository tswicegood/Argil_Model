--TEST--
Argil_Model_Reflection_Object::getProperties() returns an array
or ArrayAccess object
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
$properties = $reflection->getProperties();

assert('is_array($properties) || $properties instanceof ArrayAccess');

?>
===DONE===
--EXPECT--
===DONE===