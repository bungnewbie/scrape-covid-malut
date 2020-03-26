<?php

namespace Bot\Traits;

use Bot\Exe;
use Bot\Constants\Keys;

trait Transformers
{
	public function prov()
	{
		$result = new Exe;
		return $result->sulsel();
	}
}