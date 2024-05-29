<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class TableController extends Controller
{
   
        public function index() {
    
            $tables = table::orderBy('id','DESC')->paginate(5);
    
            return view('table.index',['tables' => $tables]);
        }
    
        public function create() {
            return view('table.create');
        }
    
        public function store(Request $request) {
            $validator = Validator::make($request->all(),[
                'NumTable' => 'required',
                'capacite' => 'required',
                'status' => 'required',
                
            ]);
    
            if ( $validator->passes() ) {
    
                // option #1
                // Save data here
                // $table = new table();
                // $table ->nom = $request->nom;
                // $table ->taille= $request->taille;
                // $table ->save();
    
                // option #2
                // $table= new table();
                // $table->fill($request->post())->save();
    
                // option #3
                $table = table::create($request->post());
    
                // Upload image here
                
                
                return redirect()->route('tables.index')->with('success','table added successfully.');
    
    
            } else {
                // return with errrors
                return redirect()->route('tables.create')->withErrors($validator)->withInput();
            }
        }
    
        public function edit(table $table) {
            //$table = table::findOrFail($id);       
            return view('table.edit',['table' => $table]);
        }
    
        public function update(table $table, Request $request) {
    
            $validator = Validator::make($request->all(),[
                'NumTable' => 'required',
                'capacite' => 'required',
                'status' => 'required',
            ]);
    
            if ( $validator->passes() ) {
               
    
                $table->fill($request->post())->save();
    
                // Upload image here
              
                return redirect()->route('tables.index')->with('success','table updated successfully.');
    
    
            } else {
                // return with errrors
                return redirect()->route('tables.edit',$table->id)->withErrors($validator)->withInput();
            }
        }
    
        public function destroy(table $table, Request $request) {
                           
            File::delete(public_path().'/uploads/tables/'.$table->image);
            $table->delete();        
            return redirect()->route('tables.index')->with('success','table deleted successfully.');
        }
    }
    
    
    
        