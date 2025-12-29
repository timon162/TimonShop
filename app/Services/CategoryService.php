<?php

namespace App\Services;

use App\Services\Interfaces\CategoryInterfaceService;
use App\Repositories\Interfaces\CategoryInterfaceRepository;
use App\Results\BooleanResult;
use Illuminate\Support\Collection;
use App\Exceptions\CategoryException;

class CategoryService implements CategoryInterfaceService
{
    public function __construct(protected CategoryInterfaceRepository $categoryRepo) {}

    public function postCategory(array $data)
    {
        $response = $this->categoryRepo->postCategory($data);
        if ($response == false) {
            throw new CategoryException('post category thất bại');
        }
    }

    public function getCategory(): Collection
    {
        $response = $this->categoryRepo->getCategory();
        if (!$response) {
            throw new CategoryException();
        }
        return $response;
    }
}
