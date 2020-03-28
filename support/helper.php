<?php

use Bot\Constants\Keys;

if (! function_exists('storage_path')) {
	/**
	 * Storage path
	 * @return string
	 */
	function storage_path()
	{
		return __DIR__."/../local/";
	}
}

if (! function_exists('cache_path')) {
	/**
	 * Storage path
	 * @return string
	 */
	function cache_path()
	{
		return storage_path()."cache/";
	}
}

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

if (! function_exists('get_host')) {
	/**
	 * Get domain,
	 * example: www.fb.com
	 * result: fb.com
	 * @param  string $url
	 * @return string
	 */
	function get_host($url)
	{
		return parse_url($url)["host"];
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
			return is_object($v)
					?$v->key
					:$v[$key];
		}, $array);
	}
}


if (! function_exists('malut_splice')) {
	/**
	 * malut_spliceing array
	 * @param  array $array
	 * @return array
	 */
	function malut_splice($array)
	{
		return array_map(function($i) {
			foreach (Keys::key() as $key => $value) {
				$result[$value] = @$i[$key];
			}
			return $result;
		}, array_chunk($array, 7));
	}
}

if (! function_exists('sulsel_splice')) {
	/**
	 * Splice and mapping sulsel scrape result
	 * @param  array $array
	 * @return array
	 */
	function sulsel_splice($array)
	{
		foreach ($array as $key => $value) {
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
			$prep[$key] = array_values($value);
		}
		$map = array_map(function($i) {
			return [
				'reg' => $i[0],
				'odp' => $i[1],
				'pdp' => $i[2],
				'sdt' => $i[3],
			];
		}, $prep);

		foreach ($map as $key => $value) {
			$sliced[replace_with_space($value["reg"])] = $value;
		}

		return $sliced;
	}
}

if (! function_exists('map')) {
	/**
	 * Array maping
	 * @param  array $array
	 * @return array
	 */
	function map($array)
	{
		return [
			"attribute" => $array,
			"scrape_at" => [
				"java"  => timestamp()
			]
		];
	}
}

if (! function_exists('sum')) {
	/**
	 * Sum province
	 * @param  array $arr
	 * @param  string $str
	 * @return int
	 */
	function sum($arr, $str)
	{
		return array_sum(array_column((array) $arr, $str));
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
	 * @return array
	 */
	function pluck_reply($string, ...$array)
	{
		$arr = explode(" ", trim($string));
		unset($arr[0]);
		foreach ($array as $k => $value) {
			$res[$k]=$arr[$value];
		}
		if (count($array) > 1) {
			return @$res;
		}
		return @$res[0];
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

if (! function_exists('build_command')) {
	function build_command()
	{
		# code...
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