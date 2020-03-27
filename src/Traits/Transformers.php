<?php

namespace Bot\Traits;

use Bot\Exe;
use Bot\Constants\Keys;

trait Transformers
{
	public function where($reply)
	{
		$bot = new Exe;
		return $bot->exec($reply);
	}
}