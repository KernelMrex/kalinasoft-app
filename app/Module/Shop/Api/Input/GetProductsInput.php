<?php
declare(strict_types=1);

namespace App\Module\Shop\Api\Input;

use App\Module\Shop\App\Data\GetProductsDataInterface;

final class GetProductsInput implements GetProductsDataInterface
{
    private int $pageNum;
    private int $pageSize;
    /** @var array<string, array> */
    private array $properties;

    public function __construct(
        int $pageNum,
        int $pageSize,
        array $properties
    ) {
        $this->pageNum = $pageNum;
        $this->pageSize = $pageSize;
        $this->properties = $properties;
    }

    public function getPageNum(): int
    {
        return $this->pageNum;
    }

    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    /**
     * @return array<string, array>
     */
    public function getProperties(): array
    {
        return $this->properties;
    }
}
