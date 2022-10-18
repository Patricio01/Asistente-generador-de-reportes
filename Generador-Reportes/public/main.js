$(document).ready(function(index) {
    var table;
    // Configuración: se agrega una entrada de texto a cada celda de pie de página para filtro por celda
    $('#example tfoot th').each( function (index) {
        var title = $(this).text();
        var input = $('<input type="text" placeholder="Buscar por: '+title+'" />');
        $(this).empty().append(input);
        $('#example').on('stateLoaded.dt', () => {
            $(input).val(table.column(index).search());
        })
    } );
    
    //se trabaja con la tabla del index
    table = $('#example').DataTable({
        //configuraciones de la pagina estetica
        scrollX: true,
        paging: true,
        //Traducción de algunas frases
        language: {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando..."
             
             
        },
        
        dom: 'Bftrlip',
        //Creamos una variedad de botones las cuales contendran funciones especificas
        buttons:[
            'colvis',
            //boton el cual creara la consulta que desea el usuario con una configuración determinada
            {   text: 'Crear Consulta',
                extend: 'createState',
                config: { //Tendra una configuración de guardado que aceptara campos de busqueda y columnas
                    creationModal: true,  //
                    toggle: {
                        columns:{
                            search: true,
                            visible: true
                        }
                    }
                }
            },
            'savedStates'
            ,{
                //Creamos un boton para exportar Excel con la condición que sean las columnas visibles
                extend:    'excelHtml5',
                text:      'EXCEL',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success',
                exportOptions: { // Realizara la exportacion de los datos que sean solamente visibles
                    columns: ':visible'
                }
                
            },
            {
                //Creamos un boton para exportar PDF con la condición que sean las columnas visibles
                extend:    'pdfHtml5',
                text:      'PDF',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger',
                exportOptions: { // Realizara la exportacion de los datos que sean solamente visibles
                    columns: ':visible'
                }
            },
			{
                //Creamos un boton para exportar JSON 
                text: 'JSON',
                action: function ( e, dt, button, config ) {
                    var data = dt.buttons.exportData(); //Crea un boton para exportar la información como JSON
 
                    $.fn.dataTable.fileSave( // La información que tendra la sacarara d ela tabla 
                        new Blob( [ JSON.stringify( data ) ] ),
                        'Export.json'
                    );
                },
				
            },
            
        ]
        ,
        
        initComplete: function () { // una ves que todo esta cargado
            // Aplicación de busqueda para cualquier columna
            this.api().columns().every( function () {
                var that = this;
  
                $( 'input', this.footer() ).on( 'keyup change clear', function () { //si hay algo escrito en una columna
                    if ( that.search() !== this.value ) { //del footer consulta la condición 
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
    
});

