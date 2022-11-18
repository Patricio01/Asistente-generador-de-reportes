<!DOCTYPE html>
<html lang="en">
<head>
<title>Generador UCT</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables-1.12.1/css/jquery.dataTables.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('Buttons-2.2.3/css/buttons.dataTables.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('DateTime-1.1.2/css/dataTables.dateTime.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('Responsive-2.3.0/css/responsive.dataTables.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('SearchBuilder-1.3.4/css/searchBuilder.dataTables.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('StateRestore-1.1.1/css/stateRestore.dataTables.min.css') }}"/>
  

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


</head>
<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
            
            <li class="nav-item">
                <button type="button" class="btn btn-success" onclick="window.location.href='{{route('paso1')}}'">NUEVO !!</button>
            </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2>Tabla con datos seleccionados</h2>
            </div>
            
        </div>
        <div class="row">
            <div class="col-lg-12">
                
                <div class="table-responsive"> 
                        
                    <table id="example" class="display nowrap" style="width:100%" cellspacing="0" >
                        <thead>
                            <tr>
                                @foreach($ar as $tab)
                                <th scope="col">{{ $tab }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($query as $lt)
                            <tr>
                                @foreach ($ar as $dd)
                                    <td>{{ $lt->$dd }}</td>
                                @endforeach
                            </tr>
                            @endforeach
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                @foreach($ar as $tab)
                                <th scope="col">{{ $tab }}</th>
                                @endforeach
                            </tr>
                        </tfoot>
                    </table>
                </div>
            
            </div>
        </div>
    </div>

    <div class="mt-5 p-4 bg-dark text-white text-center">
    <p></p>
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