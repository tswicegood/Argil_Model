--TEST--
Argil_Model_Container can contain N number of objects and will answer
is() to let you know what type of objects it contains.
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

class SimpleModel { }
class SimpleModelTwo { }

$container = new Argil_Model_Container(new SimpleModel());
assert('$container->is("SimpleModel")');
assert('!$container->is("SimpleModelTwo")');

$container = new Argil_Model_Container(
    new SimpleModel(),
    new SimpleModelTwo()
);

assert('$container->is("SimpleModel")');
assert('$container->is("SimpleModelTwo")');

?>
===DONE===
--EXPECT--
===DONE===