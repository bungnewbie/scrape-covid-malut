<?php

namespace Bot;

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
		if($this->exists()) {
			return file_get_contents($this->filename());
		}
		$crawler = (new Client())->request("GET", "https://covid19.ternatekota.go.id/");
		$array   = $crawler->filter("table > tbody > tr > td")->each(function ($node) {
			return $node->text();
		});

		file_put_contents($this->filename(), toJson(collect($array)));
		chmod($this->filename(), 0777);
		return toJson(collect($array));
	}
}