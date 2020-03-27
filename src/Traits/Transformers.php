<?php

namespace Bot\Traits;

use Bot\Constants\Keys;

trait Transformers
{
	protected $count;

	protected $province;

	protected $regional;

	protected $resultante;

	public function province($reply)
	{
		switch ($reply) {
			case 'malut':
					$this->resultante = (object)$this->malut();
				break;
			case 'sulsel':
					$this->resultante = $this->sulsel();
				break;
			default: break;
		}
		return $this;
	}

	public function regional($regional)
	{
		foreach ($this->resultante as $keys => $values) {
			if($keys == $regional) {
				$this->regional[$regional] = map($values);
			}
		}
		$this->resultante = $this->regional;
		return $this;
	}

	public function count()
	{
		foreach (Keys::key() as $key) {
			$this->count[$key] = sum($this->resultante, $key);
		}
		return $this->count;
	}

	public function get()
	{
		return pretty($this->resultante);
	}
}