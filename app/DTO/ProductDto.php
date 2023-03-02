<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class ProductDto extends DataTransferObject
{

    protected array $exceptKeys = ['id'];

    /** @var integer|null */
    public $id;
    /** @var string|null */
    public $name;
    /** @var integer|string|null */
    public $price;
    /** @var integer|null */
    public $quantity;
    /** @var array|null */
    public $properties;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return int|string|null
     */
    public function getPrice(): int|string|null
    {
        return $this->price;
    }

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @return array|null
     */
    public function getProperties(): ?array
    {
        return $this->properties;
    }




}
