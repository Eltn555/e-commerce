<?php

namespace App\Http\Controllers\admin\import;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Finance;
use App\Models\ImportSale;
use App\Models\importSaleProduct;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index() {
        $sales = ImportSale::all();
        return view('admin.import.sales.index', compact('sales'));
    }

    public function create() {
        $customers = Customer::all();
        $products = Product::all();
        return view('admin.import.sales.create', compact('customers', 'products'));
    }

    public function store(Request $request) {
        $data = $request->all();
        $sale = ImportSale::create([
            'customer_id' => $data['customer'],
            'amount' => $data['total'],
            'debt' => $data['paid'] !== $data['total'] ? $data['total'] - $data['paid'] : 0,
        ]);

        $finance = Finance::create([
            'sale_id' => $sale->id,
            'given' => $data['paid'],
            'debt' => $data['total'] - $data['paid']
        ]);

        for ($i = 0; $i < count($data['product']); $i++) {
            $prod = Product::find($data['product'][$i]);
            ImportSaleProduct::create([
                'sale_id' => (int)$sale->id,
                'product_id' => $data['product'][$i],
                'price' => (int)$data['price'][$i],
                'count' => (int)$data['count'][$i],
                'total' => (int)$data['amount'][$i]
            ]);

            $prod->update([
                'buy'=>$data['price'][$i],
                'sell' => $prod['sell'] <  $data['price'][$i] ? $data['price'][$i] + ($data['price'][$i] * 0.15) : $prod['sell'],
                'stock' => $prod->stock + $data['count'][$i]
            ]);
        }
        return redirect()->route('admin.import.sales');
    }

    public function show($id) {
        $sale = ImportSale::find($id);
        return view('admin.import.sales.show', compact('sale'));
    }
}
