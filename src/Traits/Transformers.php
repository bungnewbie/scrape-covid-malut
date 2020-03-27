<?php

namespace Bot\Traits;

use Bot\Exe;
use Bot\Constants\Keys;

trait Transformers
{
	public function run($reply)
	{
		return $this->exec($reply);
	}
}