<?php

namespace App\Http\Controllers;

use App\Models\Serveur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;


class    ServeurController extends Controller
{
    public function index() {

        $serveurs = Serveur::orderBy('id','DESC')->paginate(5);

        return view('serveur.index',['serveurs' => $serveurs]);
    }

    public function create() {
        return view('serveur.create');
    }


    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'NomServeur' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',
            'status' => 'required',
        ]);

        if ( $validator->passes() ) {

            // option #1
            // Save data here
            // $serveur = new serveur();
            // $serveur ->nom = $request->nom;
            // $serveur ->email= $request->email;
            // $serveur ->telephone= $request->telephone;
            // $serveur ->adresse= $request->adresse;
            // $serveur ->status= $request->status;
            // $serveur ->save();

            // option #2
            // $serveur= new serveur();
            // $serveur->fill($request->post())->save();

            // option #3
            $serveur = serveur::create($request->post());

            // Upload image here
            
            
            return redirect()->route('admin/serveurs')->with('success','serveur added successfully.');


        } else {
            // return with errrors
            return redirect()->route('serveurs.create')->withErrors($validator)->withInput();
        }
    }

    public function edit(serveur $serveur) {
        //$serveur = serveur::findOrFail($id);       
        return view('serveur.edit',['serveur' => $serveur]);
    }
    public function update(serveur $serveur, Request $request) {

        $validator = Validator::make($request->all(),[
                    'NomServeur' => 'required',
                    'email'=>'required',
                    'telephone' => 'required',
                    'adresse' => 'required',
                    'status' => 'required',
            
        ]);

        if ( $validator->passes() ) {
           

            $serveur->fill($request->post())->save();

            // Upload image here
          
            return redirect()->route('admin/serveurs')->with('success','serveur updated successfully.');


        } else {
            // return with errrors
            return redirect()->route('serveurs.edit',$serveur->id)->withErrors($validator)->withInput();
        }
    }
    

    public function destroy(serveur $serveur, Request $request) {
                       
        File::delete(public_path().'/uploads/serveurs/'.$serveur->image);
        $serveur->delete();        
        return redirect()->route('admin/serveurs')->with('success','serveur deleted successfully.');
    }
}
