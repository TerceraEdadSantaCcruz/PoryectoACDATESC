@extends('adminlte.index')

@section('content')
    <div class="container">


        <div id="calendario">

        </div>

        <div class="col-md-6 col-sm-12" style="padding:8px;">
            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#actividad">
                Nueva actividad
            </button>
        </div>
    </div>


    <div class="modal fade" id="actividad" tabindex="-1" role="dialog" aria-labelledby="modelTitleId">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-family:Roboto">Programar actividad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="">

                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="title">Actividad</label>
                            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId"
                                placeholder="Escribe el titulo de la actividad...">
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="start">Fecha:</label>
                            <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId">
                            <small id="helpId" class="form-text text-muted">Indique la fecha del evento</small>
                        </div>

                        <div class="form-group">
                            <label for="start">Hora:</label>
                            <input type="time" class="form-control" name="start" id="start" aria-describedby="helpId">
                        </div>

                    </form>
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-success" id="btnGuardar"><i class='fas fa-plus'></i></button>
                    <button type="button" class="btn btn-warning" id="btnModificar"><i class='fas fa-edit'></i></button>
                    <button type="button" class="btn btn-danger" id="btnEliminar"><i class='fas fa-trash-alt'></i></button>

                </div>

            </div>
        </div>
    </div>
@endsection
