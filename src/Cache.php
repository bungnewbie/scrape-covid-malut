<?php

namespace Bot;

use Exception;
use Goutte\Client;

class Cache
{
	public function filename(): string
	{
		return __DIR__."/../storage/cache/".md5("covid").".json";
	}

	public function file(): string
	{
		return time() - 84600 < filemtime($this->filename());
	}

	public function exists(): bool
	{
		if(file_exists($this->filename()) && $this->file()) {
			return true;
		}

		return false;
	}

	public function run()
	{
		try {
			$crawler = (new Client())->request("GET", "https://covid19.ternatekota.go.id/");

			$array   = $crawler->filter("table > tbody > tr > td")->each(function ($node) {
				return $node->text();
			});

			$count   = $crawler->filter("table > tfoot > tr > th")->each(function($node) {
				return $node->text();
			});

			return toJson(collect(array_merge($array, $count)));
		} catch (Exception $e) {
			return toJson($e->getMessage());
		}
	}
}