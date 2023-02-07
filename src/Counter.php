<?php

namespace Ridho\Test;

class Counter {
	private $counter = 0;

	public function increament(): void 
	{
		$this->counter++;
	}

	public function incrementing(): void 
	{
		$this->counter++;
	}

	public function getCounter(): int
	{
		return $this->counter;
	}

	public function other(): string
	{
		return "Method Other.";
	}
}