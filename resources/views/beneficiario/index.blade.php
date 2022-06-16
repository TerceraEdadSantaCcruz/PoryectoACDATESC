@extends('adminlte.index')
@section('title', 'Beneficiarios')

@section('css')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.11.5/b-2.2.2/b-html5-2.2.2/b-print-2.2.2/r-2.2.9/datatables.min.css" />
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>

@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h1>Lista de Beneficiarios</h1>
            </div>
        </div>


        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ Session::get('mensaje') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <br />

        <div class="card">

            <div class="card-body">

                @can('Gestionar Beneficiarios')
                    <a href="{{ url('beneficiario/create') }}" class="btn btn-primary  title=" Registrar Beneficiario"><i
                            class="fa fa-plus"></i> Registrar</a>
                @endcan
                <br>
                <br>
                <table class="table table-striped dt-responsive nowrap" style="width:100%" id="beneficiarios">

                    <thead class="bg-primary">
                        <tr>
                            <th>Identificación</th>
                            <th>Nombre de beneficiario</th>
                            <th>Fecha de nacimiento</th>
                            <th>Teléfono</th>
                            <th>Ingreso</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($beneficiarios as $beneficiario)
                            <tr>
                               
                                <td>{{ $beneficiario->Identificacion_Beneficiario }}</td>
                                <td>{{ $beneficiario->Nombre }} {{ $beneficiario->Apellido_1 }} {{ $beneficiario->Apellido_2 }}</td>
                               
                                <td>{{ $beneficiario->Fecha_nacimiento }}</td>
                                @if($beneficiario->Telefono == null)
                                <td>No digitado</td>
                                @else
                                <td>{{ $beneficiario->Telefono }}</td>
                                @endif
                                <td>{{ $beneficiario->Fecha_Ingreso }}</td>

                                {{-- @if ($beneficiario->Fotografia == null)
                                    <td>
                                        <div style="text-align: center">
                                            <i class="fas fa-eye-slash"></i>
                                        </div>
                                    </td>
                                @else
                                    <td>
                                        <img class="img-thumbnail img-fluid"
                                            src="{{ asset('storage') . '/' . $beneficiario->Fotografia }}" width="100" alt="">
                                    </td>
                                @endif--}}

                                <td>

                                    <form action="{{ url('/beneficiario/' . $beneficiario->id) }}"
                                        id="formulario-eliminar" class="d-inline" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        @can('Gestionar Beneficiarios')
                                            <a href="{{ url('/beneficiario/' . $beneficiario->id . '/edit') }}"
                                                class="btn btn-warning fas fa-edit" title="Editar Beneficiario"></a>
                                        @endcan
                                        @can('Gestionar Beneficiarios')
                                            <a href="{{ url('/beneficiario/' . $beneficiario->id) }}"
                                                class="btn btn-info fas fa-file-alt" title="Detalles de Beneficiario"></a>
                                        @endcan

                                        @can('Gestionar Beneficiarios')
                                            <button class="btn btn-danger fas fa-trash-alt" data-toggle="tooltip"
                                                onclick="deleteConfirmation({{ $beneficiario->id }})" type="button"
                                                title="Eliminar Beneficiario"></button>
                                        @endcan
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/dt-1.11.5/b-2.2.2/b-html5-2.2.2/b-print-2.2.2/r-2.2.9/datatables.min.js">
    </script>

    <script>
        $('#beneficiarios').DataTable({
            order: [],
            responsive: true,
            autowidth: true,
            dom: 'Bfritlp',
            language: {
                url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json'
            },
            buttons: [{
                    extend: 'pdfHtml5',
                    text: '<i class="fas fa-file-pdf"></i>',
                    titleAttr: 'Exportar a PDF',
                    filename: 'Reporte_Beneficiario_ACDTESC_PDF',
                    className: 'btn btn-danger text-center',
                    orientation: 'portrait',
                    title: 'Lista de Beneficiarios',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4],
                        search: 'applied',
                        order: 'applied'
                    },
                    customize: function(doc) {
                        doc.content.splice(1, 0);
                        var logo =
                            'data:image/jpeg;base64,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';

                        var now = new Date();
                        var jsDate = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now.getFullYear();

                        doc.pageMargins = [85, 80, 20, 30];

                        doc.styles.tableHeader.fontSize = 7;

                        doc['header'] = (function() {
                            return {
                                columns: [{
                                        image: logo,
                                        width: 60,

                                    },
                                    {
                                        italics: true,
                                        text: 'Centro Diurno Tercera Edad Santa Cruz',
                                        fontSize: 20,
                                        alignment: 'center'
                                    },

                                ],
                                margin: [150, 20]
                            }
                        });
                        doc.styles.title = {
                                fontSize: '15',
                                alignment: 'left',
                            },

                            doc.styles.tableHeader = {
                                fillColor: '#1E90FF',
                                color: 'white',
                                alignment: 'center',
                            }

                        doc['footer'] = (function(page, pages) {
                            return {
                                columns: [{
                                        alignment: 'left',
                                        text: ['Creado el: ', {
                                            text: jsDate.toString()
                                        }]
                                    },
                                    {
                                        alignment: 'right',
                                        text: ['pagina ', {
                                            text: page.toString()
                                        }, ' de ', {
                                            text: pages.toString()
                                        }]
                                    }
                                ],
                                margin: [25, -10]
                            }
                        });
                    }
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print"></i>',
                    titleAttr: 'Imprimir',
                    className: 'btn btn-info',
                    title: 'Lista de Beneficiarios',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4],
                        search: 'applied',
                        order: 'applied'
                    },
                }
            ]
        });
    </script>

    <script type="text/javascript">
        function deleteConfirmation(id) {
            swal.fire({
                title: "Seguro que lo desea eliminar?",
                icon: 'question',
                text: "Confirme la solicitud!",
                //type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Si, Eliminar!",
                cancelButtonText: "No, Cancelar!",
                reverseButtons: !0
            }).then(function(e) {

                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/eliminarBeneficiario/') }}/" + id,
                        data: {
                            _token: CSRF_TOKEN
                        },
                        dataType: 'JSON',
                        success: function(results) {
                            if (results.success === true) {
                                swal.fire("Listo!", results.message, "success");
                                // refresh page after 2 seconds
                                window.location.reload();
                            } else {
                                swal.fire("Error!", results.message, "error");
                            }
                        },
                        error: function() {
                    swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se puede eliminar este registro',
                        timer: "3000"
                    });
                }
                    });
                } else {
                    e.dismiss;
                }
            }, function(dismiss) {
                return false;
            })
        }
    </script>
@endsection
