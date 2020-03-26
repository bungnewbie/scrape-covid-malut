<?php

namespace Bot\Traits;

use Bot\Exe;
use Bot\Constants\Keys;

trait Transformers
{
	public function prov()
	{
		$exec = new Exe;
		return $exec->sulsel();
	}
}