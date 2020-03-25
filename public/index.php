<?php

require "../vendor/autoload.php";

use Goutte\Client;

$client  = new Client();
$crawler = $client->request("GET", "https://covid19.ternatekota.go.id/");
$array   = $crawler->filter("table > tbody > tr > td")->each(function ($node) {
	return $node->text();
});

echo "<pre>".json_encode(collect($array), true)."</pre>";