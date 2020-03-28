<?php

namespace Bot\Traits;

use Bot\Constants\Keys;

trait Transformers
{
	protected $count;

	protected $prepare;

	protected $commands;

	protected $province;

	protected $regional;

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
			foreach ($values as $key => $value) {
				if($key == $regional) {
					$this->regional[$keys][$regional] = map($value);
				}
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
		return $this->prepare;
	}

	public function command(): array
	{
		foreach ($this->get() as $keys => $values) {
			foreach ($values as $key => $value) {
				if($keys == "attribute") {
					$this->commands[] = $key;
				}
			}
		}
		return $this->commands;
	}
}