<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Controlador extends Controller
{
    //funcion al cargar laravel muestra toda la información de la base de datos
    public function index(){
        $query =\ DB::table('persona')
        ->join('sexo','FK_id_sexo','=','id_sexo')
        ->join('empleados','id_persona','=','FK_id_persona')
        ->join('cargo','id_cargo','=','FK_id_cargo')
        ->join('sucursal','id_sucursal','=','FK_id_sucursal')
        ->select('persona.*', 'sexo.sexo','empleados.fecha_contrato','cargo.cargo_laboral','cargo.descripcion_cargo','cargo.salario_mensual','sucursal.nombre_sucursal','sucursal.ciudad_sucursal')
        ->get();
        return view('index')->with(compact('query'));
    }
}
