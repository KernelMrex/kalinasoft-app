<?php
declare(strict_types=1);

namespace App\Module\Shop\Api\Output;

interface ProductListItemDataInterface
{
    public function getTitle(): string;

    public function getAmount(): int;

    public function getProperties(): array;
}
