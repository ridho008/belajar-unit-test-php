<?php 

namespace Ridho\Test;

use PHPUnit\Framework\TestCase;

class ProductServiceTest extends TestCase {
	private ProductRepository $repository;
	private ProductService $service;

	// public function __construct(private $product)
	// {
		
	// }

	protected function setUp(): void
	{
		$this->repository = $this->createStub(ProductRepository::class);
		$this->service = new ProductService($this->repository);
		$this->product = new Product();
	}

	public function testStub()
	{
		// $product = new Product();
		$this->product->setId("1");

		$this->repository->method("findById")->willReturn($this->product);
		$result = $this->repository->findById("1");
		// var_dump($result);
		// cek apakah sama
		self::assertSame($this->product, $result);
	}

	public function testStubMap()
	{
		$product1 = new Product();
		$product1->setId("1");

		$product2 = new Product();
		$product2->setId("2");

		$map = [
			["1", $product1],
			["2", $product2],
		];

		$this->repository->method("findById")->willReturnMap($map);

		self::assertSame($product1, $this->repository->findById("1"));
		self::assertSame($product2, $this->repository->findById("2"));
	}

	public function testStubCallback()
	{
		$this->repository->method("findById")
			->willReturnCallback(function (string $id) {
				$product = new Product();
				$product->setId($id);
				return $product;
			});

		self::assertEquals("1", $this->repository->findById("1")->getId());
		self::assertEquals("2", $this->repository->findById("2")->getId());
		self::assertEquals("3", $this->repository->findById("3")->getId());
	}

	public function testRegisterSuccess()
	{
		$this->repository->method("findById")->willReturn(null);
		$this->repository->method("save")->willReturnArgument(0);

		$product = new Product();
		$product->setId("1");
		$product->setName("Contoh");

		$result = $this->service->register($product);

		self::assertSame($product->getId(), $result->getId());
		self::assertSame($product->getName(), $result->getName());
	}

	public function testRegisterException()
	{
		$this->expectException(\Exception::class);

		$productInDB = new Product();
		$productInDB->setId("1");

		$this->repository->method("findById")->willReturn($productInDB);

		$product = new Product();
		$product->setId("1");

		$this->service->register($product);
	}

	// Test Gagal
	public function testDeleteSuccess()
	{
		// $this->expectException(\Exception::class);
		$productInDB = new Product();
		$productInDB->setId("1");

		$this->repository->method("findById")->willReturn($productInDB);
		$this->repository->method("delete")->willReturnArgument(0);

		$product = new Product();
		$product->setId("1");
		// $product->setName("Contoh");

		$result = $this->service->hapus($product);

		self::assertSame($product->getId(), $result->getId());
		// self::assertSame($product->getName(), $result->getName());

		// $productInDB = new Product();
		// $productInDB->setId("1");

		// $this->repository->method("findById")->willReturn($productInDB);
		// $this->repository->method("delete")->willReturnArgument("1");

		// // $this->repository->method("findById")->willReturn($productInDB);

		// $product = new Product();
		// $product->setId("1");

		// $result = $this->service->hapus($product);

		// self::assertSame($product->getId(), $result->getId());
	}
}