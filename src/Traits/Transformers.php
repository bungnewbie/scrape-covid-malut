<?php

namespace Bot\Traits;

use Bot\Exe;
use Bot\Constants\Keys;

trait Transformers
{
	public function where($reply)
	{
		$bot 	= new Exe;
		$result =  $bot->exec($reply);
		return pluck($result, "regional");
	}
}