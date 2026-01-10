<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\ProductInterfaceService;

class DefaultController extends Controller
{
    public function __construct(
        protected ProductInterfaceService $productService,
    ) {}


    public function viewDefault()
    {
        $dataProduct = $this->productService->getProduct()->data;
        return view(
            'defaults.content_default',
            compact('dataProduct')
        );
        return view('');
    }
}
