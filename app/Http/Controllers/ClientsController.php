<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function create(Request $request)
    {
        $validation = $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:2'],
            'phoneNumber' => ['required', 'string', 'max:255', 'min:1']
        ]);

        $client = new Client();
        $client->name = $request->input('name');
        $client->phoneNumber = $request->input('phoneNumber');

        $client->save();


        return redirect()->route('clients-table');
    }

    public function showCreateClientForm(){
        return view('create-forms.create-client');
    }

    public function showClients(){
        $clients = Client::all();
        return view('show-table.clients-table', ['clients' => $clients]);
    }
}
