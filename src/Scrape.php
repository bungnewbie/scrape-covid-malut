<?php

namespace Bot;

use Goutte\Client;

class Scrape
{
	static public function exec()
	{
		$client  = new Client();
		$crawler = $client->request("GET", "https://covid19.ternatekota.go.id/");
		$array   = $crawler->filter("table > tbody > tr > td")->each(function ($node) {
			return $node->text();
		});

		return json_encode(collect($array), true);
	}
}