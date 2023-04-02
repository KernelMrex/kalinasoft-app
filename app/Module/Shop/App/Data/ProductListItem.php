<?php
declare(strict_types=1);

namespace App\Module\Shop\App\Data;

use App\Module\Shop\Api\Output\ProductListItemDataInterface;

class ProductListItem implements ProductListItemDataInterface
{
    private string $id;
    private string $title;
    private int $amount;
    /** @var array<string, mixed>*/
    private array $properties;

    public function __construct(string $id, string $title, int $amount, array $properties)
    {
        $this->id = $id;
        $this->title = $title;
        $this->amount = $amount;
        $this->properties = $properties;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return array
     */
    public function getProperties(): array
    {
        return $this->properties;
    }
}
