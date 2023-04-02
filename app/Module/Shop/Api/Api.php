<?php
declare(strict_types=1);

namespace App\Module\Shop\Api;

use App\Module\Shop\Api\Input\GetProductsInput;
use App\Module\Shop\Api\Output\GetProductsOutput;
use App\Module\Shop\App\Query\ProductQueryServiceInterface;

class Api implements ApiInterface
{
    private ProductQueryServiceInterface $productQueryService;

    public function __construct(ProductQueryServiceInterface $productQueryService)
    {
        $this->productQueryService = $productQueryService;
    }

    public function getProducts(GetProductsInput $input): GetProductsOutput
    {
        $products = $this->productQueryService->getProductList($input);
        return new GetProductsOutput(count($products), $products);
    }
}
