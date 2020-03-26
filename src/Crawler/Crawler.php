<?php

namespace Bot\Crawler;

use Goutte\Client;
use Bot\Crawler\Exceptions\CrawlerException;
use Symfony\Component\HttpClient\HttpClient;

class Crawler
{
	public function scrape($filter, $url)
	{
		try {
			$client  = new Client(HttpClient::create(['timeout' => 60, 'verify_peer' => false]));
			$crawler = $client->request("GET", $url);
			return $crawler->filter($filter)->each(function ($node) {
				return $node->text();
			});
		} catch (CrawlerException $e) {
			return pretty(toJson($e->getMessage()));
		}
	}
}