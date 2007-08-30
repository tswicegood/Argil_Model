--TEST--
Argil_Model_Reflection_Property takes a ReflectionProperty object
as its first and only parameter
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionMethod('Argil_Model_Reflection_Property', '__construct');
$parameters = $reflection->getParameters();
assert('count($parameters) == 1');
assert('$parameters[0]->getClass()->getName() == "ReflectionProperty"');

?>
===DONE===
--EXPECT--
===DONE===