<?php

namespace App\DTO;

class CatalogFilterDTO
{
    private ?string $model = null;
    private ?int $minPrice = 0;
    private ?int $maxPrice = 0;
    private ?string $orderPrice = null;
    private ?string $orderModel = null;
    private array $allCategories = [];

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): CatalogFilterDTO
    {
        $this->model = $model;

        return $this;
    }

    public function getMinPrice(): ?int
    {
        return $this->minPrice;
    }

    public function setMinPrice(?int $minPrice): CatalogFilterDTO
    {
        $this->minPrice = $minPrice;

        return $this;
    }

    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    public function setMaxPrice(?int $maxPrice): CatalogFilterDTO
    {
        $this->maxPrice = $maxPrice;

        return $this;
    }

    public function getOrderPrice(): ?string
    {
        return $this->orderPrice;
    }

    public function setOrderPrice(?string $orderPrice): CatalogFilterDTO
    {
        if ($orderPrice !== null) {
            $orderPrice = $orderPrice === 'desc' ? 'desc' : 'asc';
        }

        $this->orderPrice = $orderPrice;

        return $this;
    }

    public function getOrderModel(): ?string
    {
        return $this->orderModel;
    }

    public function setOrderModel(?string $orderModel): CatalogFilterDTO
    {
        if ($orderModel !== null) {
            $orderModel = $orderModel === 'desc' ? 'desc' : 'asc';
        }

        $this->orderModel = $orderModel;

        return $this;
    }
}