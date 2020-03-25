<?php

require "../vendor/autoload.php";

use Bot\Scrape;

$result = (new Scrape())->exec();

dd($result);
// return print "<pre>".$result."</pre>";