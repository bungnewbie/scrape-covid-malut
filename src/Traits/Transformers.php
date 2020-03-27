<?php

namespace Bot\Traits;

use Bot\Constants\Keys;

trait Transformers
{
	protected $count;

	protected $prepare;

	protected $province;

	protected $regional;

	protected $resultante;

	public function province($reply)
	{
		switch ($reply) {
			case 'malut':
					$this->prepare = (object)$this->malut();
				break;
			case 'sulsel':
					$this->prepare = $this->sulsel();
				break;
			default: break;
		}
		return $this;
	}

	public function regional($regional)
	{
		foreach ($this->prepare as $keys => $values) {
			if($keys == $regional) {
				$this->regional[$regional] = map($values);
			}
		}
		$this->prepare = $this->regional;
		return $this;
	}

	public function count()
	{
		foreach (Keys::key() as $key) {
			$this->count[$key] = sum($this->prepare, $key);
		}
		return $this->count;
	}

	public function get()
	{
		foreach ($this->prepare as $keys => $values) {
			if($keys == "attribute") {
				foreach ($values as $key => $value) {
					$this->resultante[$keys][replace_dot_with_space(@$value["reg"])] = $value;
				}
			}
		}

		return $this->resultante["attribute"];
	}

	public function command(): array
	{
		foreach ($this->get() as $key => $value) {
			$keys[] = $key;
		}
		return $keys;
	}
}