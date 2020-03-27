<?php

namespace Bot\Constants;

abstract class Keys
{
	static public $command;

	static public function key()
	{
		return [
			'reg',
			'isn',
			'odp',
			'pdp',
			'sdt',
			'fst',
			'die',
		];
	}

	static public function regional($array)
	{

		foreach ($array as $keys => $values) {
			if($keys == "attribute") {
				foreach ($values as $key => $value) {
					$results[replace_dot_with_space(@$value["reg"])] = $value["reg"];
				}
			}
		}

		foreach ($results as $key => $value) {
			self::$command[] = $key;
		}

		return pretty(self::$command);
	}

	static public function province()
	{
		return [
			"malut",
			"sulsel"
		];
	}
}