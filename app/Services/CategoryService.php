<?php

namespace App\Services;

use App\Services\Interfaces\CategoryInterfaceService;
use App\Repositories\Interfaces\CategoryInterfaceRepository;
use Illuminate\Support\Collection;

class CategoryService implements CategoryInterfaceService
{
    public function __construct(protected CategoryInterfaceRepository $categoryRepo) {}

    public function postCategory($data): bool
    {
        $response = $this->categoryRepo->postCategory($data);
        return $response;
    }

    public function getCategory(): Collection
    {
        $response = $this->categoryRepo->getCategory();

        return $response;
    }
}
