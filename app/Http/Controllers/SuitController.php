<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddOrder;

class SuitController extends Controller
{
    public function showTotalSuits()
    {
        // Fetch total suits grouped by month and year
        $orders = AddOrder::selectRaw('MONTH(doc) as month, YEAR(doc) as year, SUM(noOfSuits) as total_suits')
            ->groupBy('month', 'year')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        return view('total-suits', compact('orders'));
    }
}
