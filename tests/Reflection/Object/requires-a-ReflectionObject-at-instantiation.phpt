--TEST--
Must be passed a ReflectionObject
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('Argil_Model_Reflection_Object');
assert('$reflection->hasMethod("__construct")');
$constructor = $reflection->getMethod('__construct');
assert('count($constructor->getParameters()) == 1');
$parameter = array_shift($constructor->getParameters());
assert('$parameter->getClass()->getName() == "ReflectionObject"');

?>
===DONE===
--EXPECT--
===DONE===