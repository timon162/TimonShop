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

    public function postCategory(array $data): void
    {
        $requestData = [];

        foreach ($data['item_category'] as $items) {
            $urlCaterogy = null;
            $path = $items['file_img']->store('category', 'public');
            $urlCaterogy = asset('storage/' . $path);

            $requestData[] = [
                'category_name'   => $items['name'],
                'category_is_hot' => $items['check_hot'],
                'category_image'  => $urlCaterogy,
                'created_at'      => now(),
            ];
        }
        $response = $this->categoryRepo->postCategory($requestData);
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
