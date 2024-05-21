<?php

namespace App\Http\Controllers;

use App\Models\size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class sizeController extends Controller
{
    public function index() {

        $sizes = size::orderBy('id','DESC')->paginate(5);

        return view('size.index',['sizes' => $sizes]);
    }

    public function create() {
        return view('size.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'nom' => 'required',
            'taille' => 'required',
        ]);

        if ( $validator->passes() ) {

            // option #1
            // Save data here
            // $size = new size();
            // $size ->nom = $request->nom;
            // $size ->taille= $request->taille;
            // $size ->save();

            // option #2
            // $size= new size();
            // $size->fill($request->post())->save();

            // option #3
            $size = size::create($request->post());

            // Upload image here
            
            
            return redirect()->route('admin/sizes')->with('success','size added successfully.');


        } else {
            // return with errrors
            return redirect()->route('sizes.create')->withErrors($validator)->withInput();
        }
    }

    public function edit(size $size) {
        //$size = size::findOrFail($id);       
        return view('size.edit',['size' => $size]);
    }

    public function update(size $size, Request $request) {

        $validator = Validator::make($request->all(),[
            'nom' => 'required',
            'taille' => 'required',
        ]);

        if ( $validator->passes() ) {
           

            $size->fill($request->post())->save();

            // Upload image here
          
            return redirect()->route('admin/sizes')->with('success','size updated successfully.');


        } else {
            // return with errrors
            return redirect()->route('sizes.edit',$size->id)->withErrors($validator)->withInput();
        }
    }

    public function destroy(size $size, Request $request) {
                       
        File::delete(public_path().'/uploads/sizes/'.$size->image);
        $size->delete();        
        return redirect()->route('admin/sizes')->with('success','size deleted successfully.');
    }
}



    