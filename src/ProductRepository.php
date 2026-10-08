<?php
declare(strict_types=1);
namespace App;
final class ProductRepository{
    /**@var list<Product> */
    private array $products = [];
    
    public function __construct(string $jsonFile)
    {
        $json = file_get_contents($jsonFile);
        $rows = json_decode($json,true, flags:JSON_THROW_ON_ERROR);

        foreach($rows as $row){
            $this->products[] = new Product(
            $row['id'],
            $row['name'],
            $row['priceHuf'],
            Category::from($row['category']),
            );       
            
        }
    }
    /** @return list<Product> */
    public function all(): array
    {
        return $this->products;
    }
    /**@return list<Product> */

    public function findByCategory(Category $category): array
    {$result = [];
    foreach($this->products as $product){
        if($product->category === $category){
            $result[] = $product;   
            }
    }
    return $result;
    }
}