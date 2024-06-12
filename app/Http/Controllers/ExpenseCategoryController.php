<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseCategory;

class ExpenseCategoryController extends Controller
{
    public function index()
    {
        $expenseCategories = ExpenseCategory::all();
        return view('view-edit-expense-category', ['expenseCategories' => $expenseCategories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'expenseCategoryName' => 'required|string|max:255',
        ]);

        ExpenseCategory::create([
            'expenseCategoryName' => $request->input('expenseCategoryName'),
        ]);

        return redirect()->back()->with('success', 'Expense category added successfully!');
    }

    public function destroy($id)
{
    $expenseCategory = ExpenseCategory::findOrFail($id);
    $expenseCategory->delete();
    return redirect()->back()->with('success', 'Expense category deleted successfully!');
}

public function edit($id)
    {
        $expenseCategory = ExpenseCategory::findOrFail($id);
        return view('edit-expense-category', ['expenseCategory' => $expenseCategory]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'expenseCategoryName' => 'required|string|max:255',
        ]);

        $expenseCategory = ExpenseCategory::findOrFail($id);
        $expenseCategory->update([
            'expenseCategoryName' => $request->input('expenseCategoryName'),
        ]);

        return redirect()->route('view-edit-expense-category')->with('success', 'Expense category updated successfully!');
    }

}
