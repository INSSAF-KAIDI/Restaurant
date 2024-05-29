<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Client;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::orderBy('id','DESC')->paginate(5);

        return view('reservation.index',['reservations' => $reservations]);

    }

    public function create() {
        $tables = Table::select("id","NumTable")->get();
        $clients = Client::select("id","NomClient")->get();
        $all = [
            "clients"=>$clients,
            "tables" => $tables
        ];
        return view('reservation.create',$all);
    }

     public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'DateDemande' => 'required',
            'status' => 'required',


        ]);

        if ( $validator->passes() ) {



            // "user_id"=>$user->id,

            reservation::create([

                "client_id"=>$request->NomClient,
                "table_id"=>$request->Numtable,
                "DateDemande"=>$request->DateDemande,
                "status"=>$request->status,


            ]);





            return redirect()->route('reservation.index')->with('success','reservation added successfully.');


        } else {
            // return with errrors
            return redirect()->route('reservation.create')->withErrors($validator)->withInput();
        }
    }

    public function edit(reservation $reservation) {
        //$reservation = reservation::findOrFail($id);
        $tables = Table::select("id","Numtable")->get();
        $clients = Client::select("id","NomClient")->get();
        $all = [
            "clients" =>  $clients,
            "tables" => $tables,
            'reservation' => $reservation,
        ];
        return view('reservation.edit',$all);
    }

    public function update(reservation $reservation, Request $request) {

        $validator = Validator::make($request->all(),[
            'DateDemande' => 'required',
            'status' => 'required',
        ]);

        if ( $validator->passes() ) {

            $reservation->update([


                "client_id"=>$request->NomClient,
                "table_id"=>$request->Numtable,
                "DateDemande"=>$request->DateDemande,
                "status"=>$request->status,

            ]);



            // Upload image here

            return redirect()->route('reservation.index')->with('success','reservation updated successfully.');


        } else {
            // return with errrors
            return redirect()->route('reservation.edit',$reservation->id)->withErrors($validator)->withInput();
        }
    }

    function destroy(reservation $reservation, Request $request) {

        File::delete(public_path().'/uploads/reservations/'.$reservation->image);
        $reservation->delete();
        return redirect()->route('reservation.index')->with('success','reservation deleted successfully.');
    }
     }
