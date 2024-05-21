<?php

namespace App\Http\Controllers;

use App\Models\CategoryAddon;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class categoryaddonController extends Controller
{
    public function index() {

        $categoryaddons = CategoryAddon::orderBy('id','DESC')->paginate(5);

        return view('category_addon.index',['categoryaddons' => $categoryaddons]);
    }

    public function create() {
        return view('category_addon.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'titre' => 'required',
            'choix' => 'required',
            
        ]);

        if ( $validator->passes() ) {

            $category = Category::create([
                "titre"=>$request->titre,
                
            ]);
           
           CategoryAddon::create([
                "category_id"=>$category->id,
                "choix"=>$request->choix,
                
        ]);
        
            
            return redirect()->route('admin/categoryaddons')->with('success','categoryaddon added successfully.');


        } else {
            // return with errrors
            return redirect()->route('category_addon.create')->withErrors($validator)->withInput();
        }
    }

    public function edit(categoryaddon $categoryaddon) {
        //$categoryaddon = categoryaddon::findOrFail($id);       
        return view('category_addon.edit',['categoryaddon' => $categoryaddon]);
    }

    public function update(categoryaddon $categoryaddon, Request $request) {

        $validator = Validator::make($request->all(),[
            'titre' => 'required',
            'choix' => 'required',
            
        ]);

        if ( $validator->passes() ) {
           

            $categoryaddon->fill($request->post())->save();

            // Upload image here
          
            return redirect()->route('admin/categoryaddons')->with('success','categoryaddon updated successfully.');


        } else {
            // return with errrors
            return redirect()->route('categoryaddons.edit',$categoryaddon->id)->withErrors($validator)->withInput();
        }
    }

    public function destroy(categoryaddon $categoryaddon, Request $request) {
                       
        File::delete(public_path().'/uploads/categoryaddons/'.$categoryaddon->image);
        $categoryaddon->delete();        
        return redirect()->route('admin/categoryaddons')->with('success','categoryaddon deleted successfully.');
    }
}
