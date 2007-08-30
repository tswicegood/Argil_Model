--TEST--
Argil_Model_Specification interface provides a simple means
of determining if a given value is valid.
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$reflection = new ReflectionClass('Argil_Model_Specification');
assert('$reflection->isInterface()');
assert('$reflection->hasMethod("isValid")');


?>
===DONE===
--EXPECT--
===DONE===