<?php
/**
 * Created by IntelliJ IDEA.
 * User: koichi.taura
 * Date: 2019/11/02
 * Time: 14:23
 */

namespace App\Http\Controllers;


class UserController extends Controller
{
    public function index()
    {
        return view('user_list');
    }
}
