<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddOrder;
use Carbon\Carbon;

class ProfitController extends Controller
{
    public function showMonthlyProfit()
    {
        // Fetch total profit grouped by month and year using 'doc' as the date field
        $profits = AddOrder::selectRaw('MONTH(doc) as month, YEAR(doc) as year, SUM(profit) as total_profit')
            ->groupBy('month', 'year')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        // Calculate the total profit for the current month
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $monthlyProfit = AddOrder::whereMonth('doc', $currentMonth)
            ->whereYear('doc', $currentYear)
            ->sum('profit');

        // Pass the data to the view
        return view('monthly-profit', compact('profits', 'monthlyProfit'));
    }
}
?>
