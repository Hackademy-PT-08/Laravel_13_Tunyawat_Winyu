<?php

namespace App\Http\Controllers;

use App\Models\Painting;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index (){
                
        $paintings = Painting::all();
        
        return view('home.homepage', [
            'paintings' => $paintings
        ]);
    }
}
