<?php

namespace App\Http\Controllers\front\store\website;

use App\Http\Controllers\Controller;
use App\Models\dashboard\Store;
use Illuminate\Http\Request;

class StoreFrontController extends Controller
{
    public function show(Store $store)
    {
        if (!$store) {
            abort(404);
        }
        return view('front.stores.index', compact('store'));
    }
}
