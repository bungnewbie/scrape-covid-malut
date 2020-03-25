<?php

if (! function_exists('pluck')) {
	/**
	 * Get array where key
	 * @param  array $array
	 * @param  string $key
	 * @return array
	 */
	function pluck($array, $key)
	{
		return array_map(function($v) use($key) {
			return is_object($v)?$v->key:$v[$key];
		}, $array);
	}
}

if (! function_exists('collect')) {
	/**
	 * Collect array
	 * @param  array $array
	 * @return array
	 */
	function collect($array)
	{
		return array_map(function($i) {
			return [
				'kabupaten'		  => $i[0],
				'isolasi_mandiri' => $i[1],
				'odp' 			  => $i[2],
				'pdp' 			  => $i[3],
				'positif' 		  => $i[4],
				'sembuh' 		  => $i[5],
				'meninggal' 	  => $i[6],
			];
		}, array_chunk($array, 7));
	}
}