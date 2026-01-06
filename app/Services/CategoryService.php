<?php

namespace App\Services;

use App\Services\Interfaces\CategoryInterfaceService;
use App\Repositories\Interfaces\CategoryInterfaceRepository;
use App\Results\BooleanResult;
use Illuminate\Support\Collection;
use App\Exceptions\CategoryException;
use App\Exceptions\FalseException;
use App\Results\CategoryResult;

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

    public function getCategory(): CategoryResult
    {
        $response = $this->categoryRepo->getCategory();
        if (!$response) {
            throw new CategoryException();
        }

        $category = $response->map(fn($items) => [
            'categoryId' => $items->id,
            'categoryName' => $items->category_name,
            'categoryImage' => $items->category_image,
        ])->toArray();

        return new CategoryResult($category);
    }

    public function deleteCategory(int $id): void
    {
        $result = $this->categoryRepo->deleteCategory($id);
        if ($result === 0) {
            throw new FalseException();
        };
    }

    public function updateCategory(array $data): void
    {
        $id = $data['category_id'];

        $dataCategory =  [
            'category_name' => $data['category_name'],
        ];

        if (isset($data['category_img'])) {
            $path = $data['category_img']->store('category', 'public');
            $dataCategory['category_image'] = asset('storage/' . $path);
        }

        $result = $this->categoryRepo->updateCategory($id, $dataCategory);

        if ($result === false) {
            throw new FalseException();
        }
    }
}
