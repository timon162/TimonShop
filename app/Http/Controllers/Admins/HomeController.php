<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Interfaces\ProductInterfaceService;

class HomeController extends Controller
{
    public function __construct(protected ProductInterfaceService $productSevice) {}

    public function viewHome()
    {
        $product = $this->productSevice->getProduct();
        return view('admins.content_admins.content_homes.home_view', ['dataProduct' => $product]);
    }
}
