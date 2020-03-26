<?php

require __DIR__."/../vendor/autoload.php";

use Bot\Exe;

$str = "/prov njsd";

$x = pluck_reply($str);
dd($x);


$x = implode("\n", \Bot\Constants\Keys::province());
dd($x);

$result = new Exe;

print $result->sulsel();