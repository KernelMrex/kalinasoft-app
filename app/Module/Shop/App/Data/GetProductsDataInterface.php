<?php
declare(strict_types=1);

namespace App\Module\Shop\App\Data;

interface GetProductsDataInterface
{
    public function getPageNum(): int;

    public function getPageSize(): int;
}