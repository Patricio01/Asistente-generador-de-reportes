<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use DB;
use PDF;
use Illuminate\Support\Arr;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        return view('index');
    }

    public function paso1(){
        $query=\DB::table('INFORMATION_SCHEMA.TABLES')
                    ->select('TABLE_NAME')
                    ->where('TABLE_TYPE','BASE TABLE')
                    ->get();
        return view('paso1')->with('lista',$query);
    }

    public function paso2(Request $request){
        $dato = $request->datos;
        $val = $request->val;
        $dato = Arr::add($dato,count($dato), $val);


        // $relacion = DB::select("select PK = PK.TABLE_NAME , FK= FK.TABLE_NAME, C.CONSTRAINT_NAME FROM
        // INFORMATION_SCHEMA.REFERENTIAL_CONSTRAINTS C
        // INNER JOIN INFORMATION_SCHEMA.TABLE_CONSTRAINTS FK
        // ON C.CONSTRAINT_NAME = FK.CONSTRAINT_NAME
        // INNER JOIN INFORMATION_SCHEMA.TABLE_CONSTRAINTS PK
        // ON C.UNIQUE_CONSTRAINT_NAME = PK.CONSTRAINT_NAME where PK.TABLE_NAME = '".$dato[0]."' ");

        //$msg = 'No hay relacion';

        $primaria = [];
        $foranea = [];
        $num3 = 0;
        for ($i=0; $i < count($dato) ; $i++) { 
            $clave_primaria = DB::select("select Col.Column_Name from
            INFORMATION_SCHEMA.TABLE_CONSTRAINTS Tab
            join INFORMATION_SCHEMA.CONSTRAINT_COLUMN_USAGE Col
            on Col.Constraint_Name = Tab.Constraint_Name
            and Col.Table_Name = Tab.Table_Name
            where Constraint_Type = 'PRIMARY KEY' and Tab.Table_Name = '".$dato[$i]."'");

            $primaria = Arr::add($primaria,$dato[$i], $clave_primaria);


            $clave_foranea = DB::select("select Col.Column_Name from
            INFORMATION_SCHEMA.TABLE_CONSTRAINTS Tab
            join INFORMATION_SCHEMA.CONSTRAINT_COLUMN_USAGE Col
            on Col.Constraint_Name = Tab.Constraint_Name
            and Col.Table_Name = Tab.Table_Name
            where Constraint_Type = 'FOREIGN KEY' and Tab.Table_Name = '".$dato[$i]."'");

            $foranea = Arr::add($foranea,$dato[$i], $clave_foranea);

        }

        //dd($primaria, $foranea);

        $col = [];
        $num = 0;
            for ($i=0; $i < count($dato) ; $i++) { 
                $personas=\DB::table('INFORMATION_SCHEMA.COLUMNS')
                ->select('COLUMN_NAME')
                ->where('TABLE_NAME', $dato[$i])
                ->get(); 
                        
                for ($j=0; $j < count($personas); $j++) { 
                    $existe = FALSE;
                    for ($x=0; $x < count($primaria) ; $x++) { 
                        if($personas[$j]->COLUMN_NAME == $primaria[$dato[$i]][0]->Column_Name){
                            $existe = TRUE;
                            break;
                        }
                    
                    }
                    $existe2 = FALSE;
                    for ($y=0; $y < count($foranea) ; $y++) { 
                        for ($z=0; $z < count($foranea[$dato[$i]]) ; $z++) { 
                            if($personas[$j]->COLUMN_NAME == $foranea[$dato[$i]][$z]->Column_Name){
                                $existe2 = TRUE;
                                break;
                            }
                        }
                        
                    
                    }


                    if(!$existe and !$existe2){
                        $col = Arr::add($col,$num++, [$dato[$i],$personas[$j]->COLUMN_NAME]);
                    }
                    
                    
                    
                    //print_r($personas[$j]->COLUMN_NAME);   
                }    
            }
            return view('paso2')->with(compact('col','dato'));


        // for ($i=1; $i < count($dato) ; $i++) { 
            
        //     for ($x=0; $x < count($relacion)  ; $x++) { 

        //         if($dato[$i] == $relacion[$x]->FK){
        //             //print($dato[$i]);
        //             //print($relacion[$x]->FK);
        //             $col = [];
        //             $num = 0;
        //             for ($i=0; $i < count($dato) ; $i++) { 
        //                 $personas=\DB::table('INFORMATION_SCHEMA.COLUMNS')
        //                 ->select('COLUMN_NAME')
        //                 ->where('TABLE_NAME', $dato[$i])
        //                 ->get(); 
                            
        //                 for ($j=0; $j < count($personas); $j++) { 
        //                     $col = Arr::add($col,$num++, [$dato[$i],$personas[$j]->COLUMN_NAME]);
        //                     //print_r($personas[$j]->COLUMN_NAME);
        //                     // if(array_key_exists($personas[$j]->COLUMN_NAME,$primaria)){
                                
        //                     //     $col = Arr::add($col,$num++, [$dato[$i],$personas[$j]->COLUMN_NAME]);
        //                     // }
                            
        //                 }    
        //             }
        //             return view('paso2')->with(compact('col','dato'));
        //         }
        //         else{
        //             //print("");
        //             return view("error")->with('status',$msg);
        //         }
                
        //     }
        // }
        
        
        

        

        //dd($foranea);

        // $rel = [];
        // $num2 = 0;
        // print_r($dato);
        // print('<br>');

        // for ($i=0; $i <count($dato) ; $i++) { 
        //     for ($x=0; $x < count($relacion)  ; $x++) { 
        //         if($relacion[$x]->PK == $dato[$i]){
        //             print('La tabla '.$dato[$i].' tiene relacion con '.$relacion[$x]->FK);
        //             print("</br>");

        //             if($relacion[$x]->FK)
                    
        //             //print("FK".$relacion[$x]->FK);
        //             $rel = Arr::add($rel,$num2++, $relacion[$x]->FK);
        //         }
                // elseif ($relacion[$x]->FK == $dato[$i]) {
                //     print("aca el pk");
                //     print("</br>");
                //     print($dato[$i]);
                //     print("</br>");
                //     //print( "PK".$relacion[$x]->PK);
                //     $rel = Arr::add($rel,$num2++, $relacion[$x]->PK);
                // }
                
            //}
       // }
        //print_r($rel);
        //var_dump($rel);

        //print_r(in_array($rel,'Order')); 
        



        
    }

    public function paso21(Request $request){
        $dato = $request->datos;

        $relacion = DB::select("select PK = PK.TABLE_NAME , FK= FK.TABLE_NAME, C.CONSTRAINT_NAME FROM
        INFORMATION_SCHEMA.REFERENTIAL_CONSTRAINTS C
        INNER JOIN INFORMATION_SCHEMA.TABLE_CONSTRAINTS FK
        ON C.CONSTRAINT_NAME = FK.CONSTRAINT_NAME
        INNER JOIN INFORMATION_SCHEMA.TABLE_CONSTRAINTS PK
        ON C.UNIQUE_CONSTRAINT_NAME = PK.CONSTRAINT_NAME where PK.TABLE_NAME = '".$dato."' or fk.TABLE_NAME = '".$dato."'");

        $arrdata = [];
        $num = 0;
        for ($i=0; $i < count($relacion) ; $i++) {
            if($relacion[$i]->PK != $dato) {
                $arrdata = Arr::add($arrdata,$num++, $relacion[$i]->PK);
            }
            elseif($relacion[$i]->FK != $dato){
                $arrdata = Arr::add($arrdata,$num++, $relacion[$i]->FK);
            }
            
        }

        
        return view('paso21')->with(compact('arrdata', 'dato'));
    }

    public function paso3(Request $request){
        $dato = $request->datos2;

        //dd($dato);
        $nomtabla = $request->nomtabla;


        $arrdato = "";
        $numero = 0;
        for ($i=0; $i < count($dato) ; $i++) { 
            if($i == count($dato)-1){
                $arrdato = $arrdato.$dato[$i];
            }
            else{
                $arrdato = $arrdato.$dato[$i].",";
            }
            
            
        }

        

        //SELECT Orders.OrderDate, Customers.CompanyName,Employees.FirstName from Orders 
        //INNER JOIN Customers ON Customers.CustomerID = Orders.CustomerID 
        //inner join Employees on Employees.EmployeeID = Orders.EmployeeID
        $primaria = [];
        $refe = [];
        $tab1 = end($nomtabla);
        $numjoin = count($nomtabla)-1;
        $num=0;
        $num2=0;
        $varinner = " ";
        for ($i=0; $i < $numjoin; $i++) { 
            $clave_primaria = DB::select("select Col.Column_Name from
            INFORMATION_SCHEMA.TABLE_CONSTRAINTS Tab
            join INFORMATION_SCHEMA.CONSTRAINT_COLUMN_USAGE Col
            on Col.Constraint_Name = Tab.Constraint_Name
            and Col.Table_Name = Tab.Table_Name
            where Constraint_Type = 'PRIMARY KEY' and Tab.Table_Name = '".$nomtabla[$i]."'");

            

            $primaria = Arr::add($primaria,$num++, $clave_primaria);
            //INNER JOIN $dato[$i] ON 

            $tabla = "'".$nomtabla[$i]."'";
            $tab2 = "'".$tab1."'";
            $ref = DB::select("SELECT OBJECT_NAME(f.parent_object_id) TableName,COL_NAME(fc.parent_object_id,fc.parent_column_id) ColName
            FROM 
            sys.foreign_keys AS f
            INNER JOIN 
            sys.foreign_key_columns AS fc 
               ON f.OBJECT_ID = fc.constraint_object_id
            INNER JOIN 
            sys.tables t 
               ON t.OBJECT_ID = fc.referenced_object_id
            WHERE 
            OBJECT_NAME (f.referenced_object_id) = ".$tabla." and OBJECT_NAME (f.parent_object_id) =".$tab2);
            $refe = Arr::add($refe,$num2++, $ref);

            //dd($refe);

            $varinner = $varinner."INNER JOIN ".$nomtabla[$i]." ON ".$nomtabla[$i].".".$primaria[$i][0]->Column_Name." = ".$refe[$i][0]->TableName.".".$refe[$i][0]->ColName." ";

            
        }

        $query = DB::select("SELECT ".$arrdato."  from ".$tab1." ".$varinner);
        
        $ar = [];
        $numm = 0;
        for ($i=0; $i < count($dato) ; $i++) { 
            $dat = stristr($dato[$i],'.');
            $ar = Arr::add($ar,$numm++, substr($dat, 1));
        };


        //dd($ar);
        //INNER JOIN Customers ON Customers.CustomerID = Orders.CustomerID 
        //inner join Employees on Employees.EmployeeID = Orders.EmployeeID");

        //print_r($refe[0][0]->TableName.".".$refe[0][0]->ColName);
        //print_r($nomtabla[0].".".$primaria[0][0]->Column_Name);
        //print_r($dato);

        return view('paso3')->with(compact('query','ar'));
    }
}
