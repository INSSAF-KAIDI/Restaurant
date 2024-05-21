<?php

namespace App\Http\Controllers;

use App\Models\Alimentaire;
use App\Models\CategoryAlimentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class AlimentaireController extends Controller
{
   
        public function index() {
    
            $alimentaires = Alimentaire::orderBy('id','DESC')->paginate(5);
    
            return view('alimentaire.index',['alimentaires' => $alimentaires]);
        }
    
        public function create() {
            $categoryalimentaire = CategoryAlimentaire::select("id","CategoryAlimentaire")->get();
            $all = [
                "CategoryAlimentaire" => $categoryalimentaire
                   ];
            return view('alimentaire.create',$all);
        }
        public function store(Request $request) {
            $validator = Validator::make($request->all(),[
                        'CategoryAlimentaire' => 'required',
                        'description' => 'required',
                        'status' => 'required',
                        // 'image' => 'sometimes|image:gif,png,jpeg,jpg',
            ]);
    
            if ( $validator->passes() ) {
                Alimentaire::create([
                    "CategoryAlimentaire"=>$request->CategoryAlimentaire,
                    "category_alimentaire_id"=>$request->CategoryAlimentaire,
                    "description"=>$request->description,
                    "status"=>$request->status,
                    
                ]);
                $alimentaire = Alimentaire::create($request->post());
    
                // Upload image here
                if ($request->image) {
                    $ext = $request->image->getClientOriginalExtension();
                    $newFileName = time().'.'.$ext;
                    $request->image->move(public_path().'/uploads/alimentaires/',$newFileName); // This will save file in a folder
                    
                    $alimentaire->image = $newFileName;
                    $alimentaire->save();
                }
                
                return redirect()->route('admin/alimentaire')->with('success','Alimentaire added successfully.');
    
    
            } else {
                // return with errrors
                return redirect()->route('alimentaire.create')->withErrors($validator)->withInput();
            }
        }
    
        public function edit(Alimentaire $alimentaire) {
            //$alimentaire = alimentaire::findOrFail($id);  
            $categoryalimentaire = CategoryAlimentaire::select("id","CategoryAlimentaire")->get();
            $all = [

                "CategoryAlimentaire" => $categoryalimentaire,
                'alimentaire' => $alimentaire,
            ];    
            return view('alimentaire.edit',$all);
        }
        
    
        public function update(alimentaire $alimentaire, Request $request) {
    
            $validator = Validator::make($request->all(),[
                'CategoryAlimentaire' => 'required',
                'description' => 'required',
                'status' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            if ( $validator->passes() ) {
               
    
                $alimentaire->fill($request->post())->save();
    
                // Upload image here
                if ($request->image) {
                    $oldImage = $alimentaire->image;
    
                    $ext = $request->image->getClientOriginalExtension();
                    $newFileName = time().'.'.$ext;
                    $request->image->move(public_path().'/uploads/alimentaires/',$newFileName); // This will save file in a folder
                    
                    $alimentaire->image = $newFileName;
                    $alimentaire->save();
    
                    File::delete(public_path().'/uploads/alimentaires/'.$oldImage);
                }            
    
                return redirect()->route('admin/alimentaire')->with('success','Alimentaire updated successfully.');
    
    
            } else {
                // return with errrors
                return redirect()->route('alimentaire.edit',$alimentaire->id)->withErrors($validator)->withInput();
            }
        }
    
        public function destroy(alimentaire $alimentaire, Request $request) {
                           
            File::delete(public_path().'/uploads/alimentaires/'.$alimentaire->image);
            $alimentaire->delete();        
            return redirect()->route('admin/alimentaire')->with('success','Alimentaire deleted successfully.');
        
    }

   
}








 
   

        
        

