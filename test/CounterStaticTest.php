<?php 

namespace Ridho\Test;

use PHPUnit\Framework\TestCase;

class CounterStaticTest extends TestCase {

	public static Counter $counter;


	// untuk sharing data/variable untuk semua function unit test 
	/**
	 * @beforeClass
	 */
	public static function setUpSebelumClass(): void 
	{
		self::$counter = new Counter();
	}

	public function testFirst()
	{
		self::$counter->increament();
		self::assertEquals(1, self::$counter->getCounter());
	}

	public function testSecond()
	{
		self::$counter->increament();
		self::assertEquals(2, self::$counter->getCounter());
	}

	/**
	 * @afterClass
	 */
	public static function setDownSetelahClass(): void 
	{
		echo "Unit Test Finished" . PHP_EOL;
	}
}