<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\CategoryInterfaceService;
use App\Http\Requests\CategoryRequest;

class DefaultController extends Controller
{
    public function __construct(protected CategoryInterfaceService $categoryService) {}

    public function viewDefault()
    {
        return view('defaults.content_default');
    }
}
