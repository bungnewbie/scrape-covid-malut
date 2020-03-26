<?php

require __DIR__."/../vendor/autoload.php";

use Bot\Exe;

$x = implode("\n", \Bot\Constants\Keys::province());
dd($x);

$result = new Exe;

print $result->sulsel();