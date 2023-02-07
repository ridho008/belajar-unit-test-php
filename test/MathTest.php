<?php 

namespace Ridho\Test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;

class MathTest extends TestCase {
	public function testManual()
	{
		self::assertEquals(10, Math::sum([5,5]));
		self::assertEquals(6, Math::sum([3,3]));
		self::assertEquals(2, Math::sum([2]));
	}

	/**
	 * @dataProvider mathSumData
	 */
	public function testDataProvider(array $values, int $expected)
	{
		self::assertEquals($expected, Math::sum($values));
	}
	
	public function mathSumData(): array 
	{
		return [
			[[5,5], 10],
			[[6,6,6], 18],
			[[3,3,3], 9],
			[[], 0],
			[[2], 2]
		];
	}

	/**
	 * @testWith [[5,5], 10]
	 *			 [[6,6,6], 18]
	 *		[[3,3,3], 9]
	 *		[[], 0]
	 *		[[2], 2]
	 */
	// untuk kasus sederhana seperi int, string
	public function testWith(array $values, int $expected)
	{
		self::assertEquals($expected, Math::sum($values));
	}
}