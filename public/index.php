<?php

require __DIR__."/../vendor/autoload.php";

use Bot\Exe;
use Bot\Constants\Keys;

$result = new Exe();


$str = "/reg first second";

dd(pluck_reply($str, 1,2));


$pretty = $result->province("malut")->get();
dd($pretty);

dd($result->prov("malut")->regional("kota_ternate"));