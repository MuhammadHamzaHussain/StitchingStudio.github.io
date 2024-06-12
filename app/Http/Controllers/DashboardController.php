<?php

namespace App\Http\Controllers;

use App\Models\AddOrder;
use App\Models\Payment;
use App\Models\Customer;
use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCustomers = Customer::count();
        $totalOrders = AddOrder::count();
        $completedOrders = AddOrder::where('completed', 'Yes')->count();
        $pendingOrders = AddOrder::where('completed', 'No')->count();
        $totalSuits = AddOrder::sum('noOfSuits'); // Calculate total number of suits

        // Calculate the total income for the current month based on payments
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $monthlyIncome = Payment::whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->sum('paid');

        // Calculate the total profit for the current month based on orders
        $monthlyProfit = AddOrder::whereMonth('doc', $currentMonth)
            ->whereYear('doc', $currentYear)
            ->sum('profit');

        // Calculate the total balance
        $totalBalance = $this->calculateTotalBalance();

        // Calculate the total expenses
        $totalExpenses = Expense::sum('amount');

        return view('dashboard', compact('totalCustomers', 'totalOrders', 'completedOrders', 'pendingOrders', 'totalSuits', 'monthlyIncome', 'monthlyProfit', 'totalBalance', 'totalExpenses'));
    }

    private function calculateTotalBalance()
    {
        $totalOrderAmount = AddOrder::sum('amount');
        $totalPaidAmount = Payment::sum('paid');

        return $totalOrderAmount - $totalPaidAmount;
    }

    public function getIncomeProfitData()
    {
        $incomeData = Payment::selectRaw('SUM(paid) as income, MONTH(date) as month')
            ->groupByRaw('MONTH(date)')
            ->orderByRaw('MONTH(date)')
            ->pluck('income', 'month')
            ->toArray();

        $profitData = AddOrder::selectRaw('SUM(profit) as profit, MONTH(doc) as month')
            ->groupByRaw('MONTH(doc)')
            ->orderByRaw('MONTH(doc)')
            ->pluck('profit', 'month')
            ->toArray();

        $expenseData = Expense::selectRaw('SUM(amount) as expense, MONTH(date) as month')
            ->groupByRaw('MONTH(date)')
            ->orderByRaw('MONTH(date)')
            ->pluck('expense', 'month')
            ->toArray();

        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        $income = array_fill(1, 12, 0);
        $profit = array_fill(1, 12, 0);
        $expenses = array_fill(1, 12, 0);

        foreach ($incomeData as $month => $amount) {
            $income[$month] = $amount;
        }

        foreach ($profitData as $month => $amount) {
            $profit[$month] = $amount;
        }

        foreach ($expenseData as $month => $amount) {
            $expenses[$month] = $amount;
        }

        $data = [
            'income' => array_values($income),
            'profit' => array_values($profit),
            'expenses' => array_values($expenses),
            'months' => $months
        ];

        return response()->json($data);
    }

    public function getSuitsChartData()
    {
        $suitsData = AddOrder::selectRaw('SUM(noOfSuits) as suits, MONTH(doc) as month')
            ->groupByRaw('MONTH(doc)')
            ->orderByRaw('MONTH(doc)')
            ->pluck('suits', 'month')
            ->toArray();

        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        $suits = array_fill(1, 12, 0);

        foreach ($suitsData as $month => $amount) {
            $suits[$month] = $amount;
        }

        $data = [
            'suits' => array_values($suits),
            'months' => $months
        ];

        return response()->json($data);
    }
}