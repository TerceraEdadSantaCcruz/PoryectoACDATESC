@extends('adminlte.index')
@section('title', 'Registro de Salud')
@section('content')
    <div class="container">
        <br>
        <section class="formulario">
            <form action={{ url('/beneficiario_Salud') }} method="post" enctype="multipart/form-data">
                @csrf
                <div class="cabeza">
                    <h2>Ficha Médica Anual</h2>
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
                <br>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-4 col-md-4">
                        <label for="">
                            <FONT SIZE=3>Beneficiario</FONT>
                        </label>
                        <select name="beneficiario_id" id="beneficiario_id" class="form-control">
                            <option value="0">Seleccione un beneficiario</option>
                            @foreach ($beneficiarios as $beneficiario)
                                <option value="{{ $beneficiario->id }}">{{ $beneficiario->Apellido_1 }}
                                    {{ $beneficiario->Nombre }} / {{ $beneficiario->Identificacion_Beneficiario }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-4">
                        <label for="Fecha">
                            <FONT SIZE=3>Fecha de Atención</FONT>
                        </label>
                        <input type="date" class="form-control" name="Fecha"
                            value="{{ isset($beneficiario_Salud->Fecha) ? $beneficiario_Salud->Fecha : old('Fecha', date('Y-m-d')) }}"
                            min="2000-01-01" id="Fecha" required>
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-4">
                        <label for="Peso">
                            <FONT SIZE=3>Peso en kilogramos(Kg)</FONT>
                        </label>
                        <input type="number" step="any"  class="form-control" name="Peso"
                            value="{{ isset($beneficiario_Salud->Peso) ? $beneficiario_Salud->Peso : old('Peso') }}"
                            id="Peso" placeholder="Ingrese el peso..." required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-xs-12 col-sm-4 col-md-4">
                        <label for="IMC">
                            <FONT SIZE=3>IMC</FONT>
                        </label>
                        <input type="number" step="any"  class="form-control" name="IMC"
                            value="{{ isset($beneficiario_Salud->IMC) ? $beneficiario_Salud->IMC : old('IMC') }}" id="IMC"
                            placeholder="Ingrese el índice de masa corporal..." required>
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-4">
                        <label for="Talla">
                            <FONT SIZE=3>Talla en Centimetros(Cm)</FONT>
                        </label>
                        <input type="number" step="any" class="form-control" name="Talla"
                            value="{{ isset($beneficiario_Salud->Talla) ? $beneficiario_Salud->Talla : old('Talla') }}"
                            id="Talla" placeholder="Ingrese la talla..." required>
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-4">
                        <label for="Religion">
                            <FONT SIZE=3>Religión</FONT>
                        </label>
                        <input type="text" class="form-control" name="Religion"
                            value="{{ isset($beneficiario_Salud->Religion) ? $beneficiario_Salud->Religion : old('Religion') }}"
                            id="Religion" placeholder="Ingrese la religión..." required>
                    </div>
                </div>
                {{-- Antecedentes patologicos --}}
                <br>
                <div class="cabeza">
                    <h2>Antecedentes Patológicos</h2>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="form-group col-sm-4" style="text-align: center">
                        <label for="HTA">
                            <FONT SIZE=3>HTA</FONT>
                        </label>
                        <input type="radio" name="HTA" id="HTA" value="Si" @if (old('HTA') == 'Si') checked @endif>
                        <FONT SIZE=3>Si</FONT>
                        <input type="radio" name="HTA" id="HTA" value="No" @if (old('HTA') == 'No') checked @endif
                            style="margin-left:20px">
                        <FONT SIZE=3>No</FONT>
                    </div>

                    <div class="form-group col-sm-4" style="text-align: center">
                        <label for="Diabetes">
                            <FONT SIZE=3>Diabetes</FONT>
                        </label>
                        <input type="radio" name="Diabetes" id="Diabetes" value="Si"
                            @if (old('Diabetes') == 'Si') checked @endif>
                        <FONT SIZE=3>Si</FONT>
                        <input type="radio" name="Diabetes" id="Diabetes" value="No"
                            @if (old('Diabetes') == 'No') checked @endif style="margin-left:20px">
                        <FONT SIZE=3>No</FONT>
                    </div>

                    <div class="form-group col-sm-4" style="text-align: center">
                        <label for="Asma">
                            <FONT SIZE=3>Asma</FONT>
                        </label>
                        <input type="radio" name="Asma" id="Asma" value="Si"
                            @if (old('Asma') == 'Si') checked @endif>
                        <FONT SIZE=3>Si</FONT>
                        <input type="radio" name="Asma" id="Asma" value="No"
                            @if (old('Asma') == 'No') checked @endif style="margin-left:20px">
                        <FONT SIZE=3>No</FONT>
                    </div>

                    <div class="form-group col-sm-4" style="text-align: center">
                        <label for="Gastritis">
                            <FONT SIZE=3>Gastritis</FONT>
                        </label>
                        <input type="radio" name="Gastritis" id="Gastritis" value="Si"
                            @if (old('Gastritis') == 'Si') checked @endif>
                        <FONT SIZE=3>Si</FONT>
                        <input type="radio" name="Gastritis" id="Gastritis" value="No"
                            @if (old('Gastritis') == 'No') checked @endif style="margin-left:20px">
                        <FONT SIZE=3>No</FONT>
                    </div>
                    {{-- </div> --}}

                    {{-- <div class="row"> --}}
                    <div class="form-group col-sm-4" style="text-align: center">
                        <label for="Tiroides">
                            <FONT SIZE=3>Tiroides</FONT>
                        </label>
                        <input type="radio" name="Tiroides" id="Tiroides" value="Si"
                            @if (old('Tiroides') == 'Si') checked @endif>
                        <FONT SIZE=3>Si</FONT>
                        <input type="radio" name="Tiroides" id="Tiroides" value="No"
                            @if (old('Tiroides') == 'No') checked @endif style="margin-left:20px">
                        <FONT SIZE=3>No</FONT>
                    </div>

                    <div class="form-group col-sm-4" style="text-align: center">
                        <label for="Cardiopatia">
                            <FONT SIZE=3>Cardiopatía</FONT>
                        </label>
                        <input type="radio" name="Cardiopatia" id="Cardiopatia" value="Si"
                            @if (old('Cardiopatia') == 'Si') checked @endif>
                        <FONT SIZE=3>Si</FONT>
                        <input type="radio" name="Cardiopatia" id="Cardiopatia" value="No"
                            @if (old('Cardiopatia') == 'No') checked @endif style="margin-left:20px">
                        <FONT SIZE=3>No</FONT>
                    </div>

                    <div class="form-group col-sm-12" style="text-align:center">
                        <label for="Trigliceridos_Colesterol">
                            <FONT SIZE=3>Triglicéridos Colesterol</FONT>
                        </label>
                        <input type="radio" name="Trigliceridos_Colesterol" id="Trigliceridos_Colesterol" value="Si"
                            @if (old('Trigliceridos_Colesterol') == 'Si') checked @endif>
                        <FONT SIZE=3>Si</FONT>
                        <input type="radio" name="Trigliceridos_Colesterol" id="Trigliceridos_Colesterol" value="No"
                            @if (old('Trigliceridos_Colesterol') == 'No') checked @endif style="margin-left:20px">
                        <FONT SIZE=3>No</FONT>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12">
                        <label for="Observaciones_patologicas">
                            <FONT SIZE=3>Observaciones de Antecedentes Patológicos</FONT>
                        </label>
                        <textarea type="text" class="form-control" name="Observaciones_patologicas" id="Observaciones_patologicas" rows="3"
                            placeholder="Ingrese las observaciones de antecedentes patológicos">{{ isset($beneficiario_Salud->Observaciones_patologicas)? $beneficiario_Salud->Observaciones_patologicas: old('Observaciones_patologicas') }}</textarea>
                    </div>
                </div>
                {{-- Fin antecedentes patologicos --}}

                {{-- Cirugias --}}
                <br>
                <div class="cabeza">
                    <h2>Cirugías</h2>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-6 col-md-6" style="text-align:center">
                        <label for="Cirugia">
                            <FONT SIZE=3>Cuenta con Cirugías</FONT>
                        </label><br>
                        <input type="radio" name="Cirugia" id="Cirugia" value="Si"
                            @if (old('Cirugia') == 'Si') checked @endif>
                        <FONT SIZE=3>Si</FONT>
                        <input type="radio" name="Cirugia" id="Cirugia" value="No"
                            @if (old('Cirugia') == 'No') checked @endif style="margin-left:20px">
                        <FONT SIZE=3>No</FONT>

                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-6">
                        <label for="Descripcion_Cirugia">
                            <FONT SIZE=3>Descripción de la Cirugía</FONT>
                        </label>
                        <textarea type="text" class="form-control" name="Descripcion_Cirugia" id="Descripcion_Cirugia" rows="2"
                            placeholder="Ingrese la descripción de la cirugía...">{{ isset($beneficiario_Salud->Descripcion_Cirugia)? $beneficiario_Salud->Descripcion_Cirugia: old('Descripcion_Cirugia') }}</textarea>
                    </div>
                </div>

                {{-- Fin cirugia --}}

                {{-- Ayuda Biomecanica --}}
                <br>
                <div class="cabeza">
                    <h2>Ayuda Biomecánica</h2>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-6 col-md-6" style="text-align: center">
                        <label for="AyudaBiomecanica">
                            <FONT SIZE=3>Cuenta con Ayuda Biomecánica</FONT>
                        </label><br>
                        <input type="radio" name="AyudaBiomecanica" id="AyudaBiomecanica" value="Si"
                            @if (old('AyudaBiomecanica') == 'Si') checked @endif>
                        <FONT SIZE=3>Si</FONT>
                        <input type="radio" name="AyudaBiomecanica" id="AyudaBiomecanica" value="No"
                            @if (old('AyudaBiomecanica') == 'No') checked @endif style="margin-left:20px">
                        <FONT SIZE=3>No</FONT>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-6">
                        <label for="Descripcion_AyudaBiomecanica">
                            <FONT SIZE=3>Descripción de la Ayuda Biomecánica</FONT>
                        </label>
                        <textarea type="text" class="form-control" name="Descripcion_AyudaBiomecanica" id="Descripcion_AyudaBiomecanica"
                            rows="2"
                            placeholder="Ingrese la descripción de la ayuda biomecánica">{{ isset($beneficiario_Salud->Descripcion_AyudaBiomecanica)? $beneficiario_Salud->Descripcion_AyudaBiomecanica: old('Descripcion_AyudaBiomecanica') }}</textarea>
                    </div>
                </div>

                {{-- Fin ayuda biomecanica --}}


                {{-- Protesis dental --}}
                <br>
                <div class="cabeza">
                    <h2>Prótesis Dental</h2>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-6 col-md-6" style="text-align: center">
                        <label for="Protesis_Dental">
                            <FONT SIZE=3>Utiliza Prótesis Dental</FONT>
                        </label><br>
                        <input type="radio" name="Protesis_Dental" id="Protesis_Dental" value="Si"
                            @if (old('Protesis_Dental') == 'Si') checked @endif>
                        <FONT SIZE=3>Si</FONT>
                        <input type="radio" name="Protesis_Dental" id="Protesis_Dental" value="No"
                            @if (old('Protesis_Dental') == 'No') checked @endif style="margin-left:20px">
                        <FONT SIZE=3>No</FONT>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-6">
                        <label for="Descripcion_Protesis_Dental">
                            <FONT SIZE=3>Descripción de Prótesis Dental</FONT>
                        </label>
                        <textarea type="text" class="form-control" name="Descripcion_Protesis_Dental" id="Descripcion_Protesis_Dental"
                            rows="2"
                            placeholder="Ingrese la descripción de la prótesis dental">{{ isset($beneficiario_Salud->Descripcion_Protesis_Dental)? $beneficiario_Salud->Descripcion_Protesis_Dental: old('Descripcion_Protesis_Dental') }}</textarea>
                    </div>
                </div>

                {{-- Fin Protesis dental --}}

                {{-- Alimentos --}}
                <br>
                <div class="cabeza">
                    <h2>Factores Nutricionales</h2>
                </div>
                <br>
                <br>
                <div class="row">

                    <div class="form-group col-xs-12 col-sm-6 col-md-6">
                        <label for="Alimentos_Intolerables">
                            <FONT SIZE=3>Alimentos Intolerables</FONT>
                        </label>
                        <textarea required type="text" class="form-control" name="Alimentos_Intolerables" id="Alimentos_Intolerables" rows="5"
                            placeholder="Ingrese los alimentos intolerables">{{ isset($beneficiario_Salud->Alimentos_Intolerables)? $beneficiario_Salud->Alimentos_Intolerables: old('Alimentos_Intolerables') }}</textarea>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-6">
                        <label for="Alimentos_Favoritos">
                            <FONT SIZE=3>Alimentos Favoritos</FONT>
                        </label>
                        <textarea required type="text" class="form-control" name="Alimentos_Favoritos" id="Alimentos_Favoritos" rows="5"
                            placeholder="Ingrese los alimentos favoritos">{{ isset($beneficiario_Salud->Alimentos_Favoritos)? $beneficiario_Salud->Alimentos_Favoritos: old('Alimentos_Favoritos') }}</textarea>
                    </div>
                </div>

                {{-- Fin Alimentos --}}

                {{-- Sueño --}}
                <br>
                <div class="cabeza">
                    <h2>Afectación del Sueño</h2>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-6 col-md-6" style="text-align: center">
                        <label for="Sueño">
                            <FONT SIZE=3>Cuenta con Afectación del Sueño?</FONT>
                        </label><br>
                        <input type="radio" name="Sueño" id="Sueño" value="Si"
                            @if (old('Sueño') == 'Si') checked @endif>
                        <FONT SIZE=3>Si</FONT>
                        <input type="radio" name="Sueño" id="Sueño" value="No"
                            @if (old('Sueño') == 'No') checked @endif style="margin-left:20px">
                        <FONT SIZE=3>No</FONT>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-6">
                        <label for="Descripcion_Sueño">
                            <FONT SIZE=3>Descripción de la Afectación de Sueño</FONT>
                        </label>
                        <textarea type="text" class="form-control" name="Descripcion_Sueño" id="Descripcion_Sueño" rows="2"
                            placeholder="Ingrese la descripción de la afectación del sueño">{{ isset($beneficiario_Salud->Descripcion_Sueño)? $beneficiario_Salud->Descripcion_Sueño: old('Descripcion_Sueño') }}</textarea>
                    </div>
                </div>

                {{-- Fin Sueño --}}

                {{-- Incontinencia --}}
                <br>
                <div class="cabeza">
                    <h2>Afectaciones de Incontinencia</h2>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-6 col-md-6" style="text-align: center">
                        <label for="Incontinencia">
                            <FONT SIZE=3>Cuenta con Afectación de Incontinencia?</FONT>
                        </label><br>
                        <input type="radio" name="Incontinencia" id="Incontinencia" value="Si"
                            @if (old('Incontinencia') == 'Si') checked @endif>
                        <FONT SIZE=3>Si</FONT>
                        <input type="radio" name="Incontinencia" id="Incontinencia" value="No"
                            @if (old('Incontinencia') == 'No') checked @endif style="margin-left:20px">
                        <FONT SIZE=3>No</FONT>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-6">
                        <label for="Descripcion_Incontinencia">
                            <FONT SIZE=3>Descripción de la Afectación de Incontinencia</FONT>
                        </label>
                        <textarea type="text" class="form-control" name="Descripcion_Incontinencia" id="Descripcion_Incontinencia" rows="2"
                            placeholder="Ingrese la descripción de la afectación incontinencia">{{ isset($beneficiario_Salud->Descripcion_Incontinencia)? $beneficiario_Salud->Descripcion_Incontinencia: old('Descripcion_Incontinencia') }}</textarea>
                    </div>
                </div>

                {{-- Fin Incontinencia --}}

                {{-- Apoyo familiar --}}
                <br>
                <div class="cabeza">
                    <h2>Apoyo Familiar</h2>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-6 col-md-6" style="text-align: center">
                        <label for="Apoyo_Familiar">
                            <FONT SIZE=3>Cuenta con Apoyo Familiar?</FONT>
                        </label><br>
                        <input type="radio" name="Apoyo_Familiar" id="Apoyo_Familiar" value="Si"
                            @if (old('Apoyo_Familiar') == 'Si') checked @endif>
                        <FONT SIZE=3>Si</FONT>
                        <input type="radio" name="Apoyo_Familiar" id="Apoyo_Familiar" value="No"
                            @if (old('Apoyo_Familiar') == 'No') checked @endif style="margin-left:20px">
                        <FONT SIZE=3>No</FONT>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-6">
                        <label for="Descripcion_Apoyo_Familiar">
                            <FONT SIZE=3>Descripción del Apoyo Familiar</FONT>
                        </label>
                        <textarea type="text" class="form-control" name="Descripcion_Apoyo_Familiar" id="Descripcion_Apoyo_Familiar" rows="2"
                            placeholder="Ingrese la descripción del apoyo familiar">{{ isset($beneficiario_Salud->Descripcion_Apoyo_Familiar)? $beneficiario_Salud->Descripcion_Apoyo_Familiar: old('Descripcion_Apoyo_Familiar') }}</textarea>
                    </div>
                </div>

                {{-- Fin Apoyo familiar --}}

                {{-- Deficit visual y auditiva --}}
                <br>
                <div class="cabeza">
                    <h2>Déficit Visual y Auditiva</h2>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="form-group col-sm-6" style="text-align: center">
                        <label for="Deficit_Visual">
                            <FONT SIZE=3>Déficit Visual</FONT>
                        </label>
                        <input type="radio" name="Deficit_Visual" id="Deficit_Visual" value="Si"
                            @if (old('Deficit_Visual') == 'Si') checked @endif>
                        <FONT SIZE=3>Si</FONT>
                        <input type="radio" name="Deficit_Visual" id="Deficit_Visual" value="No"
                            @if (old('Deficit_Visual') == 'No') checked @endif style="margin-left:20px">
                        <FONT SIZE=3>No</FONT>
                    </div>
                    <div class="form-group col-sm-6" style="text-align: center">
                        <label for="Deficit_Auditiva">
                            <FONT SIZE=3>Déficit Auditiva</FONT>
                        </label>
                        <input type="radio" name="Deficit_Auditiva" id="Deficit_Auditiva" value="Si"
                            @if (old('Deficit_Auditiva') == 'Si') checked @endif>
                        <FONT SIZE=3>Si</FONT>
                        <input type="radio" name="Deficit_Auditiva" id="Deficit_Auditiva" value="No"
                            @if (old('Deficit_Auditiva') == 'No') checked @endif style="margin-left:20px">
                        <FONT SIZE=3>No</FONT>
                    </div>
                </div>
                {{-- Fin Deficit visual y auditiva --}}

                {{-- Medicacion --}}
                <br>
                <div class="cabeza">
                    <h2>Medicación</h2>
                </div>
                <br>
                <br>
                <div class="row">

                    <div class="form-group col-xs-12 col-sm-6 col-md-6">
                        <label for="Medicamentos_Dosis">
                            <FONT SIZE=3>Medicamentos / Dosis</FONT>
                        </label>
                        <textarea required type="text" class="form-control" name="Medicamentos_Dosis" id="Medicamentos_Dosis" rows="4"
                            placeholder="Ingrese la dosis de medicamento...">{{ isset($beneficiario_Salud->Medicamentos_Dosis)? $beneficiario_Salud->Medicamentos_Dosis: old('Medicamentos_Dosis') }}</textarea>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-6">
                        <label for="Padecimiento_Tratamiento">
                            <FONT SIZE=3>Padecimientos / Tratamientos</FONT>
                        </label>
                        <textarea required type="text" class="form-control" name="Padecimiento_Tratamiento" id="Padecimiento_Tratamiento" rows="4"
                            placeholder="Ingrese el padecimiento y el tratamiento...">{{ isset($beneficiario_Salud->Padecimiento_Tratamiento)? $beneficiario_Salud->Padecimiento_Tratamiento: old('Padecimiento_Tratamiento') }}</textarea>
                    </div>
                </div>

                {{-- Fin Medicacion --}}
                <br>
                <div class="cabeza">
                    <h2>Diagnóstico</h2>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-6 col-md-6">
                        <label for="DiagnosticoFisioterapeutico">
                            <FONT SIZE=3>Diagnóstico Fisioterapéutico</FONT>
                        </label>
                        <textarea required type="text" class="form-control" name="DiagnosticoFisioterapeutico" id="DiagnosticoFisioterapeutico"
                            rows="4"
                            placeholder="Ingrese el diagnostico...">{{ isset($beneficiario_Salud->DiagnosticoFisioterapeutico)? $beneficiario_Salud->DiagnosticoFisioterapeutico: old('DiagnosticoFisioterapeutico') }}</textarea>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-6">
                        <label for="Observaciones">
                            <FONT SIZE=3>Observaciones</FONT>
                        </label>
                        <textarea type="text" class="form-control" name="Observaciones" id="Observaciones" rows="4"
                            placeholder="Ingrese las observaciones...">{{ isset($beneficiario_Salud->Observaciones) ? $beneficiario_Salud->Observaciones : old('Observaciones') }}</textarea>
                    </div>
                </div>
                <div class="col-md-12" style="text-align:right">
                    <button type="submit" class="btn btn-primary" title="Guardar"><i class="far fa-save"></i>
                        Guardar</button>
                    <a href="{{ url('beneficiario_Salud') }}" class="btn btn-secondary" title="Regresar"><i
                            class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>

            </form>
        </section>
        <br>
    </div>
@endsection
