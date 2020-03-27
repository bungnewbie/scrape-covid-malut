<?php

require __DIR__."/../vendor/autoload.php";

use Bot\Exe;

$result = new Exe();

$malut = $result->malut();
$malut = $result->sulsel();
dd($malut);