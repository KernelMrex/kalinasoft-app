<?php
declare(strict_types=1);

namespace App\Module\Shop\App\Query;

use App\Module\Shop\App\Data\GetProductsDataInterface;
use App\Module\Shop\App\Data\ProductListItem;

interface ProductQueryServiceInterface
{
    /** @return ProductListItem[] */
    public function getProductList(GetProductsDataInterface $params): array;
}
