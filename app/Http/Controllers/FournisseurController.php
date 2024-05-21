<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class FournisseurController extends Controller
{
    public function index() {

        $fournisseurs = fournisseur::orderBy('id','DESC')->paginate(5);

        return view('fournisseur.index',['fournisseurs' => $fournisseurs]);
    }

    public function create() {
        return view('fournisseur.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'NomFournisseur' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',
            'status' => 'required',
        ]);

        if ( $validator->passes() ) {

            // option #1
            // Save data here
            // $fournisseur = new fournisseur();
            // $fournisseur ->nom = $request->nom;
            // $fournisseur ->email= $request->email;
            // $fournisseur ->telephone= $request->telephone;
            // $fournisseur ->adresse= $request->adresse;
            // $fournisseur ->status= $request->status;
            // $fournisseur ->save();

            // option #2
            // $fournisseur= new fournisseur();
            // $fournisseur->fill($request->post())->save();

            // option #3
            $fournisseur = fournisseur::create($request->post());

            // Upload image here
            
            
            return redirect()->route('admin/fournisseurs')->with('success','fournisseur added successfully.');


        } else {
            // return with errrors
            return redirect()->route('fournisseurs.create')->withErrors($validator)->withInput();
        }
    }

    public function edit(fournisseur $fournisseur) {
        //$fournisseur = fournisseur::findOrFail($id);       
        return view('fournisseur.edit',['fournisseur' => $fournisseur]);
    }

    public function update(fournisseur $fournisseur, Request $request) {

        $validator = Validator::make($request->all(),[
            'NomFournisseur' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',
            'status' => 'required',
        ]);

        if ( $validator->passes() ) {
           

            $fournisseur->fill($request->post())->save();

            // Upload image here
          
            return redirect()->route('admin/fournisseurs')->with('success','fournisseur updated successfully.');


        } else {
            // return with errrors
            return redirect()->route('fournisseurs.edit',$fournisseur->id)->withErrors($validator)->withInput();
        }
    }

    public function destroy(fournisseur $fournisseur, Request $request) {
                       
        File::delete(public_path().'/uploads/fournisseurs/'.$fournisseur->image);
        $fournisseur->delete();        
        return redirect()->route('admin/fournisseurs')->with('success','fournisseur deleted successfully.');
        
    }
}



    