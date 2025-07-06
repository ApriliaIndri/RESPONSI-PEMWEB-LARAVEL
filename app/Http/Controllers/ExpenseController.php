<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::where('user_id', Auth::id())->get();
        $total = $expenses->sum('jumlah');
        return view('expenses.index', compact('expenses', 'total'));
    }

    public function create()
    {
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'judul' => 'required|string|max:255',
            'jumlah' => 'required|numeric',
        ]);

        Expense::create([
            'user_id' => Auth::id(),
            'tanggal' => $request->tanggal,
            'judul' => $request->judul,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('expenses.index');
    }

    public function edit(Expense $expense)
    {
        return view('expenses.edit', compact('expense'));
    }

    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'judul' => 'required|string|max:255',
            'jumlah' => 'required|numeric',
        ]);

        $expense->update([
            'tanggal' => $request->tanggal,
            'judul' => $request->judul,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('expenses.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index');
    }
}
