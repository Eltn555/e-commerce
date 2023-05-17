<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalesRequest;
use App\Models\Client;
use App\Models\Finance;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleProduct;
use Illuminate\Database\Eloquent\Relations\Concerns\ComparesRelatedModels;
use Illuminate\Http\Request;
use function PHPUnit\Framework\assertIsNotNumeric;

class SaleController extends Controller
{

    public function index()
    {
        $saleProduct = SaleProduct::all();
        $clients = Client::withTrashed()->get();
        $client = Client::all();
        $sales = Sale::orderBy('created_at','desc')->get();
        return view('admin.sales.index', compact('sales', 'clients', 'saleProduct', 'client'));
    }

    public function create()
    {
        $saleProduct = SaleProduct::all();
        $clients = Client::all();
        $sales = Sale::all();
        $products = Product::all();
        return view('admin.sales.create', compact('sales', 'clients', 'products'));
    }

    public function show($id)
    {
        $sale = Sale::find($id);
        return view('admin.sales.show', compact('sale'));
    }

    public function store()
    {
        $data = request()->all();
        $sale = Sale::create([
            'client_id' => $data['client'],
            'amount' => $data['total'],
            'debt' => $data['total'] - $data['paid'],
        ]);

        $debt = ($data['paid'] === '' || !is_numeric($data['paid']) ) ? $data['total'] : $data['total'] - $data['paid'];
        $paid = $data['total'] - $debt;
        $product = $data['product'];
        $price = $data['price'];
        $count = $data['count'];
        $amount = $data['amount'];
        for ($i = 0; $i < count($product); $i++) {
            $prod = Product::find($product[$i]);
            SaleProduct::create([
                'sale_id' => (int)$sale->id,
                'product_id' => $product[$i],
                'price' => (int)$price[$i],
                'count' => (int)$count[$i],
                'total' => (int)$amount[$i],
                'cost' => (int)$prod->buy
            ]);
            $prod->update([
                'stock' => $prod->stock - $count[$i]
            ]);
        }
        return redirect()->route('admin.sales');
    }

    public function storeSingle(){

    }

    public function search(Request $request)
    {
        $products = Product::where('title', 'Like', '%' . $request->search . '%')->orWhere('description', 'Like', '%' . $request->search . '%')->get();
        $prod = Product::where('title', $request->search)->get();
        $output = "";

        foreach ($products as $product) {
            $output .= '<div id=' . $product->id . ' class="col-span-12 p-1 dark:bg-darkmode-300 dark:border-darkmode-800/80 bg-white ajax_content border-2" style=" border-radius: 4px; cursor: pointer"><p class="title pl-1">' . $product->title . '</p>
        <p class="text-slate-400 font-8 pt-1">' . substr($product->description, 0, 26) . '</p></div>';
        }

        $data['amount'] = $request->id;
        $data['price'] = '';

        if ($request->id != '') {
            $getProdData = Product::find($request->id);
            $data['amount'] = $getProdData->stock;
            $data['price'] = $getProdData->buy;
        }

        $data['data'] = $output;
        $data['warning'] = $prod->isEmpty() ? 'Product not found' : $prod[0]['id'];
        return $data;
    }

    public function edit($id)
    {
        $sale = Sale::find($id);
        return view('admin.sales.edit', compact('sale'));
    }


    public function destroy($id)
    {
        $sale = Sale::find($id);
        foreach ($sale->products as $prod) {
            $product = Product::find($prod->product_id);
            $product->update([
                'stock' => $product->stock + $prod->count
            ]);
        }
        Sale::destroy($id);
        return redirect()->route('admin.sales');
    }
}
