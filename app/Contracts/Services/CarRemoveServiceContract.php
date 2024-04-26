<?php

namespace App\Contracts\Services;

interface CarRemoveServiceContract
{
    public function delete(int $id);
}