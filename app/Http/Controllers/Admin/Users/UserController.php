<?php
/**
 * Created by PhpStorm.
 * User: Speht
 * Date: 18/04/2020
 * Time: 14:27
 */

namespace App\Http\Controllers\Admin\Users;


use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }
}