<?php

namespace Bot\Crawler;

use Goutte\Client;
use Bot\Cache\Cache;
use Bot\Crawler\Exceptions\CrawlerException;
use Symfony\Component\HttpClient\HttpClient;

class Crawler extends Cache
{
	public function scrape($filter, $url)
	{
		try {
			if(! $this->available()) {
				$clients = new Client(HttpClient::create(['timeout' => 60, 'verify_host' => false, 'verify_peer' => false]));
				$crawler = $clients->request("GET", $url);
				$crawler = $crawler->filter($filter)->each(function ($node) {
					return $node->text();
				});

				$result = [
					"attribute" => map($crawler),
					"scrape_at" => timestamp()
				];

				return $this->make($result)->push();
			}
			return $this->pull();
		} catch (CrawlerException $e) {
			return dd($e->getMessage());
		}
	}
}