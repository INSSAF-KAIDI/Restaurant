<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ClientExport implements FromView
//FromCollection, WithHeadings
{
    public function view(): View
    {
        return view('Client.export', [
            'clients' => Client::all()
        ]);
    }
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Client::select('NomClient','PrenomClient','adresse','telephone','status')->get();
    // }
    // public function headings(): array
    // {
    //     return [
    //         'NomClient',
    //         'PrenomClient',
    //         'adresse',
    //         'telephone',
    //         'status',
    //     ];
    // }
    }
