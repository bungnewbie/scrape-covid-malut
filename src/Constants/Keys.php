<?php

namespace Bot\Constants;

abstract class Keys
{
	static public function key()
	{
		return [
			'regional',
			'self_isolation',
			'peopla_suveillance',
			'patient_suveillance',
			'positive',
			'well',
			'died',
			'scraped_at'
		];
	}
	static public function province()
	{
		return [
			"malut",
			"sulsel"
		];
	}
}