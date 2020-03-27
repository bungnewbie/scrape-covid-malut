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
			$client  = new Client(HttpClient::create(['timeout' => 60, 'verify_host' => false, 'verify_peer' => false]));
			$crawler = $client->request("GET", $url);
			$crawler = $crawler->filter($filter)->each(function ($node) {
				return $node->text();
			});

			return [
				"attribute" => map($crawler),
				"scrape_at" => timestamp()
			];

		} catch (CrawlerException $e) {
			return dd($e->getMessage());
		}
	}
}