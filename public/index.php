<?php

require __DIR__."/../vendor/autoload.php";

use Bot\Exe;

$str = "/prov njs";

$str = substr($str, 0, strrpos($str, ' '));

dd($str);


$x = implode("\n", \Bot\Constants\Keys::province());
dd($x);

$result = new Exe;

print $result->sulsel();