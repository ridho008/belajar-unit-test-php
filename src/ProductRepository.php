<?php 

namespace Ridho\Test;

interface ProductRepository {
	
	function save(Product $product): Product;

	function delete(Product $product): Product;

	function findById(string $id): ?Product;

	function findAll(): array;
}