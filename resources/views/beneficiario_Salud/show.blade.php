@extends('adminlte.index')
@section('title', 'Registro de Salud')
@section('content')

    <div class="container">
        <br />
        <section class="formulario">
            <div class="cabeza">
                <h2>Detalles de Atención Fisioterapéutica Anual</h2>
            </div>
            <br>
            <div class="col-md-12" style="text-align: right">
                <a class="btn btn-danger" title="Descargar PDF"
                    href="{{ url('anual-pdf/' . $beneficiario_Salud->beneficiario_salud_id) }}"> <i
                        class="fas fa-file-pdf"></i>
                    Reporte</a>
            </div>
            <div class="row">
                <div class="form-group col-xs-12 col-sm-4 col-md-4">
                    <label>
                        <FONT SIZE=3>Beneficiario</FONT>
                    </label>
                    <input type="text" class="form-control" name="Nombre"
                        value="{{ $beneficiario_Salud->Nombre }}" id="Nombre"
                        readonly>

                </div>
                <div class="form-group col-xs-12 col-sm-4 col-md-4">
                    <label for="Fecha">
                        <FONT SIZE=3>Fecha de Atención</FONT>
                    </label>
                    <input type="date" class="form-control" name="Fecha"
                        value="{{ isset($beneficiario_Salud->Fecha) ? $beneficiario_Salud->Fecha : old('Fecha') }}" id="Fecha"
                        readonly>

                </div>

                <div class="form-group col-xs-12 col-sm-4 col-md-4">
                    <label for="Peso">
                        <FONT SIZE=3>Peso</FONT>
                    </label>
                    <input type="text" class="form-control" name="Peso"
                        value="{{ isset($beneficiario_Salud->Peso) ? $beneficiario_Salud->Peso : old('Peso') }}" id="Peso"
                        readonly>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-xs-12 col-sm-4 col-md-4">
                    <label for="IMC">
                        <FONT SIZE=3>IMC</FONT>
                    </label>
                    <input type="text" class="form-control" name="IMC"
                        value="{{ isset($beneficiario_Salud->IMC) ? $beneficiario_Salud->IMC : old('IMC') }}" id="IMC"
                        readonly>
                </div>

                <div class="form-group col-xs-12 col-sm-4 col-md-4">
                    <label for="Talla">
                        <FONT SIZE=3>Talla</FONT>
                    </label>
                    <input type="text" class="form-control" name="Talla"
                        value="{{ isset($beneficiario_Salud->Talla) ? $beneficiario_Salud->Talla : old('Talla') }}"
                        id="Talla" readonly>
                </div>

                <div class="form-group col-xs-12 col-sm-4 col-md-4">
                    <label for="Religion">
                        <FONT SIZE=3>Religión</FONT>
                    </label>
                    <input type="text" class="form-control" name="Religion"
                        value="{{ isset($beneficiario_Salud->Religion) ? $beneficiario_Salud->Religion : old('Religion') }}"
                        id="Religion" readonly>
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
                    </label><br>
                    <input type="radio" name="HTA" id="HTA" value="Si"
                        {{                         $beneficiario_Salud->HTA == 'Si' ? 'checked' : '' }} disabled>
                    <FONT SIZE=3>Si</FONT>
                    <input type="radio" name="HTA" id="HTA" value="No"
                        {{                         $beneficiario_Salud->HTA == 'No' ? 'checked' : '' }} style="margin-left:20px"
                        disabled>
                    <FONT SIZE=3>No</FONT>
                </div>
                <div class="form-group col-sm-4" style="text-align: center">
                    <label for="Diabetes">
                        <FONT SIZE=3>Diabetes</FONT>
                    </label><br>
                    <input type="radio" name="Diabetes" id="Diabetes" value="Si"
                        {{                         $beneficiario_Salud->Diabetes == 'Si' ? 'checked' : '' }} disabled>
                    <FONT SIZE=3>Si</FONT>
                    <input type="radio" name="Diabetes" id="Diabetes" value="No"
                        {{                         $beneficiario_Salud->Diabetes == 'No' ? 'checked' : '' }}
                        style="margin-left:20px" disabled>
                    <FONT SIZE=3>No</FONT>
                </div>

                <div class="form-group col-sm-4" style="text-align: center">
                    <label for="Asma">
                        <FONT SIZE=3>Asma</FONT>
                    </label><br>
                    <input type="radio" name="Asma" id="Asma" value="Si"
                        {{                         $beneficiario_Salud->Asma == 'Si' ? 'checked' : '' }} disabled>
                    <FONT SIZE=3>Si</FONT>
                    <input type="radio" name="Asma" id="Asma" value="No"
                        {{                         $beneficiario_Salud->Asma == 'No' ? 'checked' : '' }} style="margin-left:20px"
                        disabled>
                    <FONT SIZE=3>No</FONT>
                </div>

                <div class="form-group col-sm-4" style="text-align: center">
                    <label for="Gastritis">
                        <FONT SIZE=3>Gastritis</FONT>
                    </label><br>
                    <input type="radio" name="Gastritis" id="Gastritis" value="Si"
                        {{                         $beneficiario_Salud->Gastritis == 'Si' ? 'checked' : '' }} disabled>
                    <FONT SIZE=3>Si</FONT>
                    <input type="radio" name="Gastritis" id="Gastritis" value="No"
                        {{                         $beneficiario_Salud->Gastritis == 'No' ? 'checked' : '' }}
                        style="margin-left:20px" disabled>
                    <FONT SIZE=3>No</FONT>
                </div>

                <div class="form-group col-sm-4" style="text-align: center">
                    <label for="Tiroides">
                        <FONT SIZE=3>Tiroides</FONT>
                    </label><br>
                    <input type="radio" name="Tiroides" id="Tiroides" value="Si"
                        {{                         $beneficiario_Salud->Tiroides == 'Si' ? 'checked' : '' }} disabled>
                    <FONT SIZE=3>Si</FONT>
                    <input type="radio" name="Tiroides" id="Tiroides" value="No"
                        {{                         $beneficiario_Salud->Tiroides == 'No' ? 'checked' : '' }}
                        style="margin-left:20px" disabled>
                    <FONT SIZE=3>No</FONT>
                </div>

                <div class="form-group col-sm-4" style="text-align: center">
                    <label for="Cardiopatia">
                        <FONT SIZE=3>Cardiopatía</FONT>
                    </label><br>
                    <input type="radio" name="Cardiopatia" id="Cardiopatia" value="Si"
                        {{                         $beneficiario_Salud->Cardiopatia == 'Si' ? 'checked' : '' }} disabled>
                    <FONT SIZE=3>Si</FONT>
                    <input type="radio" name="Cardiopatia" id="Cardiopatia" value="No"
                        {{                         $beneficiario_Salud->Cardiopatia == 'No' ? 'checked' : '' }}
                        style="margin-left:20px" disabled>
                    <FONT SIZE=3>No</FONT>
                </div>

                <div class="form-group col-sm-4" style="text-align: center">
                    <label for="Trigliceridos_Colesterol">
                        <FONT SIZE=3>triglicéridos Colesterol</FONT>
                    </label><br>
                    <input type="radio" name="Trigliceridos_Colesterol" id="Trigliceridos_Colesterol" value="Si"
                        {{                         $beneficiario_Salud->Trigliceridos_Colesterol == 'Si' ? 'checked' : '' }}
                        disabled>
                    <FONT SIZE=3>Si
                    </FONT>
                    <input type="radio" name="Trigliceridos_Colesterol" id="Trigliceridos_Colesterol" value="No"
                        {{                         $beneficiario_Salud->Trigliceridos_Colesterol == 'No' ? 'checked' : '' }}
                        style="margin-left:20px" disabled>
                    <FONT SIZE=3>No</FONT>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                    <label for="Observaciones_patologicas">
                        <FONT SIZE=3>Observaciones de Antecedentes Patológicos</FONT>
                    </label>
                    <textarea type="text" class="form-control" name="Observaciones_patologicas" id="Observaciones_patologicas"
                        rows="3" readonly>@if($beneficiario_Salud->Observaciones_patologicas == null){{"Sin observaciones"}}
                        @else{{ $beneficiario_Salud->Observaciones_patologicas }}
                        @endif
                    </textarea>
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
                <div class="form-group col-xs-12 col-sm-6 col-md-6" style="text-align: center">
                    <label for="Cirugia">
                        <FONT SIZE=3>Cuenta con Cirugías</FONT>
                    </label><br>
                    <input type="radio" name="Cirugia" id="Cirugia" value="Si"
                        {{                         $beneficiario_Salud->Cirugia == 'Si' ? 'checked' : '' }} disabled>
                    <FONT SIZE=3>Si</FONT>
                    <input type="radio" name="Cirugia" id="Cirugia" value="No"
                        {{                         $beneficiario_Salud->Cirugia == 'No' ? 'checked' : '' }}
                        style="margin-left:20px" disabled>
                    <FONT SIZE=3>No</FONT>
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-6">
                    <label for="Descripcion_Cirugia">
                        <FONT SIZE=3>Descripción de la Cirugía</FONT>
                    </label>
                    <textarea type="text" class="form-control" name="Descripcion_Cirugia" id="Descripcion_Cirugia" rows="2"
                        readonly>@if($beneficiario_Salud->Descripcion_Cirugia == null){{"N/A"}}
                        @else{{ $beneficiario_Salud->Descripcion_Cirugia }}
                        @endif</textarea>
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
                        {{                         $beneficiario_Salud->AyudaBiomecanica == 'Si' ? 'checked' : '' }}
                        disabled>
                    <FONT SIZE=3>Si</FONT>
                    <input type="radio" name="AyudaBiomecanica" id="AyudaBiomecanica" value="No"
                        {{                         $beneficiario_Salud->AyudaBiomecanica == 'No' ? 'checked' : '' }}
                        style="margin-left:20px" disabled>
                    <FONT SIZE=3>No</FONT>

                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-6">
                    <label for="Descripcion_AyudaBiomecanica">
                        <FONT SIZE=3>Descripción de la Ayuda Biomecánica</FONT>
                    </label>
                    <textarea type="text" class="form-control" name="Descripcion_AyudaBiomecanica" id="Descripcion_AyudaBiomecanica"
                        rows="2" readonly>@if($beneficiario_Salud->Descripcion_AyudaBiomecanica == null){{"N/A"}}
                        @else{{ $beneficiario_Salud->Descripcion_AyudaBiomecanica }}
                        @endif</textarea>
                </div>
            </div>

            {{-- Fin ayuda biomeccanica --}}

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
                        {{                         $beneficiario_Salud->Protesis_Dental == 'Si' ? 'checked' : '' }} disabled>
                    <FONT SIZE=3>Si</FONT>
                    <input type="radio" name="Protesis_Dental" id="Protesis_Dental" value="No"
                        {{                         $beneficiario_Salud->Protesis_Dental == 'No' ? 'checked' : '' }}
                        style="margin-left:20px" disabled>
                    <FONT SIZE=3>No</FONT>
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-6">
                    <label for="Descripcion_Protesis_Dental">
                        <FONT SIZE=3>Descripción de Prótesis Dental</FONT>
                    </label>
                    <textarea type="text" class="form-control" name="Descripcion_Protesis_Dental" id="Descripcion_Protesis_Dental"
                        rows="2" readonly>@if($beneficiario_Salud->Descripcion_Protesis_Dental == null){{"N/A"}}
                                          @else{{ $beneficiario_Salud->Descripcion_Protesis_Dental }}
                                          @endif</textarea>
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
                    <textarea type="text" class="form-control" name="Alimentos_Intolerables" id="Alimentos_Intolerables" rows="4"
                        readonly>{{ $beneficiario_Salud->Alimentos_Intolerables }}</textarea>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-6">
                    <label for="Alimentos_Favoritos">
                        <FONT SIZE=3>Alimentos Favoritos</FONT>
                    </label>
                    <textarea type="text" class="form-control" name="Alimentos_Favoritos" id="Alimentos_Favoritos" rows="4"
                        readonly>{{ $beneficiario_Salud->Alimentos_Favoritos }}</textarea>
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
                        {{                         $beneficiario_Salud->Sueño == 'Si' ? 'checked' : '' }} disabled>
                    <FONT SIZE=3>Si</FONT>
                    <input type="radio" name="Sueño" id="Sueño" value="No"
                        {{                         $beneficiario_Salud->Sueño == 'No' ? 'checked' : '' }}
                        style="margin-left:20px" disabled>
                    <FONT SIZE=3>No</FONT>
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-6">
                    <label for="Descripcion_Sueño">
                        <FONT SIZE=3>Descripción de la Afectación de Sueño</FONT>
                    </label>
                    <textarea type="text" class="form-control" name="Descripcion_Sueño" id="Descripcion_Sueño" rows="2"
                        readonly>@if($beneficiario_Salud->Descripcion_Sueño == null){{"N/A"}}
                                @else{{ $beneficiario_Salud->Descripcion_Sueño }}
                                @endif</textarea>
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
                        {{                         $beneficiario_Salud->Incontinencia == 'Si' ? 'checked' : '' }} disabled>
                    <FONT SIZE=3>Si</FONT>
                    <input type="radio" name="Incontinencia" id="Incontinencia" value="No"
                        {{                         $beneficiario_Salud->Incontinencia == 'No' ? 'checked' : '' }}
                        style="margin-left:20px" disabled>
                    <FONT SIZE=3>No</FONT>
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-6">
                    <label for="Descripcion_Incontinencia">
                        <FONT SIZE=3>Descripción de la Afectación de Incontinencia</FONT>
                    </label>
                    <textarea type="text" class="form-control" name="Descripcion_Incontinencia" id="Descripcion_Incontinencia" rows="2"
                        readonly>@if($beneficiario_Salud->Descripcion_Incontinencia == null){{"N/A"}}
                                @else{{ $beneficiario_Salud->Descripcion_Incontinencia }}
                                @endif</textarea>
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
                        {{                         $beneficiario_Salud->Apoyo_Familiar == 'Si' ? 'checked' : '' }} disabled>
                    <FONT SIZE=3>Si</FONT>
                    <input type="radio" name="Apoyo_Familiar" id="Apoyo_Familiar" value="No"
                        {{                         $beneficiario_Salud->Apoyo_Familiar == 'No' ? 'checked' : '' }}
                        style="margin-left:20px" disabled>
                    <FONT SIZE=3>No</FONT>
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-6">
                    <label for="Descripcion_Apoyo_Familiar">
                        <FONT SIZE=3>Descripción del Apoyo Familiar</FONT>
                    </label>
                    <textarea type="text" class="form-control" name="Descripcion_Apoyo_Familiar" id="Descripcion_Apoyo_Familiar" rows="2"
                        readonly>@if($beneficiario_Salud->Descripcion_Apoyo_Familiar == null){{"N/A"}}
                                @else{{ $beneficiario_Salud->Descripcion_Apoyo_Familiar }}
                                @endif</textarea>
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
                    </label><br>
                    <input type="radio" name="Deficit_Visual" id="Deficit_Visual" value="Si"
                        {{                         $beneficiario_Salud->Deficit_Visual == 'Si' ? 'checked' : '' }} disabled>
                    <FONT SIZE=3>Si</FONT>
                    <input type="radio" name="Deficit_Visual" id="Deficit_Visual" value="No"
                        {{                         $beneficiario_Salud->Deficit_Visual == 'No' ? 'checked' : '' }}
                        style="margin-left:20px" disabled>
                    <FONT SIZE=3>No</FONT>
                </div>
                <div class="form-group col-sm-6" style="text-align: center">
                    <label for="Deficit_Auditiva">
                        <FONT SIZE=3>Déficit Auditiva</FONT>
                    </label><br>
                    <input type="radio" name="Deficit_Auditiva" id="Deficit_Auditiva" value="Si"
                        {{                         $beneficiario_Salud->Deficit_Auditiva == 'Si' ? 'checked' : '' }}
                        disabled>
                    <FONT SIZE=3>Si</FONT>
                    <input type="radio" name="Deficit_Auditiva" id="Deficit_Auditiva" value="No"
                        {{                         $beneficiario_Salud->Deficit_Auditiva == 'No' ? 'checked' : '' }}
                        style="margin-left:20px" disabled>
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
                    <textarea type="text" class="form-control" name="Medicamentos_Dosis" id="Medicamentos_Dosis" rows="4"
                        readonly>{{ $beneficiario_Salud->Medicamentos_Dosis }}</textarea>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-6">
                    <label for="Padecimiento_Tratamiento">
                        <FONT SIZE=3>Padecimientos / Tratamientos</FONT>
                    </label>
                    <textarea type="text" class="form-control" name="Padecimiento_Tratamiento" id="Padecimiento_Tratamiento" rows="4"
                        readonly>{{ $beneficiario_Salud->Padecimiento_Tratamiento }}</textarea>
                </div>
            </div>

            {{-- Fin medicacion --}}

            {{-- diagnostico --}}
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
                    <textarea type="text" class="form-control" name="DiagnosticoFisioterapeutico" id="DiagnosticoFisioterapeutico"
                        rows="4" readonly>{{ $beneficiario_Salud->DiagnosticoFisioterapeutico }}</textarea>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-6">
                    <label for="Observaciones">
                        <FONT SIZE=3>Observaciones</FONT>
                    </label>
                    <textarea type="text" class="form-control" name="Observaciones" id="Observaciones" rows="4"
                        readonly>@if($beneficiario_Salud->Observaciones == null){{"Sin observaciones"}}
                                @else{{ $beneficiario_Salud->Observaciones }}
                                @endif</textarea>
                </div>

            </div>
            <div class="col-md-12" style="text-align:right">
                <a class="btn btn-secondary" href="{{ url('beneficiario_Salud/') }}" title="Regresar"><i
                        class="fas fa-arrow-circle-left"></i> Regresar</a>
            </div>
    </div>
    </div>
    </div>
    <br />
@endsection
