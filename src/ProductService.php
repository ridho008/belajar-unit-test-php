<?php 

namespace Ridho\Test;

class ProductService {

	public function __construct(private ProductRepository $repository)
	{

	}

	public function register(Product $product)
	{
		if($this->repository->findById($product->getId()) != null) {
			throw new \Exception('Product is already exists.');
		}

		return $this->repository->save($product);
	}

	public function hapus(Product $product)
	{
		if($this->repository->findById($product->getId() == null) ) {
			// throw new \Exception('Product is already exists.');
			// $this->repository->delete($product);
			echo "berhasil";
		}


	}
}