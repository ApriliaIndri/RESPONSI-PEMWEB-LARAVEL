<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Expense;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $expenses = $user->expenses;
        $total = $expenses->sum('jumlah');

        return view('index', compact('expenses', 'total'));
    }
}
