<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $categories = Category::tree()->get()->toTree();

        return view('home', [
            'categories' => $categories
        ]);
    }
}
