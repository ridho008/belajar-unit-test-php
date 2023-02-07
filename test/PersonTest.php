<?php 

namespace Ridho\Test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;

class PersonTest extends TestCase {

	private Person $person;

	// berfungsi sebagai memanggil object berulang-ulang.
	protected function setUp(): void
	{
		// $this->person = new Person("Ridho");
	}

	// membuat function setUp lebih dari satu.
	/**
	 * @before
	 */
	public function createPerson(): void 
	{
		$this->person = new Person("Ridho");
	}

	// bila berhasil
	public function testSuccess()
	{
		// $person = new Person("Ridho");
		Assert::assertEquals("Hello Surya, My name is Ridho", $this->person->sayHello("Surya"));
	}

	// test bila gagal
	public function testException()
	{
		// $person = new Person("Ridho");
		$this->expectException(\Exception::class);
		$this->person->sayHello(null);
	}

	// Test Output
	// Fitur yang tidak mengembalikan value, isinya printout echo
	public function testSayGoodByeSuccess()
	{
		// $person = new Person("Ridho");
		$this->expectOutputString("Good Bye Surya");
		$this->person->sayGoodBye("Surya");
	}
}