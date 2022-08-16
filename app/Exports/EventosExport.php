<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;



class EventosExport implements  FromView
{

    public function  __construct($eventos,$eventosTAE)
    {
        $this->eventos = $eventos;
        $this->eventosTAE = $eventosTAE;        
        return $this;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Evento::all();
    // }

    public function view(): View
    {
        $eventos = $this->eventos;
        $eventostae = $this->eventosTAE;

        return view('admin.reportes.tae', compact('eventos','eventostae'));
    }


}
