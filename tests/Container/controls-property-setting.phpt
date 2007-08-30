--TEST--
Container will serve as a gatekeeper for setting of properties,
only allowing properties that are known to be set, and then only
if they are allowed.
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

class SimpleModel
{
    public $title = '';
}

$container = new Argil_Model_Container(new SimpleModel());
assert('$container->title == ""');
$text = "Hello World!  Random integer: " . rand(100, 200);
$container->title = $text;
assert('$container->title == $text');

try {
    $container->foo = "bar";
    trigger_error('exception not caught');
} catch (Argil_Model_Container_UnknownPropertyException $e) {
    assert('$e->getMessage() == "attempted to set an unknown property: foo"');
    $expected = array('foo' => 'bar');
    assert('$e->getCause() == $expected');
}

?>
===DONE===
--EXPECT--
===DONE===