<?php
declare(strict_types=1);

namespace App\Module\Shop\Infrastructure\Factory;

use App\Module\Shop\Api\Api;
use App\Module\Shop\Api\ApiInterface;
use App\Module\Shop\Infrastructure\Query\ProductQueryService;

class ShopModuleFactory
{
    public static function getInstance(): ApiInterface
    {
        $productQueryService = new ProductQueryService();

        return new Api($productQueryService);
    }
}
