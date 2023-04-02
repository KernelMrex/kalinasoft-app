<?php
declare(strict_types=1);

namespace App\Module\User\App\Model;

class Token
{
    private ?string $id = null;
    private string $userId = '';
    private string $value = '';

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     * @return Token
     */
    public function setId(?string $id): Token
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     * @return Token
     */
    public function setUserId(string $userId): Token
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return Token
     */
    public function setValue(string $value): Token
    {
        $this->value = $value;
        return $this;
    }
}
