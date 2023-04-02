<?php
declare(strict_types=1);

namespace App\Module\Shop\Api\Output;

class GetProductsOutput
{
    private int $amount;
    /** @var ProductListItemDataInterface[] */
    private array $products;

    public function __construct(int $amount, array $products)
    {
        $this->amount = $amount;
        $this->products = $products;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return ProductListItemDataInterface[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }
}
