<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous"
  referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/paso_a_paso.js') }}"></script>
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

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
                <h2>Paso 3: Seleccion de Campos Disponibles</h2>
                <span>Puede seleccionar uno mas campos de las diferentes tablas</span>
            </div>
        </div>
        <form action="{{route('paso3')}}" method="get">
        <div class="row row-cols-1 row-cols-md-4 g-4">

            @foreach($dato as $dt)
            <div class="col">
                <div class="card h-100">
                    <div class='card-header'>
                        {{ $dt }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Campos Disponibles</h5>
                        <input type="hidden" name="nomtabla[]" value="{{ $dt }}">
                        @foreach($col as $data2)
                            @if($data2[0] == $dt)
                                <input type="checkbox" name="datos2[]" id="{{ $data2[1] }}" value="{{$dt.'.'.$data2[1] }}"> <label>{{ $data2[1]  }}</label><br>
                            @endif
                        @endforeach 
                        
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
        <button type="submit" class="btn btn-success">Siguiente</button>
        </form>
    </div>

    <div class="mt-5 p-4 bg-dark text-white text-center">
    <p></p>
    </div>
    
</body>
</html>