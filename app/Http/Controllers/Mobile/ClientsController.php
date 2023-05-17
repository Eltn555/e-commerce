<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index() {
        $clients = Client::all();
        return view('mobile.clients.index', compact('clients'));
    }

    public function show($id) {
        $client = Client::find($id);
        //dd($client->sales);
        return view('mobile.clients.show', compact('client'));
    }

    public function store(){
        $data = request()->validate([
            'name'=>'string',
            'phone_number'=> 'string',
            'address'=>'string'
            ]);
        Client::create($data);
        return redirect('clients');
    }
}
