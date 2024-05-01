<?php

namespace App\DTO;

class ApiSalonModel
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $image = null,
        public readonly ?string $address = null,
        public readonly ?string $phone = null,
        public readonly ?string $work_hours = null,
    ) {
    }
}