<?php

require "../vendor/autoload.php";

use Bot\Scrape;

$result = Scrape::exec();

return print "<pre>".$result."</pre>";