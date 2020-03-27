<?php

namespace Bot\Traits;

use Bot\Exe;
use Bot\Constants\Keys;

trait Transformers
{
	public function prov($reply)
	{
		$bot = new Exe;
		foreach ($bot->exec($reply)["attribute"] as $key => $value) {
			foreach ($value as $k => $v) {
				echo $k.": ".$value[$k]."\n";
			}
		}
	}
}