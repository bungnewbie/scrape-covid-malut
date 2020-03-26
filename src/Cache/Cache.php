<?php

namespace Bot\Cache;

use Bot\Cache\Exceptions\CacheException;

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
}