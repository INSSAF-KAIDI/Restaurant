<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class adresseController extends Controller
{
    public function index() {

        $adresses = Adresse::orderBy('id','DESC')->paginate(5);

        return view('adresse.index',['adresses' => $adresses]);
    }

    public function create() {
        return view('adresse.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'ville' => 'required',
            'quartier' => 'required',
            'libelle' => 'required',
            'codepostal' => 'required',
        ]);

        if ( $validator->passes() ) {

            // option #1
            // Save data here
            // $adresse = new adresse();
            // $adresse ->ville= $request->ville;
            // $adresse ->quartier= $request->quartier;
            // $adresse ->libelle= $request->libelle;
            // $adresse ->codepostal= $request->codepostal;
            // $adresse ->save();

            // option #2
            // $adresse= new adresse();
            // $adresse->fill($request->post())->save();

            // option #3
            $adresse = adresse::create($request->post());

            // Upload image here
            
            
            return redirect()->route('admin/adresses')->with('success','Adresse added successfully.');


        } else {
            // return with errrors
            return redirect()->route('adresses.create')->withErrors($validator)->withInput();
        }
    }

    public function edit(adresse $adresse) {
        //$adresse = adresse::findOrFail($id);       
        return view('adresse.edit',['adresse' => $adresse]);
    }

    public function update(adresse $adresse, Request $request) {

        $validator = Validator::make($request->all(),[
            'ville' => 'required',
            'quartier' => 'required',
            'libelle' => 'required',
            'codepostal' => 'required',
        ]);

        if ( $validator->passes() ) {
           

            $adresse->fill($request->post())->save();

            // Upload image here
          
            return redirect()->route('admin/adresses')->with('success','adresse updated successfully.');


        } else {
            // return with errrors
            return redirect()->route('adresses.edit',$adresse->id)->withErrors($validator)->withInput();
        }
    }

    public function destroy(adresse $adresse, Request $request) {
                       
        File::delete(public_path().'/uploads/adresses/'.$adresse->image);
        $adresse->delete();        
        return redirect()->route('admin/adresses')->with('success','Adresse deleted successfully.');
    }
}
