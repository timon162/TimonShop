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
        $dataProduct = $this->productSevice->getProduct()->data;
        return view('admins.content_admins.content_homes.home_view', compact('dataProduct'));
    }

    public function viewUserHome()
    {
        $dataProduct = $this->productSevice->getProduct()->data;
        return view('users.content_users.content_homes.home_view', compact('dataProduct'));
    }
}
