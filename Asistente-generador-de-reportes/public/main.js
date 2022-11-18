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
            "processing": "Procesando...",
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "emptyTable": "Ningún dato disponible en esta tabla",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "infoThousands": ",",
            "loadingRecords": "Cargando...",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad",
                "collection": "Colección",
                "colvisRestore": "Restaurar visibilidad",
                "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                "copySuccess": {
                    "1": "Copiada 1 fila al portapapeles",
                    "_": "Copiadas %ds fila al portapapeles"
                },
                "copyTitle": "Copiar al portapapeles",
                "csv": "CSV",
                "excel": "Excel",
                "pageLength": {
                    "-1": "Mostrar todas las filas",
                    "_": "Mostrar %d filas"
                },
                "pdf": "PDF",
                "print": "Imprimir",
                "renameState": "Cambiar nombre",
                "updateState": "Actualizar",
                "createState": "Crear Estado",
                "removeAllStates": "Remover Estados",
                "removeState": "Remover",
                "savedStates": "Estados Guardados",
                "stateRestore": "Estado %d"
            },
            "autoFill": {
                "cancel": "Cancelar",
                "fill": "Rellene todas las celdas con <i>%d<\/i>",
                "fillHorizontal": "Rellenar celdas horizontalmente",
                "fillVertical": "Rellenar celdas verticalmentemente"
            },
            "decimal": ",",
            "searchBuilder": {
                "add": "Añadir condición",
                "button": {
                    "0": "Crear Condición",
                    "_": "Crear Condición (%d)"
                },
                "clearAll": "Borrar todo",
                "condition": "Añadir Condición",
                "conditions": {
                    "date": {
                        "after": "Despues",
                        "before": "Antes",
                        "between": "Entre",
                        "empty": "Vacío",
                        "equals": "Igual a",
                        "notBetween": "No entre",
                        "notEmpty": "No Vacio",
                        "not": "Diferente de"
                    },
                    "number": {
                        "between": "Entre",
                        "empty": "Vacio",
                        "equals": "Igual a",
                        "gt": "Mayor a",
                        "gte": "Mayor o igual a",
                        "lt": "Menor que",
                        "lte": "Menor o igual que",
                        "notBetween": "No entre",
                        "notEmpty": "No vacío",
                        "not": "Diferente de"
                    },
                    "string": {
                        "contains": "Contiene",
                        "empty": "Vacío",
                        "endsWith": "Termina en",
                        "equals": "Igual a",
                        "notEmpty": "No Vacio",
                        "startsWith": "Empieza con",
                        "not": "Diferente de",
                        "notContains": "No Contiene",
                        "notStartsWith": "No empieza con",
                        "notEndsWith": "No termina con"
                    },
                    "array": {
                        "not": "Diferente de",
                        "equals": "Igual",
                        "empty": "Vacío",
                        "contains": "Contiene",
                        "notEmpty": "No Vacío",
                        "without": "Sin"
                    }
                },
                "data": "Columna",
                "deleteTitle": "Eliminar regla de filtrado",
                "leftTitle": "Criterios anulados",
                "rightTitle": "Criterios de sangría",
                "title": {
                    "0": "Constructor de búsqueda",
                    "_": "Constructor de búsqueda (%d)"
                },
                "value": "Valor"
            },
            "searchPanes": {
                "clearMessage": "Borrar todo",
                "collapse": {
                    "0": "Paneles de búsqueda",
                    "_": "Paneles de búsqueda (%d)"
                },
                "count": "{total}",
                "countFiltered": "{shown} ({total})",
                "emptyPanes": "Sin paneles de búsqueda",
                "loadMessage": "Cargando paneles de búsqueda",
                "title": "Filtros Activos - %d",
                "showMessage": "Mostrar Todo",
                "collapseMessage": "Colapsar Todo"
            },
            "select": {
                "cells": {
                    "1": "1 celda seleccionada",
                    "_": "%d celdas seleccionadas"
                },
                "columns": {
                    "1": "1 columna seleccionada",
                    "_": "%d columnas seleccionadas"
                },
                "rows": {
                    "1": "1 fila seleccionada",
                    "_": "%d filas seleccionadas"
                }
            },
            "thousands": ".",
            "datetime": {
                "previous": "Anterior",
                "next": "Proximo",
                "hours": "Horas",
                "minutes": "Minutos",
                "seconds": "Segundos",
                "unknown": "-",
                "amPm": [
                    "AM",
                    "PM"
                ],
                "months": {
                    "0": "Enero",
                    "1": "Febrero",
                    "10": "Noviembre",
                    "11": "Diciembre",
                    "2": "Marzo",
                    "3": "Abril",
                    "4": "Mayo",
                    "5": "Junio",
                    "6": "Julio",
                    "7": "Agosto",
                    "8": "Septiembre",
                    "9": "Octubre"
                },
                "weekdays": [
                    "Dom",
                    "Lun",
                    "Mar",
                    "Mie",
                    "Jue",
                    "Vie",
                    "Sab"
                ]
            },
            "editor": {
                "close": "Cerrar",
                "create": {
                    "button": "Nuevo",
                    "title": "Crear Nuevo Registro",
                    "submit": "Crear"
                },
                "edit": {
                    "button": "Editar",
                    "title": "Editar Registro",
                    "submit": "Actualizar"
                },
                "remove": {
                    "button": "Eliminar",
                    "title": "Eliminar Registro",
                    "submit": "Eliminar",
                    "confirm": {
                        "_": "¿Está seguro que desea eliminar %d filas?",
                        "1": "¿Está seguro que desea eliminar 1 fila?"
                    }
                },
                "error": {
                    "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
                },
                "multi": {
                    "title": "Múltiples Valores",
                    "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                    "restore": "Deshacer Cambios",
                    "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                }
            },
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "stateRestore": {
                "creationModal": {
                    "button": "Crear",
                    "name": "Nombre:",
                    "order": "Clasificación",
                    "paging": "Paginación",
                    "search": "Busqueda",
                    "select": "Seleccionar",
                    "columns": {
                        "search": "Búsqueda de Columna",
                        "visible": "Visibilidad de Columna"
                    },
                    "title": "Crear Nuevo Estado",
                    "toggleLabel": "Incluir:"
                },
                "emptyError": "El nombre no puede estar vacio",
                "removeConfirm": "¿Seguro que quiere eliminar este %s?",
                "removeError": "Error al eliminar el registro",
                "removeJoiner": "y",
                "removeSubmit": "Eliminar",
                "renameButton": "Cambiar Nombre",
                "renameLabel": "Nuevo nombre para %s",
                "duplicateError": "Ya existe un Estado con este nombre.",
                "emptyStates": "No hay Estados guardados",
                "removeTitle": "Remover Estado",
                "renameTitle": "Cambiar Nombre Estado"
            }
        } ,
        
        dom: 'PQBftrlip',
        //Creamos una variedad de botones las cuales contendran funciones especificas
        buttons:[
            
            {
                extend: 'colvis',
                collectionLayout: 'fixed columns',
                collectionTitle: 'Seleccione las columnas que desea ocultar',
            },
            //boton el cual creara la consulta que desea el usuario con una configuración determinada
            {   text: 'Crear Consulta',
                extend: 'createState',
                config: { //Tendra una configuración de guardado que aceptara campos de busqueda y columnas
                    creationModal: true,  //
                    
                    toggle: {
                        visible: true,
                        length: true,
                        order: true,
                        paging: true,
                        scroller: true,
                        search: true,
                        searchBuilder: true,
                        searchPanes: true,
                        select: true
                    }
                }
            },
            {
                extend: 'savedStates',
                
                config: {
                  "stateDuration": 0,
                  splitSecondaries: [
                        
                        {
                            extend: 'updateState',
                            text: 'Actualizar Consulta',
                            
                            
                        },
                        {
                            extend: 'removeState',
                            text: 'Eliminar Consulta',
                            
                            
                        },
                        {
                            extend: 'renameState',
                            text: 'Renombrar Consulta',
                            
                        }
                    ]
              }
            },
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
                orientation: 'landscape',
                pageSize: 'LEGAL',
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
                    var data = table.buttons.exportData( {
                        columns: ':visible', 
                    } ); //Crea un boton para exportar la información como JSON
 
                    $.fn.dataTable.fileSave( // La información que tendra la sacarara de la tabla 
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



