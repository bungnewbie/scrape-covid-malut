<?php

require __DIR__."/../vendor/autoload.php";

use Bot\Exe;

$str = "/prov njs";

if(build_command($str) == "/prov") {
	dd('nice');
}

die;


$x = implode("\n", \Bot\Constants\Keys::province());
dd($x);

$result = new Exe;

print $result->sulsel();