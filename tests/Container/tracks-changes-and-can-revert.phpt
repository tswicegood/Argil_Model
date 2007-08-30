--TEST--
Argil_Model_Container tracks changes that have been made and can
revert out changes if necessary.
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

class SimpleModel
{
    public $title = '';
}

$model = new SimpleModel();
$model->title = "Hello World!";
$container = new Argil_Model_Container($model);

assert('$container->title == "Hello World!"');
$container->title = "New Title";
assert('$container->title == "New Title"');

$container->revert();
assert('$container->title == "Hello World!"');

?>
===DONE===
--EXPECT--
===DONE===