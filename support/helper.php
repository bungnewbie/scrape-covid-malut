<?php

if (! function_exists('timestamp')) {
	/**
	 * Timestamp Asia/Jakarta
	 * @return string
	 */
	function timestamp()
	{
		return date('Y-m-d H:i:s T', time());
	}
}

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


if (! function_exists('map')) {
	/**
	 * Maping array
	 * @param  array $array
	 * @return array
	 */
	function map($array)
	{
		return array_map(function($i) {
			return [
				'wil'	  	 	  => @$i[0],
				'isolasi_mandiri' => @$i[1],
				'odp'			  => @$i[2],
				'pdp'			  => @$i[3],
				'positif'		  => @$i[4],
				'sembuh'		  => @$i[5],
				'meninggal'		  => @$i[6],
				'scraped_at'	  => timestamp(),
			];
		}, array_chunk($array, 7));
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
				'wil'	  	 => @$i[0],
				'odp' 	  	 => @$i[1],
				'pdp' 	  	 => @$i[2],
				'positif' 	 => @$i[3],
				'total'   	 => @$i[4],
				'sembuh'  	 => @$i[5],
				'scraped_at' => timestamp(),
			];
		}, array_chunk($array, 7));
	}
}

if(! function_exists('reindex')) {
	/**
	 * Reindex array keys
	 * bisa juga pake array_values instance sih
	 * @param  array &$array
	 * @return array
	 */
	function reindex(&$array)
	{
		foreach ($array as $value) {
			$result[] = $value;
		}
		return $result;
	}
}

if (! function_exists('reply')) {
	/**
	 * Reply
	 * @return array
	 */
	function reply($string)
	{
		return substr($string, 0, strrpos($string, ' '));
	}
}

if (! function_exists('pluck_reply')) {
	/**
	 * Pluck reply from user
	 * @param  string $string
	 * @return mixed
	 */
	function pluck_reply($string)
	{
		$arr = explode(" ", trim($string));
		return (count($arr)>2)?false:$arr[1];
	}
}

if (! function_exists('command')) {
	/**
	 * command
	 * @return array
	 */
	function command($string)
	{
		$arr = explode(" ", trim($string));
		return $arr[0];
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
		return "<pre>".toJson($array)."</pre>";
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

if (! function_exists('replace_with_space')) {
	/**
	 * To lower and replace string using underscore
	 * @param  string $string
	 * @return string
	 */
	function replace_with_space($string)
	{
		return strtolower(str_replace(" ", "_", $string));
	}
}

if (! function_exists('replace_dot_with_space')) {
	/**
	 * Remove dot and with space and replace with underscore
	 * @param  string $string
	 * @return string
	 */
	function replace_dot_with_space($string) {
		$result = strtolower(str_replace(".", "", $string));
		return str_replace(" ", "_", $result);
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