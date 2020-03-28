<?php

namespace Bot;

use Bot\Cache\Cache;
use Bot\Crawler\Crawler;
use Bot\Traits\Transformers;

class Exe extends Crawler
{
	use Transformers;

	private $cache;

	public function __construct()
	{
		$this->cache = new Cache;
	}

	public function malut()
	{
		$filter = "table > tbody > tr > td";
		$client = "https://covid19.ternatekota.go.id/";

		if(! $this->cache->available($client)) {

			$response = $this->scrape($filter, $client);

			foreach (malut_splice($response) as $value) {
				$results[replace_dot_with_space(@$value["reg"])] = $value;
			}

			return $this->cache->make(map($results))->push();
		}

		return $this->cache->pull();
	}

	public function sulsel()
	{
		$filter = "table#example-2 > tbody > tr";
		$client = "https://covid19.sulselprov.go.id/";

		if(! $this->cache->available($client)) {

			$response = $this->scrape($filter, $client);

			foreach ($response as $key => $value) {
				$results[$key] = explode(" ", $value);
			}

			$spliced = sulsel_splice($results);

			return $this->cache->make(map($spliced))->push();
		}

		return $this->cache->pull();
	}
}