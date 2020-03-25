<?php

namespace Bot;

use Goutte\Client;

class Scrape extends Cache
{
	public function exec()
	{
		return $this->run();
	}

	public function call()
	{
		$client  = new Client;
		$crawler = $client->request("GET", "https://covid19.ternatekota.go.id/");
		$array   = $crawler->filter("table > tbody > tr > td")->each(function ($node) {
			return $node->text();
		});
		file_put_contents($this->filename(), toJson(collect($array)));
		return toJson(collect($array));
	}
}