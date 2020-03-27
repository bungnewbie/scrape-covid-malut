<?php

require __DIR__."/../vendor/autoload.php";

use Bot\Exe;

$result = new Exe;

dd($result->sulsel()['attribute']['kota_makassar'][0]);

print $result->sulsel();