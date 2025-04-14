<?php

namespace App\Http\Controllers\dashboard;

use App\Models\dashboard\Category;
use Illuminate\Http\Request;
use App\Models\dashboard\Resturant;
use App\Http\Controllers\Controller;
use App\Models\dashboard\Order;
use App\Models\dashboard\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('dashboard.welcome', compact('users'));
    }
}
