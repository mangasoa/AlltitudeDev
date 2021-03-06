<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        /*$clients = Client::all()->toArray();
        return array_reverse($clients);

        $clients = Client::all();
        return ($clients);
        */

        return Client::orderBy('created_at', 'DESC')->get();
    }

    public function listAsc()
    {

        return Client::orderBy('name', 'ASC')->get();
    }

    public function listDesc()
    {

        return Client::orderBy('name', 'DESC')->get();
    }

    public function store(Request $request)
    {
        $client = new Client;

        $client->name = $request->client["name"];

        $client->save();

        return $client;
    }

/*    public function show($id)
    {
        $client = Client::find($id);
        return response()->json($client);
    }

*/
    public function update($id, Request $request)
    {
        $existingClient = Client::find($id);

        if($existingClient){
            $existingClient->completed = $request->client['completed'] ? true:false;
            $existingClient->completed_at = $request->client['completed'] ? Carbon::now():null;
            $existingClient->save();
            return $existingClient;

            //return response()->json('Client updated!');

            /*$client = Client::find($id);
            $client->update($request->all());
            return $client;
            */

        }
        return "Client not found.";
    }

    public function destroy($id)
    {

        $existingClient = Client::find($id);
        if($existingClient){
           $existingClient->delete();
            return "Client not found.";
        }
        return "Client not found.";
       // return response()->json('Client deleted!');
    }

}

