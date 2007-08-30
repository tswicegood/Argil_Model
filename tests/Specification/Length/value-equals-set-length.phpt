--TEST--
Argil_Model_Specification_Length is true on the simplest of forms
when the value equals a specific length.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$valid = new Argil_Model_Specification_Length('12345', 5);
assert('$valid->isValid()');

$not_valid = new Argil_Model_Specification_Length('12345', 6);
assert('!$not_valid->isValid()');

?>
===DONE===
--EXPECT--
===DONE===