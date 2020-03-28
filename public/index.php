<?php

require __DIR__."/../vendor/autoload.php";

use Bot\Exe;
use Bot\Constants\Keys;

$result = new Exe();

$reg = $result->province("sulsel")->regional("kota_makassar")->get();
dd(pretty($reg));