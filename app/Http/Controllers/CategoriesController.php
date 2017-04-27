<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index() {
        $categories = Category::withCount('notes')->get();

        return view('categories.index', compact('categories'));
    }
}