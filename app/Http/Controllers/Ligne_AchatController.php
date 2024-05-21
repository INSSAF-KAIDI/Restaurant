<?php

namespace App\Http\Controllers;

use App\Models\Ligne_Achat;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;


class Ligne_AchatController extends Controller
{
    public function index() {

        $ligne_achats = ligne_achat::orderBy('id','DESC')->paginate(5);

        return view('ligne_achat.index',['ligne_achats' => $ligne_achats]);
    }

    public function create() {
        $fournisseurs = Fournisseur::select("id","NomFournisseur")->get();
        $all = [
            "fournisseurs"=>$fournisseurs,
        
        ];
        return view('ligne_achat.create',$all);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'no_invoice' => 'required',
            'montant' => 'required',
            'date' => 'required',
            'status' => 'required',
        ]);

        if ( $validator->passes() ) {

          
            
                     
            Ligne_Achat::create([
                
                "fournisseur_id"=>$request->NomFournisseur,
                "no_invoice"=>$request->no_invoice,
                "montant"=>$request->montant,
                "date"=>$request->date,
                "status" =>$request->status,
            ]);

       

            
            
            return redirect()->route('admin/ligne_achats')->with('success','ligne_achat added successfully.');


        } else {
            // return with errrors
            return redirect()->route('ligne_achats.create')->withErrors($validator)->withInput();
        }
    }
    public function edit(ligne_achat $ligne_achat) {
        
        $fournisseurs = Fournisseur::select("id","NomFournisseur")->get();
        $all = [
            "fournisseurs" =>  $fournisseurs,
            
            'ligne_achat' => $ligne_achat,
        ];    
        return view('Ligne_Achat.edit',$all);
    }

    public function update(ligne_achat $ligne_achat, Request $request) {

        $validator = Validator::make($request->all(),[
            'no_invoice' => 'required',
            'montant' => 'required',
            'date' => 'required',
            'status' => 'required',
        ]);

        if ( $validator->passes() ) {
           $email_exists = fournisseur::where("email",$request->email)->exists();

            if( $email_exists ==false)
            {
                fournisseur::where("id",$ligne_achat->fournisseur_id)->update([
                    "email"=>$request->email,
                ]);
            }
            if($request->password != '')
            {
                fournisseur::where("id",$ligne_achat->fournisseur_id)->update([
                    "password"=>$request->password ,
                ]);
                
            }
            fournisseur::where("id",$ligne_achat->fournisseur_id)->update([
                "name"=>$request->nom,
            ]);
            $ligne_achat->update([
                "adresse"=>$request->adresse,
                "date"=>$request->date,
                "status"=>$request->status,
            ]);

            // Upload image here
          
            return redirect()->route('admin/ligne_achats')->with('success','ligne_achat updated successfully.');


        } else {
            // return with errrors
            return redirect()->route('ligne_achats.edit',$ligne_achat->id)->withErrors($validator)->withInput();
        }
    }

    public function destroy(ligne_achat $ligne_achat, Request $request) {
                       
        File::delete(public_path().'/uploads/ligne_achats/'.$ligne_achat->image);
        $ligne_achat->delete();        
        return redirect()->route('admin/ligne_Achats')->with('success','ligne_achat deleted successfully.');
    }
}
