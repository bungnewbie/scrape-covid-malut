<?php

namespace Bot\Cache;

use Bot\Cache\Exceptions\CacheException;

class Cache
{
	private $file;

	private $content;

	private $expires;

	public function __construct()
	{
		$this->expires = time()-2*60*60; // two hours
	}

	public function available()
	{
		$this->file = storage_path()."cache/".md5(date("Y-m-d")).".json";
		if(! file_exists($this->file)) {
			return false;
		}
		if(filectime($this->file) < $this->file) {
			return false;
		}

		return true;
	}

	public function make($data)
	{
		file_put_contents($this->file, toJson($data));
		chmod($this->file, 0777);
		$this->content = $data;
		return $this;
	}

	public function push()
	{
		return $this->content;
	}

	public function pull()
	{
		return toArray(file_get_contents($this->file));
	}
}