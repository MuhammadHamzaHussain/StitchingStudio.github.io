<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Carbon\Carbon;

class IncomeController extends Controller
{
    public function showMonthlyIncome()
{
    // Fetch total income grouped by month and year
    $payments = Payment::selectRaw('MONTH(date) as month, YEAR(date) as year, SUM(paid) as total_income')
        ->groupBy('month', 'year')
        ->orderBy('year', 'desc')
        ->orderBy('month', 'desc')
        ->get();

    // Calculate the total income for the current month
    $currentMonth = Carbon::now()->month;
    $currentYear = Carbon::now()->year;
    $monthlyIncome = Payment::whereMonth('date', $currentMonth)
        ->whereYear('date', $currentYear)
        ->sum('paid');

    // Pass the data to the view
    return view('monthly-income', compact('payments', 'monthlyIncome'));
}

}

