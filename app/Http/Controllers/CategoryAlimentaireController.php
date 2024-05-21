<?php

namespace App\Http\Controllers;
use App\Models\categoryalimentaire;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;


class categoryalimentaireController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryalimentaires = categoryalimentaire::orderBy('id','DESC')->paginate(5);

        return view('categoryalimentaire.index',['categoryalimentaires' => $categoryalimentaires]);
        
    }

    public function create() {
        $categories = Category::select("id","NomCategory")->get();
        $all = [
            "Categories"=>$categories,
        
        ];
        return view('categoryalimentaire.create',$all);
    }

     public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'NomArticle' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        if ( $validator->passes() ) {

          
            
                     
            categoryalimentaire::create([
                
                "category_id"=>$request->NomCategory,
                "NomArticle"=>$request->NomArticle,
                "description"=>$request->description,
                "status"=>$request->status,
            ]);

       

            
            
            return redirect()->route('admin/categoryalimentaires')->with('success','categoryalimentaire added successfully.');


        } else {
            // return with errrors
            return redirect()->route('categoryalimentaire.create')->withErrors($validator)->withInput();
        }
    }

    public function edit(categoryalimentaire $categoryalimentaire) {
        //$categoryalimentaire = categoryalimentaire::findOrFail($id);  
        $Categories = Category::select("id","NomCategory")->get();
        $all = [
            "Categories" =>  $Categories,
            
            'categoryalimentaire' => $categoryalimentaire,
        ];    
        return view('categoryalimentaire.edit',$all);
    }

    public function update(categoryalimentaire $categoryalimentaire, Request $request) {

        $validator = Validator::make($request->all(),[
            'NomCategory'=> 'required',
            'NomArticle' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        if ( $validator->passes() ) {
           
            $categoryalimentaire->update([

                "Category_id"=>$request->NomCategory,
                "NomArticle"=>$request->NomArticle,
                "description"=>$request->description,
                "status"=>$request->status,
            ]);

            

            // Upload image here
          
            return redirect()->route('admin/categoryalimentaire')->with('success','categoryalimentaire updated successfully.');


        } else {
            // return with errrors
            return redirect()->route('categoryalimentaire.edit',$categoryalimentaire->id)->withErrors($validator)->withInput();
        }
    }

    function destroy(categoryalimentaire $categoryalimentaire, Request $request) {
                       
        File::delete(public_path().'/uploads/categoryalimentaire/'.$categoryalimentaire->image);
        $categoryalimentaire->delete();        
        return redirect()->route('admin/categoryalimentaires')->with('success','categoryalimentaire deleted successfully.');
    }
     }