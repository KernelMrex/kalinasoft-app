<?php
declare(strict_types=1);

namespace App\Module\Shop\Api\Input;

use App\Module\Shop\App\Data\GetProductsDataInterface;

final class GetProductsInput implements GetProductsDataInterface
{
    private int $pageNum;
    private int $pageSize;

    public function __construct(
        int $pageNum,
        int $pageSize
    ) {
        $this->pageNum = $pageNum;
        $this->pageSize = $pageSize;
    }

    public function getPageNum(): int
    {
        return $this->pageNum;
    }

    public function getPageSize(): int
    {
        return $this->pageSize;
    }
}
