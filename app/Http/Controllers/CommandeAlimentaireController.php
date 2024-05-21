<?php

namespace App\Http\Controllers;

use App\Models\CommandeAlimentaire;
use App\Models\Alimentaire;
use App\Models\Commande;
use App\Models\SizeAlimentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CommandeAlimentaireController extends Controller
{
    
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $commandealimentaires = Commandealimentaire::orderBy('id','DESC')->paginate(5);
    
            return view('commandealimentaire.index',['commandealimentaires' => $commandealimentaires]);
            
        }
    
        public function create() {
            $commandes = Commande::select("id","NoCmd")->get();
            $alimentaires = Alimentaire::select("id","NomAlimentaire")->get();
            $size_alimentaires = SizeAlimentaire::select("id","prix")->get();
            $all = [
                "commandes"=>$commandes,
                "alimentaires" => $alimentaires,
                "size_alimentaires" => $size_alimentaires,
            ];
            return view('commandealimentaire.create',$all);
        }
    
         public function store(Request $request) {
            $validator = Validator::make($request->all(),[
                'quantite' => 'required',
                'montant' => 'required',
            ]);
    
            if ( $validator->passes() ) {
    
              
                   
                // "user_id"=>$user->id,
             
                CommandeAlimentaire::create([
                    "commande_id"=>$request->NoCmd,
                    "alimentaire_id"=>$request->NomAlimentaire,
                    "size_alimentaire_id"=>$request->prix,
                    "quantite"=>$request->quantite,
                    "montant"=>$request->montant,
                ]);
    
           
    
                
                
                return redirect()->route('admin/commandealimentaire')->with('success','commandealimentaire added successfully.');
    
    
            } else {
                // return with errrors
                return redirect()->route('commandealimentaire.create')->withErrors($validator)->withInput();
            }
        }
    
        public function edit(commandealimentaire $commandealimentaire) {
            $commandes = Commande::select("id","NoCmd")->get();
            $alimentaires = Alimentaire::select("id","NomAlimentaire")->get();
            $size_alimentaires = SizeAlimentaire::select("id","prix")->get();
            $all = [
                "commandes"=>$commandes,
                "alimentaires" => $alimentaires,
                "size_alimentaires" => $size_alimentaires,     
            ];
            return view('commandealimentaire.edit',$all);
        }
    
        public function update(commandealimentaire $commandealimentaire, Request $request) {
    
            $validator = Validator::make($request->all(),[
                'quantite' => 'required',
                'montant' => 'required',
            
            ]);
    
            if ( $validator->passes() ) {
               
                $commandealimentaire->update([
                    "commande_id"=>$request->NoCmd,
                    "alimentaire_id"=>$request->NomAlimentaire,
                    "size_alimentaire_id"=>$request->prix,
                    "quantite"=>$request->quantite,
                    "montant"=>$request->montant,
                ]);
    
                
    
                // Upload image here
              
                return redirect()->route('admin/commandealimentaire')->with('success','commandealimentaire updated successfully.');
    
    
            } else {
                // return with errrors
                return redirect()->route('commandealimentaire.edit',$commandealimentaire->id)->withErrors($validator)->withInput();
            }
        }
    
        function destroy(commandealimentaire $commandealimentaire, Request $request) {
                           
            File::delete(public_path().'/uploads/commandealimentaires/'.$commandealimentaire->image);
            $commandealimentaire->delete();        
            return redirect()->route('admin/commandealimentaire')->with('success','commandealimentaire deleted successfully.');
        }
         }