<?php

namespace App\Http\Controllers;
use App\Models\Commande;
use App\Models\Client;
use App\Models\Serveur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;



class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commandes = Commande::orderBy('id','DESC')->paginate(5);

        return view('commande.index',['commandes' => $commandes]);

    }

    public function create() {
        $serveurs = Serveur::select("id","NomServeur")->get();
        $clients = Client::select("id","NomClient")->get();
        $all = [
            "clients"=>$clients,
            "serveurs" => $serveurs
        ];
        return view('commande.create',$all);
    }

     public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'NoCmd' => 'required',
            'status' => 'required',
            'DateDemande' => 'required',
            'montant' => 'required',
        ]);

        if ( $validator->passes() ) {



            // "user_id"=>$user->id,

            Commande::create([
                "NoCmd"=>$request->NoCmd,
                "client_id"=>$request->NomClient,
                "serveur_id"=>$request->NomServeur,
                "status"=>$request->status,
                "DateDemande"=>$request->DateDemande,
                "montant"=>$request->montant,
            ]);





            return redirect()->route('commande.index')->with('success','commande added successfully.');


        } else {
            // return with errrors
            return redirect()->route('commande.create')->withErrors($validator)->withInput();
        }
    }

    public function edit(Commande $commande) {
        //$commande = commande::findOrFail($id);
        $serveurs = Serveur::select("id","NomServeur")->get();
        $clients = Client::select("id","NomClient")->get();
        $all = [
            "clients" =>  $clients,
            "serveurs" => $serveurs,
            'commande' => $commande,
        ];
        return view('commande.edit',$all);
    }

    public function update(Commande $commande, Request $request) {

        $validator = Validator::make($request->all(),[
            'NoCmd' => 'required',
            'status' => 'required',
            'DateDemande' => 'required',
            'montant' => 'required',
        ]);

        if ( $validator->passes() ) {

            $commande->update([

                "NoCmd"=>$request->NoCmd,
                "client_id"=>$request->NomClient,
                "serveur_id"=>$request->NomServeur,
                "status"=>$request->status,
                "DateDemande"=>$request->DateDemande,
                "montant"=>$request->montant,
            ]);



            // Upload image here

            return redirect()->route('commande.index')->with('success','commande updated successfully.');


        } else {
            // return with errrors
            return redirect()->route('commande.edit',$commande->id)->withErrors($validator)->withInput();
        }
    }

    function destroy(Commande $commande, Request $request) {

        File::delete(public_path().'/uploads/commandes/'.$commande->image);
        $commande->delete();
        return redirect()->route('commande.index')->with('success','commande deleted successfully.');
    }
     }
