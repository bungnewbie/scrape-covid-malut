<?php

namespace Bot;

use Bot\Crawler\Crawler;
use Bot\Traits\Transformers;

class Exe extends Crawler
{
	use Transformers;

	public function malut()
	{
		$filter  = "table > tbody > tr > td";
		return $this->scrape($filter, "https://covid19.ternatekota.go.id/");
	}

	public function sulsel()
	{
		$filter  = "table#example-2 > tbody > tr";
		$payload = $this->scrape($filter, "https://covid19.sulselprov.go.id/");

		foreach ($payload as $key => $value) {
			$results[][$key] = explode(" ", $value);
		}
		foreach ($results as $keys => $values) {
			foreach ($values as $key => $value) {
				if(count($value)==7) {
					$city = $value[1]." ".$value[2];
					array_splice($value, 1, 1, $city);
					unset($value[2]);
				}
				if(count($value)==8) {
					$city = $value[1]." ".$value[2]." ".$value[3];
					array_splice($value, 1, 1, $city);
					unset($value[2]);
					unset($value[3]);
				}
				if(count($value)==9) {
					$city = $value[1]." ".$value[2]." ".$value[3]." ".$value[4];
					array_splice($value, 1, 1, $city);
					unset($value[2]);
					unset($value[3]);
					unset($value[4]);
				}
				unset($value[0]);
				$args["attribute"][replace_with_space($value[1])] = collect(array_values($value));
			}
		}

		return $args;
	}
}