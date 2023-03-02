<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class ProductFiltersDto extends DataTransferObject
{
    public $filters;
    /** @var \App\Models\Product|null */
    public ?\App\Models\Product $product;

    /**
     * @return array|null
     */
    public function getFilters(): ?array
    {
        return $this->filters;
    }

}
