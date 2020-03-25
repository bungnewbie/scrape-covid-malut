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
				'info'		      => $i[0],
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

if (! function_exists('build_command')) {
	/**
	 * Build command for telegram get where city
	 * This methid add backslash array values
	 * @return array
	 */
	function build_command()
	{
		foreach (\Bot\Constants\Keys::key() as $key => &$value) {
			$results[] = '/'.$value;
		}
		return $results;
	}
}

if (! function_exists('unbuild_command')) {
	/**
	 * Unbuild command
	 * This method remove backslash
	 * @param  string $string
	 * @return string
	 */
	function unbuild_command($string)
	{
		return ltrim($string, '/');
	}
}

if (! function_exists('toJson')) {
	/**
	 * Transform json to array
	 * @param  array $array
	 * @return json
	 */
	function toJson($array)
	{
		return json_encode($array, JSON_PRETTY_PRINT);
	}
}

if (! function_exists('pretty')) {
	/**
	 * Pretty json
	 * @param  array $array
	 * @return json
	 */
	function pretty($array)
	{
		"<pre>".toJson($array)."</pre>";
	}
}

if (! function_exists('toArray')) {
	/**
	 * Transform json to array
	 * @param  json $json
	 * @return array
	 */
	function toArray($json)
	{
		return (array)json_decode($json, true);
	}
}

if (! function_exists('dd')) {
	/**
	 * Die dump pretty print debugging
	 * @return array
	 */
	function dd()
	{
		echo '<pre>';
		array_map(function($x) {
			print_r($x);
			// var_dump($x);
		}, func_get_args());
		die;
	}
}