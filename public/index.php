<?php

require __DIR__."/../vendor/autoload.php";

use Bot\Exe;
use Bot\Constants\Keys;

$result = new Exe();

$pretty = $result->province("malut")->command();
// $pretty = $result->province("malut")->regional("kota_ternate")->get();
dd($pretty);

dd($result->province("malut")->regional("kota_ternate"));