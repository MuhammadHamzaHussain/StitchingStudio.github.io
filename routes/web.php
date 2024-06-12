<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StaffDetailController;
use App\Http\Controllers\DesignationDetailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\MeasurementsController;
use App\Http\Controllers\SalaryDetailController;
use App\Http\Controllers\AddOrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuitController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ProfitController;
use App\Http\Controllers\ImageController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Root route to login page
Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

// Register routes
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');
Route::post('/check-email', [UserController::class, 'checkEmail'])->name('check.email');


// Forgot password route
Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot-password');

// Order routes
Route::get('/add-order', function () {
    return view('add-order');
})->name('add-order');
Route::post('/add-order', [AddOrderController::class, 'store'])->name('orders.store');
Route::get('/add-order', [AddOrderController::class, 'create'])->name('add-order');
Route::get('/view-edit-orders/{status?}', [AddOrderController::class, 'index'])->name('view-edit-orders');
Route::delete('/add-order/{order}', [AddOrderController::class, 'destroy'])->name('add-order.destroy');
Route::get('/edit-orders/{id}', [AddOrderController::class, 'edit'])->name('edit-orders');
Route::put('/update-order/{id}', [AddOrderController::class, 'update'])->name('update-order');

// Customer routes
Route::get('/add-customer', function () {
    return view('add-customer');
})->name('add-customer');
Route::post('/add-customer', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/view-edit-customers', [CustomerController::class, 'index'])->name('view-edit-customers');
Route::delete('/customer/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
Route::match(['put', 'post'], '/customer/update/{id}', [CustomerController::class, 'update'])->name('customer.update');

// Measurements routes
Route::get('/add-measurements', function () {
    return view('add-measurements');
})->name('add-measurements');
Route::post('/measurements/store', [MeasurementsController::class, 'store'])->name('measurements.store');
Route::get('/view-edit-measurements', [MeasurementsController::class, 'index'])->name('view-edit-measurements');
Route::delete('/measurements/{measurement}', [MeasurementsController::class, 'destroy'])->name('measurements.destroy');
Route::get('measurements/{id}/edit', [MeasurementsController::class, 'edit'])->name('measurements.edit');
Route::put('/measurements/update/{id}', [MeasurementsController::class, 'update'])->name('measurements.update');

// Staff Management routes
Route::get('/add-staff', function () {
    return view('add-staff');
})->name('add-staff');
Route::post('/add-staff', [StaffDetailController::class, 'store'])->name('staff.store');
Route::get('/view-edit-staff', [StaffDetailController::class, 'index'])->name('view-edit-staff');
Route::delete('/staff/{id}', [StaffDetailController::class, 'destroy'])->name('staff.destroy');
Route::get('staff/{id}/edit', [StaffDetailController::class, 'edit'])->name('staff.edit');
Route::put('staff/{id}', [StaffDetailController::class, 'update'])->name('staff.update');
Route::get('/add-staff', [StaffDetailController::class, 'create'])->name('add-staff');

// Salary routes
Route::get('/pay-salary', [SalaryDetailController::class, 'create'])->name('pay-salary');
Route::post('/pay-salary', [SalaryDetailController::class, 'store'])->name('salary.store');
Route::get('/view-edit-pay-salary', [SalaryDetailController::class, 'index'])->name('view-edit-pay-salary');
Route::delete('/salary/{id}', [SalaryDetailController::class, 'destroy'])->name('salary.destroy');
Route::get('/edit-pay-salary/{id}', [SalaryDetailController::class, 'edit'])->name('salary.edit');
Route::put('/update-pay-salary/{id}', [SalaryDetailController::class, 'update'])->name('salary.update');






// Designation routes
Route::get('/add-designation', function () {
    return view('add-designation');
})->name('add-designation');
Route::post('/add-designation', [DesignationDetailController::class, 'store'])->name('designation.store');
Route::get('/view-edit-designation', [DesignationDetailController::class, 'index'])->name('view-edit-designation');
Route::delete('/delete-designation/{id}', [DesignationDetailController::class, 'destroy'])->name('designation.destroy');
Route::get('/edit-designation/{id}', [DesignationDetailController::class, 'edit'])->name('edit-designation');
Route::put('/designation/{id}', [DesignationDetailController::class, 'update'])->name('designation.update');

// Expense Management routes
Route::get('/add-expense', [ExpenseController::class, 'create'])->name('add-expense');
Route::post('/add-expense', [ExpenseController::class, 'store'])->name('expense.store');
Route::get('/view-edit-expense', [ExpenseController::class, 'index'])->name('view-edit-expense');
Route::delete('/expenses/{expense}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
Route::get('expenses/{id}/edit', [ExpenseController::class, 'edit'])->name('expenses.edit');
Route::put('expenses/{id}', [ExpenseController::class, 'update'])->name('expenses.update');
Route::get('/add-expense-category', function () {
    return view('add-expense-category');
})->name('add-expense-category');
Route::post('/expense-category/store', [ExpenseCategoryController::class, 'store'])->name('expense-category.store');
Route::get('/view-edit-expense-category', [ExpenseCategoryController::class, 'index'])->name('view-edit-expense-category');
Route::delete('/expense-categories/{id}', [ExpenseCategoryController::class, 'destroy'])->name('expense-category.destroy');
Route::get('expense-category/{id}/edit', [ExpenseCategoryController::class, 'edit'])->name('expense-category.edit');
Route::put('expense-category/{id}', [ExpenseCategoryController::class, 'update'])->name('expense-category.update');

// Receipt route
Route::post('/receipt', [AddOrderController::class, 'showReceipt'])->name('receipt');


// Payment routes
Route::get('/add-payments', function (Illuminate\Http\Request $request) {
    $customerName = $request->input('customer_name', 'No Name'); // Default to 'No Name' if not provided
    $orderId = $request->input('order_id', ''); // Default to an empty string if not provided
    $amount = $request->input('amount', ''); // Default to an empty string if not provided
    return view('add-payments', compact('customerName', 'orderId', 'amount'));
})->name('add-payments');
Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');

// Ensure that the 'auth.custom' middleware is applied to the dashboard route
Route::middleware(['auth.custom'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
});


// Suit routes
Route::get('/total-suits', [SuitController::class, 'showTotalSuits'])->name('total-suits');

// Income routes
Route::get('/monthly-income', [IncomeController::class, 'showMonthlyIncome'])->name('monthly-income');

// Profit routes
Route::get('/monthly-profit', [ProfitController::class, 'showMonthlyProfit'])->name('monthly-profit');

// Visualization route
Route::get('/visualization', function () {
    return view('visualization');
})->name('visualization');
Route::post('images/store', [ImageController::class, 'store'])->name('images.store');



// API routes for charts
Route::get('/api/income-profit-data', [DashboardController::class, 'getIncomeProfitData']);
Route::get('/api/suits-chart-data', [DashboardController::class, 'getSuitsChartData']);





// Profile routes
Route::get('/profile', function () {
    return view('profile');
})->name('profile');