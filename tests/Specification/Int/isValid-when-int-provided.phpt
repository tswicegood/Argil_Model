--TEST--
Argil_Model_Specification_Int returns true on isValid() when the
value provided is an integer.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$valid = new Argil_Model_Specification_Int(123);
assert('$valid->isValid()');

$not_valid = new Argil_Model_Specification_Int('123');
assert('!$not_valid->isValid()');

?>
===DONE===
--EXPECT--
===DONE===