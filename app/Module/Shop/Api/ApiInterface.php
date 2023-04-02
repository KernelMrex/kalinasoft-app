<?php
declare(strict_types=1);

namespace App\Module\Shop\Api;

use App\Module\Shop\Api\Input\GetProductsInput;
use App\Module\Shop\Api\Output\GetProductsOutput;

interface ApiInterface
{
    public function getProducts(GetProductsInput $input): GetProductsOutput;
}
