--TEST--
Argil_Model_Reflection_Property decorates the core ReflectionProperty
object
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

class ArgilReflectableObject
{
    public $publicProperty;
    protected $protectedProperty;
    private $privateProperty;
}

$reflection = new Argil_Model_Reflection_Property(
    new ReflectionProperty('ArgilReflectableObject', 'publicProperty')
);

assert('$reflection->isPublic()');
assert('!$reflection->isProtected()');
assert('!$reflection->isPrivate()');

$reflection = new Argil_Model_Reflection_Property(
    new ReflectionProperty('ArgilReflectableObject', 'protectedProperty')
);

assert('!$reflection->isPublic()');
assert('$reflection->isProtected()');
assert('!$reflection->isPrivate()');

$reflection = new Argil_Model_Reflection_Property(
    new ReflectionProperty('ArgilReflectableObject', 'privateProperty')
);

assert('!$reflection->isPublic()');
assert('!$reflection->isProtected()');
assert('$reflection->isPrivate()');

?>
===DONE===
--EXPECT--
===DONE===