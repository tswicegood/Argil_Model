--TEST--
Argil_Model_Specification_Length implements Argil_Model_Specification
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('Argil_Model_Specification_Length');
assert('$reflection->implementsInterface("Argil_Model_Specification")');

?>
===DONE===
--EXPECT--
===DONE===