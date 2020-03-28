<?php

require __DIR__."/../vendor/autoload.php";

use Bot\Exe;
use Bot\Constants\Keys;

$result = new Exe();

$reg = $result->province("malut")->get();
dd(pretty($reg));