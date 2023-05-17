<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Models\Sale;
use App\Models\SaleProduct;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.client.index', compact('clients'));
    }

    public function show($id)
    {
        $sales = Sale::where('client_id', $id)->orderBy('id', 'DESC')->get();
        $client = Client::find($id);
        $totalAmount = 0;
        foreach ($client->sales as $sale) {
            $totalAmount = (int)$sale->amount + (int)$totalAmount;
        }
        return view('admin.client.show', compact('client','sales', 'totalAmount'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('admin.client.create', compact('clients'));
    }

    public function store(ClientRequest $request)
    {
        $insertion = Client::create($request->all());

        return redirect()->route('admin.clients');
    }

    public function edit(ClientRequest $request, $id)
    {
        $data = $request->validated();
        $client = Client::find($id);
        $client->update($data);
        return redirect()->back();
    }

    public function destroy($id)
    {
        Client::destroy($id);
        return redirect()->route('admin.clients');
    }

    public function search(Request $request)
    {
        $clients = Client::where('name', 'Like', '%' . $request['search'] . '%')->orWhere('phone_number', 'Like', '%' . $request['search'] . '%')->orWhere('address', 'Like', '%' . $request['search'] . '%')
            ->orderBy($request->sort)->get();
        $output = '';
        foreach ($clients as $client) {
            $output .= view('admin.client.client-box', compact('client'));
        }
        return $output;
    }
}
