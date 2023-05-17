<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Customer;
use App\Models\Finance;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function index() {
            $clients = Client::all();
            $finances = Finance::all();
            foreach ($finances as $finance){
                dd($finance->client);
            }
           return view('admin.finance.index', compact('clients', 'finances'));
    }

    public function store(Request $request) {
        dd($request->all());
    }
}
