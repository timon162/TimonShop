<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\CategoryInterfaceRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;

class CategoryRepository implements CategoryInterfaceRepository
{
    public function postCategory(array $data): bool
    {
        $category = DB::table('timon_shop_categories')->insert($data);
        return $category;
    }

    public  function getCategory(): Collection
    {
        $category = DB::table('timon_shop_categories')->get();
        return $category;
    }

    public function  deleteCategory(int $id): int
    {
        $category = DB::table('timon_shop_categories')->where('id', $id)->delete();
        return $category;
    }

    public function updateCategory(int $id, array $data): bool
    {
        $category = DB::table('timon_shop_categories')->where('id', $id)->update(Arr::only($data, [
            'category_name',
            'category_image',
        ]));
        return $category;
    }
}
