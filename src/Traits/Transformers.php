<?php

namespace Bot\Traits;

use Bot\Exe;
use Bot\Constants\Keys;

trait Transformers
{
	public function prov()
	{
		return (new Exe())->exec()->sulsel();
	}

	public function whereCity($city)
	{
		return @$this->all()[$city];
	}
}