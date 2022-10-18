<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />  
    <title>Generador</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables-1.12.1/css/jquery.dataTables.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('Buttons-2.2.3/css/buttons.dataTables.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('DateTime-1.1.2/css/dataTables.dateTime.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('Responsive-2.3.0/css/responsive.dataTables.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('SearchBuilder-1.3.4/css/searchBuilder.dataTables.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('StateRestore-1.1.1/css/stateRestore.dataTables.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('main.css') }}">
        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="{{ asset('main.css') }}">  
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="{{ asset('datatables/datatables.min.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('datatables/DateTime-1.1.2/css/dataTables.dateTime.min.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('datatables/SearchBuilder-1.3.4/css/searchBuilder.dataTables.min.css') }}"/>

    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="{{ asset('datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') }}">
    
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
  </head>
    
  <body> 
     <header>
         <h1 class="text-center text-light">Generador de Reportes</h1>
     </header>    
    <div style="height:50px" id="export">


    </div>   

     <!--Ejemplo tabla con DataTables-->
    <div class="container">

        <div class="row">
            
                <div class="col-lg-12">
                
                    <div class="table-responsive"> 
                        
                        <table id="example" class="display nowrap" style="width:100%" cellspacing="0" >
                        <thead>
                            <tr>
                                    <th>Nombre</td>
                                    <th>Apellido</td>
                                    <th>Fecha Nacimiento</td>
                                    <th>Rut</td>
                                    <th>Direccion</td>
                                    <th>Sexo</td>
                                    <th>Fecha Contrato</td>
                                    <th>Cargo Laboral</td>
                                    <th>Descripcion Cargo</td>
                                    <th>Salario Mensual</td>
                                    <th>Nombre Sucursal</td>
                                    <th>Ciudad Sucursal</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($query as $lt)
                            
                            <tr>
                                <td>{{ $lt->nombre}}</td>
                                <td>{{ $lt->apellido }}</td>
                                <td>{{ $lt->fecha_nac }}</td>
                                <td>{{ $lt->cedula_ident }}</td>
                                <td>{{ $lt->direccion }}</td>
                                <td>{{ $lt->sexo }}</td>
                                <td>{{ $lt->fecha_contrato }}</td>
                                <td>{{ $lt->cargo_laboral }}</td>
                                <td>{{ $lt->descripcion_cargo }}</td>
                                <td>{{ $lt->salario_mensual }}</td>
                                <td>{{ $lt->nombre_sucursal }}</td>
                                <td>{{ $lt->ciudad_sucursal }}</td>
                            </tr>
                           
                        @endforeach  
                                                 
                        </tbody>  
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Fecha Nacimiento</th>
                                <th>Rut</th>
                                <th>Direccion</th>
                                <th>Sexo</th>
                                <th>Fecha Contrato</th>
                                <th>Cargo Laboral</th>
                                <th>Descripcion Cargo</th>
                                <th>Salario Mensual</th>
                                <th>Nombre Sucursal</th>
                                <th>Ciudad Sucursal</th>
                            </tr>
                        </tfoot>     
                       </table>                  
                    </div>
                </div>
        </div>  
    </div>    


<script src="{{ asset('jQuery-3.6.0/jquery-3.6.0.min.js')}}"></script>
<script  src="{{ asset('pdfmake-0.1.36/pdfmake.min.js')}}"></script>
<script  src="{{ asset('pdfmake-0.1.36/vfs_fonts.js')}}"></script>
<script  src="{{ asset('DataTables-1.12.1/js/jquery.dataTables.min.js')}}"></script>
<script  src="{{ asset('Buttons-2.2.3/js/dataTables.buttons.min.js')}}"></script>
<script  src="{{ asset('Buttons-2.2.3/js/buttons.colVis.min.js')}}"></script>
<script  src="{{ asset('Buttons-2.2.3/js/buttons.html5.min.js')}}"></script>
<script  src="{{ asset('DateTime-1.1.2/js/dataTables.dateTime.min.js')}}"></script>
<script  src="{{ asset('Responsive-2.3.0/js/dataTables.responsive.min.js')}}"></script>
<script  src="{{ asset('SearchBuilder-1.3.4/js/dataTables.searchBuilder.min.js')}}"></script>
<script  src="{{ asset('StateRestore-1.1.1/js/dataTables.stateRestore.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('main.js') }}"></script> 
<script src="{{ asset('datatables/JSZip-2.5.0/jszip.min.js') }}"></script>    
<script src="{{ asset('datatables/pdfmake-0.1.36/pdfmake.min.js') }}"></script>    
<script src="{{ asset('datatables/pdfmake-0.1.36/vfs_fonts.js') }}"></script>
<script src="{{ asset('datatables/DateTime-1.1.2/js/dataTables.dateTime.min.js') }}"></script>  

  </body>
</html>
