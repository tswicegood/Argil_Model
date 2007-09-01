--TEST--
Argil_Model_Reflection_Object decorates ReflectionObject
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

class SomeReflectableObject
{
    
}

$reflection = new ReflectionObject(new SomeReflectableObject());
$decorator = new Argil_Model_Reflection_Object($reflection);

assert('$reflection->getName() == $decorator->getName()');

?>
===DONE===
--EXPECT--
===DONE===