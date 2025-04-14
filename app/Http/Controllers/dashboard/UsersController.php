<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    use Message_Trait;

    public function index()
    {
        $users = User::where('type','user')->orderBy('id','desc')->get();
        return view('dashboard.users.index',compact('users'));
    }
}
