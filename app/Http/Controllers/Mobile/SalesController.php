<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleProduct;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index() {
        $sales = Sale::all();
        return view('mobile.sales.index', compact('sales'));
    }

    public function create() {
        $products = Product::all();
        return view('mobile.sales.create', compact('products'));
    }

    public function store()
    {
        $clientId = rand(100000,999999);
        $sale = Sale::create([
            'client_id' => $clientId,
            'amount'=> rand(100000,999999)
        ]);

        $data = request()->all();
        $product = $data['product'];
        $price = $data['price'];
        $count = $data['count'];
        $amount = $data['amount'];
        for($i = 0; $i < count($product); $i++){
                SaleProduct::create([
                    'sale_id' => (int)$sale->id,
                    'product_id' => 1231241,
                    'price' => (int)$price[$i],
                    'count' => (int)$count[$i],
                    'total' => (int)$amount[$i]
                ]);
        }
        dump($sale);
        dump('products');
        dump($sale->products);

    }
}
