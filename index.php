<?php

require "vendor/autoload.php";

use Bot\Scrape;

$result = (new Scrape())->exec();

return print "<pre>".$result."</pre>";