<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function miApi(){
        $categories = Category::all();
        return response()->json($categories, 200);
    }

    public function getToken(){
        $user = User::first();
        $token = $user->createToken('mi-primer-token')->plainTextToken;
        return response()->json(['user' => $user, 'token' => $token], 200);
    }
}
