<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        return view('users.profile');
        
    }


    public function painting(){

        $current_user_id = auth()->user()->id;
        $user_paintings = User::find($current_user_id)->profile;
        return view('users.profile', [
            'user_paintings' => $user_paintings
        ]);
    }
}
