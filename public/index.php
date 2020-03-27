<?php

require __DIR__."/../vendor/autoload.php";

use Bot\Exe;
use Bot\Constants\Keys;

$result = new Exe();

$pretty = $result->province("malut")->get();
dd($pretty);

dd($result->prov("malut")->regional("kota_ternate"));