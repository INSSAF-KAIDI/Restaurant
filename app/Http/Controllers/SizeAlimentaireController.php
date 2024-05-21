<?php

namespace App\Http\Controllers;

use App\Models\SizeAlimentaire;
use App\Models\Alimentaire;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SizeAlimentaireController extends Controller
{
    
    
    
    
   
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $sizealimentaires = sizealimentaire::orderBy('id','DESC')->paginate(5);
    
            return view('sizealimentaire.index',['sizealimentaires' => $sizealimentaires]);
            
        }
    
        public function create() {
            $sizes = size::select("id","Taille")->get();
            $alimentaires = Alimentaire::select("id","NomAlimentaire")->get();
            $all = [
                "alimentaires"=>$alimentaires,
                "sizes" => $sizes
            ];
            return view('sizealimentaire.create',$all);
        }
    
         public function store(Request $request) {
            $validator = Validator::make($request->all(),[
                'prix' => 'required',
                'status' => 'required',
                
            ]);
    
            if ( $validator->passes() ) {
    
              
                  
                        
                sizealimentaire::create([
                    
                    "alimentaire_id"=>$request->NomAlimentaire,
                    "size_id"=>$request->Taille,
                    "prix"=>$request->prix,
                    "status"=>$request->status,
                   
                ]);
    
           
    
                
                
                return redirect()->route('admin/sizealimentaire')->with('success','sizealimentaire added successfully.');
    
    
            } else {
                // return with errrors
                return redirect()->route('sizealimentaire.create')->withErrors($validator)->withInput();
            }
        }
    
        public function edit(sizealimentaire $sizealimentaire) {
            //$sizealimentaire = sizealimentaire::findOrFail($id);  
            $sizes = size::select("id","Taille")->get();
            $alimentaires = alimentaire::select("id","NomAlimentaire")->get();
            $all = [
                "alimentaires" =>  $alimentaires,
                "sizes" => $sizes,
                'sizealimentaire' => $sizealimentaire,
            ];    
            return view('sizealimentaire.edit',$all);
        }
    
        public function update(sizealimentaire $sizealimentaire, Request $request) {
    
            $validator = Validator::make($request->all(),[
                'prix' => 'required',
                'status' => 'required',
            ]);
    
            if ( $validator->passes() ) {
               
                $sizealimentaire->update([
    
                    "alimentaire_id"=>$request->NomAlimentaire,
                    "size_id"=>$request->Taille,
                    "prix"=>$request->prix,
                    "status"=>$request->status,
                ]);
    
                
    
                // Upload image here
              
                return redirect()->route('admin/sizealimentaire')->with('success','sizealimentaire updated successfully.');
    
    
            } else {
                // return with errrors
                return redirect()->route('sizealimentaire.edit',$sizealimentaire->id)->withErrors($validator)->withInput();
            }
        }
    
        function destroy(sizealimentaire $sizealimentaire, Request $request) {
                           
            File::delete(public_path().'/uploads/sizealimentaires/'.$sizealimentaire->image);
            $sizealimentaire->delete();        
            return redirect()->route('admin/sizealimentaire')->with('success','sizealimentaire deleted successfully.');
        }
         }