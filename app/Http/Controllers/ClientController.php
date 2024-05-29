<?php

namespace App\Http\Controllers;
use App\Exports\ClientExport;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
class ClientController extends Controller
{
    public function index() {

        $clients = Client::orderBy('id','DESC')->paginate(5);

        return view('client.index',['clients' => $clients]);
    }

    public function create() {

        return view('client.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'PrenomClient' => 'required',
            'email' => ['required',"unique:users,email"],
            'adresse' => 'required',
            'telephone' => 'required',
            'status' => 'required',
        ]);

        if ( $validator->passes() ) {

            $user = User::create([
                "name"=>$request->PrenomClient,
                "email"=>$request->email,
                "password"=>Hash::make($request->password),
            ]);
            // option #1
            // Save data here
            // $client = new client();
            // $client ->nom= $request->nom;
            // $client ->email= $request->quartier;
            // $client ->adresse= $request->adresse;
            // $client ->telephone= $request->telephone;
            // $client ->status= $request->status;
            // $client ->save();
            Client::create([
                "user_id"=>$user->id,
                "NomClient"=>$request->NomClient,
                "PrenomClient"=>$request->PrenomClient,
                "adresse"=>$request->adresse,
                "telephone"=>$request->telephone,
                "status"=>$request->status,
            ]);
            // option #2
            // $client= new client();
            // $client->fill($request->post())->save();

            // option #3


            return redirect()->route('clients.index')->with('success','client added successfully.');


        } else {
            // return with errrors
            return redirect()->route('clients.create')->withErrors($validator)->withInput();
        }
    }

    public function edit(client $client) {
        //$client = client::findOrFail($id);
        return view('client.edit',['client' => $client]);
    }
    public function update(client $client, Request $request) {

        $validator = Validator::make($request->all(),[
            'PrenomClient' => 'required',

            'adresse' => 'required',
            'telephone' => 'required',
            'status' => 'required',
        ]);

        if ( $validator->passes() ) {
           $email_exists = User::where("email",$request->email)->exists();

            if( $email_exists ==false)
            {
                User::where("id",$client->user_id)->update([
                    "email"=>$request->email,
                ]);
            }
            if($request->password != '')
            {
                User::where("id",$client->user_id)->update([
                    "password"=>$request->password ,
                ]);

            }
            User::where("id",$client->user_id)->update([
                "name"=>$request->PrenomClient,
            ]);
            $client->update([
                "adresse"=>$request->adresse,
                "telephone"=>$request->telephone,
                "status"=>$request->status,
            ]);

            // Upload image here

            return redirect()->route('clients.index')->with('success','client updated successfully.');


        } else {
            // return with errrors
            return redirect()->route('clients.edit',$client->id)->withErrors($validator)->withInput();
        }
    }

    public function destroy(client $client, Request $request) {

        File::delete(public_path().'/uploads/clients/'.$client->image);
        $client->delete();
        return redirect()->route('clients.index')->with('success','client deleted successfully.');
    }

    public function export(Request $request)

    {
        if($request->type=="xlsx"){

           $extension="xlsx";
           $exportFormat=\Maatwebsite\Excel\Excel::XLSX;

        }
            elseif($request->type=="csv"){

                $extension="csv";
                $exportFormat=\Maatwebsite\Excel\Excel::CSV;


            }

              elseif($request->type=="pdf"){

                    $extension="pdf";
                    $exportFormat=\Maatwebsite\Excel\Excel::MPDF;


              }
                  else{

                       $extension="xlsx";
                       $exportFormat=\Maatwebsite\Excel\Excel::XLSX;


                  }

        $filename='Clients-'.date('d-m-y').'.'.$extension;
        return Excel::download(new ClientExport, $filename,$exportFormat);

  }
 }
