<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Evento;

use App\Exports\EventosExport;
use App\Exports\AtencionesExport;
use App\Models\Atencion;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reportes.index');
    }

    public function tae(Request $request)
    {

        $start_date =  Carbon::createFromFormat('d/m/Y',$request->start_date)->format('Y-m-d');
        $end_date =  Carbon::createFromFormat('d/m/Y',$request->end_date)->format('Y-m-d'); 
        $eventos = Evento::whereBetween('fecha_hora_reporte', [$start_date, $end_date])
        ->WhereNotNull('fecha_hora_verificacion')
        ->get();

        $eventostae = DB::table('eventos')
            ->select(DB::raw('SUM(TIMESTAMPDIFF(HOUR, `fecha_hora_reporte`,`fecha_hora_verificacion`)) AS TAE, AVG(TIMESTAMPDIFF(HOUR, `fecha_hora_reporte`,`fecha_hora_verificacion`)) AS PROM_TAE'))
            ->whereBetween('fecha_hora_reporte', [$start_date, $end_date])
            ->WhereNotNull('fecha_hora_verificacion')
            ->get();

        
         $excel = Excel::download(new EventosExport($eventos,$eventostae), 'TAE-Eventos.xlsx');
         return $excel;

        //return view('admin.reportes.tae', compact('eventos','eventostae'));

    }

    function exportEventos(){
       
        $excel = Excel::download(new EventosExport, 'article-collection.xlsx');
        return $excel;
      
    }

    public function atencionesform()
    {
        return view('admin.reportes.atencionesform');
    }

    public function atenciones(Request $request)
    {

        $start_date =  Carbon::createFromFormat('d/m/Y',$request->start_date)->format('Y-m-d');
        $end_date =  Carbon::createFromFormat('d/m/Y',$request->end_date)->format('Y-m-d'); 
        $atenciones = Atencion::whereBetween('fecha_hora_atencion', [$start_date, $end_date])->with('familia')
        ->get();


        
         $excel = Excel::download(new AtencionesExport($atenciones), 'atenciones.xlsx');
         return $excel;

        //return view('admin.reportes.entregas', compact('atenciones'));

    }




}
