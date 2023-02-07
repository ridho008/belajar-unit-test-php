<?php 

namespace Ridho\Test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;


// menjalankan hanya 1 method test = vendor/bin/phpunit --filter 'CounterTest::testOther' test/CounterTest.php
// menjalankan semua test = vendor/bin/phpunit test/CounterTest.php
class CounterTest extends TestCase {

	private Counter $counter;

	protected function setUp(): void 
	{
		$this->counter = new Counter();
		echo "Membuat counter";
	}

	// Incomplete Test
	public function testIncreament()
	{
		self::assertEquals(0, $this->counter->getCounter());
		// menandakan unit test belum selesai
		self::markTestIncomplete("TODO do counter again");
		// secara otomatis script selanjutnya tidak akan dieksekusi
		// ini kode
	}

	public function testCounter()
	{
		// $counter = new Counter();
		$this->counter->increament();
		// $this->counter->increament();
		$this->assertEquals(1, $this->counter->getCounter());
		// echo $counter->getCounter();
		// penggunaan assertions ada 3
		// $counter->increament();
		// Assert::assertEquals(1, $counter->getCounter());
		// $counter->increament();
		// self::assertEquals(2, $counter->getCounter());
	}

	public function testOther()
	{
		// $counter = new Counter();
		
		self::assertEquals("Method Other.", $this->counter->other());
	}

	// annotation
	/**
	 * @test
	 */ 
	public function incrementing()
	{
		// skip function, artinya belum selesai.
		self::markTestSkipped("Masih Error");
		$this->counter->increament();
		$this->assertEquals(1, $this->counter->getCounter());
	}

	public function testFirst(): Counter
	{
		// $counter = new Counter();
		// $this->counter->increament();
		$this->counter->increament();
		Assert::assertEquals(1, $this->counter->getCounter());
		return $this->counter;
	}

	/**
	 * @depends testFirst
	 */

	public function testSecond(Counter $counter): void
	{
		$counter->increament();
		Assert::assertEquals(2, $counter->getCounter());
	}


	// Tear Down
	protected function tearDown(): void 
	{
		echo "Tear Down";
	}

	/**
	 * @after
	 */
	protected function after(): void 
	{
		echo "After";
	}	

	// Skip Tes ~ Skip Berdasarkan Kondisi
	/**
	 * @requires OSFAMILY Windows
	 */
	public function testOnlyWindow()
	{
		self::assertTrue(true, "Only in Windows");
	}

	/**
	 * @requires PHP >= 8
	 * @requires OSFAMILY Linux
	 */
	public function testOnlyForLinuxAndPHP8()
	{
		self::assertTrue(true, "Only for Linux and PHP 8");
	}

}