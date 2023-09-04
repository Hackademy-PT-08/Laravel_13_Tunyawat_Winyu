<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id){

        $categories = Categories::find($id);

        return view('categories.show-category-post', [
            'paintings' => $categories->paintings,
            'categoryName' => $categories->name
        ]);
    }
}
