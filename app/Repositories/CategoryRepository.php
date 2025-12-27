<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\CategoryInterfaceRepository;
use Illuminate\Support\Collection;

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
}
