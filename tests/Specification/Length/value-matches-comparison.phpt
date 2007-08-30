--TEST--
Argil_Model_Specification_Length::isValid() will also return true
if the second parameter is not identifiable as an integer and the
third parameter is.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$valid = new Argil_Model_Specification_Length('12345', '<', 6);
assert('$valid->isValid()');

$valid = new Argil_Model_Specification_Length('12345', '>', 4);
assert('$valid->isValid()');

$valid = new Argil_Model_Specification_Length('12345', '>=', 5);
assert('$valid->isValid()');

$valid = new Argil_Model_Specification_Length('12345', '<=', 5);

$valid = new Argil_Model_Specification_Length('12345', '<>', 4);
assert('$valid->isValid()');

$valid = new Argil_Model_Specification_Length('12345', '!=', 6);
assert('$valid->isValid()');

?>
===DONE===
--EXPECT--
===DONE===