<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class AtencionesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function  __construct($atenciones)
    {
        $this->atenciones = $atenciones;            
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
        $atenciones = $this->atenciones;
        return view('admin.reportes.entregas', compact('atenciones'));
    }
}
