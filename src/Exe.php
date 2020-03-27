<?php

namespace Bot;

use Bot\Crawler\Crawler;

class Exe extends Crawler
{
	public function exec($reply)
	{
		switch ($reply) {
			case 'malut':
					return $this->malut();
				break;
			case 'sulsel':
					return $this->sulsel()['attribute']['kota_makassar'][0];
				break;
			default: break;
		}
	}

	public function malut()
	{
		$filter  = "table > tbody > tr > td";
		$payload = $this->scrape($filter, "https://covid19.ternatekota.go.id/");

		foreach (map($payload) as $key => $value) {
			$results["attribute"][replace_dot_with_space($value["wil"])] = $value;
		}

		return pretty($results);
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