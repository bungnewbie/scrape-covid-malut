<?php

namespace Bot;

use Exception;
use Bot\Scrape;

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
			return toArray(file_get_contents($this->filename()));
		} else {
			return toArray($this->call());
		}
	}
}