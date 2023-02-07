<?php 

namespace Ridho\Test;

class Person {
	public function __construct(private string $name)
	{

	}

	// di unit test, wajib kita cek test gagal dan berhasil di setiap function.
	public function sayHello(?string $name)
	{
		if($name == null) throw new \Exception("Name is null");
		return "Hello $name, My name is $this->name";
	}

	public function sayGoodBye(?string $name ): void
	{
		echo "Good Bye $name";
	}
}