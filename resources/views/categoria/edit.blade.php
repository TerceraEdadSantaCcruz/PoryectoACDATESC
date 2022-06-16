@extends('adminlte.index')
@section('title', 'Categoria')
@section('content')
    <div class="container">
        <br />
        <section class="formulario">
            <form action="{{ url('/categoria/' . $categoria->cat_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="cabeza">
                    <h2>Editar Categoria</h2>
                </div>
                <br>
                @if (count($errors) > 0)

                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>


                @endif
                @method('PUT')
                <br>
                <div class="form-group col-md-12">
                    <label for="nombre_cat">
                        <FONT SIZE=3>Nombre</FONT>
                    </label>
                    <input type="text" class="form-control" name="nombre_cat"
                        value="{{ old('nombre_cat',$categoria->nombre_cat) }}"
                        id="nombre_cat">
                </div>

                <div class="col-12" style="text-align:right;">
                    <button type="submit" class="btn btn-primary" title="Editar"> <i class="far fa-save"></i>
                        Editar</button>
                    <a class="btn btn-secondary" href="{{ url('categoria/') }}" title="Regresar"><i
                            class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
    </div>
    </form>
    </div>
    </div>
    </div>
@endsection
