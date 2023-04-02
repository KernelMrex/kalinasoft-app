<?php
declare(strict_types=1);

namespace App\Module\Shop\Infrastructure\Factory;

use App\Module\Shop\Api\Api;
use App\Module\Shop\Api\ApiInterface;

class ShopModuleFactory
{
    public static function getInstance(): ApiInterface
    {
        return new Api();
    }
}
