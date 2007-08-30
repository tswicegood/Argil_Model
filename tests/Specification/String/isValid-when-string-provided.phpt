--TEST--
Argil_Model_Specification_String returns true on isValid() when it
is instantiated with a string or an object with __toString()
declared.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$valid = new Argil_Model_Specification_String("Hello World!");
assert('$valid->isValid()');

$not_valid = new Argil_Model_Specification_String(123);
assert('!$not_valid->isValid()');

class ArgilHelloWorldString
{
    public function __toString()
    {
        return "Hello World!";
    }
}

$valid = new Argil_Model_Specification_String(new ArgilHelloWorldString());
assert('$valid->isValid()');

// TODO: add more tests to cover all types within PHP

?>
===DONE===
--EXPECT--
===DONE===