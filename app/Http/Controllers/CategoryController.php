<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function mainCategories()
    {
        $allMainCategories=Category::where("parent_id",0)->get();
    }

}
