<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

// WebからAPIトークンを取得する
class ApiTokenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $user = Auth::user(); 
        $token = $user->createToken('hackernews')->accessToken;
        return response()->json(['token' => $token]);
    }
}