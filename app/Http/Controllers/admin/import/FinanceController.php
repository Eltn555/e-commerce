<?php

namespace App\Http\Controllers\admin\import;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Finance;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        $finances = Finance::all();
        return view('admin.import.finances.index', compact('finances', 'customers'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Finance::create([
            'sale_id' => $data['customer_id'],
            'given' => $data['amount'],
            'debt' => 0
        ]);
        return redirect()->route('admin.import.finances');
    }
}
