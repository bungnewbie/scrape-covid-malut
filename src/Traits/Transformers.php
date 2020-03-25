<?php

namespace Bot\Traits;

use Bot\Scrape;
use Bot\Constants\Keys;

trait Transformers
{
	public function all()
	{
		$array = (array)json_decode(Scrape::exec(), true);
		foreach ($array as $key => $value) {
			$results[Keys::key()[$key]]=$value;
		}
		return $results;
	}

	public function whereCity($city)
	{
		return @$this->all()[$city];
	}
}