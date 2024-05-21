<?php

namespace App\Http\Controllers;

use App\Models\Addon;
use App\Models\CategoryAddon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class addonController extends Controller
{
    public function index() {

        $addons = addon::orderBy('id','DESC')->paginate(5);

        return view('addon.index',['addons' => $addons]);
    }

    public function create() {
        return view('addon.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'addon' => 'required',
            'prix' => 'required',
            'status' => 'required',
            
        ]);

        if ( $validator->passes() ) {

            
            $addons = Addon::create($request->post());
                    
            return redirect()->route('admin/addons')->with('success','addon added successfully.');


        } else {
            // return with errrors
            return redirect()->route('addons.create')->withErrors($validator)->withInput();
        }
    }

    public function edit(addon $addon) {
        //$addon = addon::findOrFail($id);       
        return view('addon.edit',['addon' => $addon]);
    }

    public function update(addon $addon, Request $request) {

        $validator = Validator::make($request->all(),[
            'addon' => 'required',
            'prix' => 'required',
            'status' => 'required',
            
        ]);

        if ( $validator->passes() ) {
           

            $addon->fill($request->post())->save();

            // Upload image here
          
            return redirect()->route('admin/addons')->with('success','addon updated successfully.');


        } else {
            // return with errrors
            return redirect()->route('addons.edit',$addon->id)->withErrors($validator)->withInput();
        }
    }

    public function destroy(addon $addon, Request $request) {
                       
        File::delete(public_path().'/uploads/addons/'.$addon->image);
        $addon->delete();        
        return redirect()->route('admin/addons')->with('success','addon deleted successfully.');
    }
}
