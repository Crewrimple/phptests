<?php

require_once ('../Task_1/init.php');
require_once ('db.php');

$init = new init($db);
//$init->testCreate();
$init->get();