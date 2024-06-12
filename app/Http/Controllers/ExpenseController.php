<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use Carbon\Carbon;

class ExpenseController extends Controller
{
    public function create()
    {
        $expenseCategories = ExpenseCategory::all();
        return view('add-expense', compact('expenseCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'expense_category' => 'required',
            'description' => 'required|string|max:255',
            'date' => 'required|date_format:d-m-Y',
            'amount' => 'required|numeric',
        ]);

        $date = Carbon::createFromFormat('d-m-Y', $request->input('date'))->format('Y-m-d');

        $categoryName = ExpenseCategory::where('id', $request->input('expense_category'))->first()->expenseCategoryName;

        Expense::create([
            'expense_category' => $categoryName,
            'description' => $request->input('description'),
            'date' => $date,
            'amount' => $request->input('amount'),
        ]);

        return response()->json(['success' => 'Expense added successfully!']);
    }

    public function index()
    {
        $expenses = Expense::all();
        return view('view-edit-expense', compact('expenses'));
    }

    public function destroy($id)
{
    $expense = Expense::findOrFail($id);
    $expense->delete();

    return response()->json(['success' => 'Expense deleted successfully!']);
}

public function edit($id)
{
    $expense = Expense::findOrFail($id);
    $expenseCategories = ExpenseCategory::all();
    return view('edit-expense', compact('expense', 'expenseCategories'));
}



public function update(Request $request, $id)
{
    $request->validate([
        'expense_category' => 'required',
        'description' => 'required|string|max:255',
        'date' => 'required|date_format:d-m-Y',
        'amount' => 'required|numeric',
    ]);

    $expense = Expense::findOrFail($id);

    $date = Carbon::createFromFormat('d-m-Y', $request->input('date'))->format('Y-m-d');

    $categoryName = ExpenseCategory::where('id', $request->input('expense_category'))->first()->expenseCategoryName;

    $expense->update([
        'expense_category' => $categoryName,
        'description' => $request->input('description'),
        'date' => $date,
        'amount' => $request->input('amount'),
    ]);

    return response()->json(['success' => 'Expense updated successfully!']);
}


public function getTotalExpenses()
{
    $totalExpenses = Expense::sum('amount');
    return response()->json(['total_expenses' => $totalExpenses]);
}


}