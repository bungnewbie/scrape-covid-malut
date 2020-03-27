<?php

require __DIR__."/../vendor/autoload.php";

use Bot\Exe;

$result = new Exe();

$malut = $result->malut();
foreach ($malut["attribute"] as $key => $value) {
	foreach ($value as $k => $v) {
		echo $k.": ".$value[$k]."<br>";
	}
}