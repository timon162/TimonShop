<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface OrderInterfaceRepository
{
    public function getOrder(): Collection;
}
