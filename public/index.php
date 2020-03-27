<?php

require __DIR__."/../vendor/autoload.php";

use Bot\Exe;

$result = new Exe();

$malut = $result->malut();
dd(pluck($malut["attribute"], "regional"));