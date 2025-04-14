<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\User;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    use Message_Trait;

    public function index()
    {
        $companies = User::where('type', 'company')
            ->where('company_id', '!=', null)
            ->orderBy('id', 'desc')
            ->get();
        return view('dashboard.companies.index', compact('companies'));
    }
}
