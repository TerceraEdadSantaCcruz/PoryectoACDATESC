<!DOCTYPE html>
<html lang="en">

<head>
  <title>Reporte Anual</title>
  <meta charset="UTF-8" />
  {{--
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">--}}
  <link href="{{ asset('css/rptAnual.css') }}" rel="stylesheet">

</head>

<body>
  <div class="invoice-box">
    <table>
      <td class="title">
        <img src="img/logoRpt.png" style="width: 100%; max-width: 150px" />
      </td>
      <td>
        <p class="aso">
          ASOCIACIÓN CENTRO DIURNO DE ATENCIÓN <br />A CIUDADANOS DE LA
          TERCERA EDAD DE <br />SANTA CRUZ.<br />
        </p>
      </td>
    </table>
    <p class="tittle">Reporte anual de fisioterapia - {{$fecha}}</p>
    <div class="linea"></div>
    <br>
    <p class="Subtittle1">Detalles de Atención Fisioterapéutica</p>
    <div class="Wrap">
      <label class="property"></label>
      <b>Identificación: </b>{{ $beneficiario->Identificacion_Beneficiario }}
    </div>
    <div class="Wrap">
      <label class="property"></label>
      <b>Nombre: </b>{{ $beneficiario->Nombre }} {{ $beneficiario->Apellido_1 }} {{ $beneficiario->Apellido_2 }}
    </div>
<br>
    <br />
    <div>
      <div class="Wrap">
        <label class="property">
          <b>Peso en kilogramos(Kg): </b>{{ $beneficiario->Peso }}
        </label>
      </div>
      <div class="Wrap">
        <label class="property">
          <b>IMC:</b> {{ $beneficiario->IMC }}
        </label>
      </div>
      <div class="Wrap">
        <label class="property">
          <b>Talla en centimetros(Cm):</b> {{ $beneficiario->Talla }}
        </label>
    </div>
    <br />
    <div class="Wrap">
      <label class="property">
        <b>Religión:</b> {{ $beneficiario->Religion}}
      </label>
  </div>
</div>

    <div class="linea"></div>
    <br>
    <p class="Subtittle1">Antecedentes Patológicos</p>
    <div class="Wrap">
      <label class="property">
        <b>HTA: </b>{{ $beneficiario->HTA }}
      </label>
    </div>
    <div class="Wrap">
      <label class="property">
        <b>Diabetes: </b>{{ $beneficiario->Diabetes }}
      </label>
    </div>
    <div class="Wrap">
      <label class="property">
        <b>Asma: </b>{{ $beneficiario->Asma }}
      </label>
    </div>
    <div class="Wrap">
      <label class="property">
        <b>Gastritis: </b>{{ $beneficiario->Gastritis }}
      </label>
    </div>
    <div class="Wrap">
      <label class="property">
        <b>Cardiopatía: </b>{{ $beneficiario->Cardiopatia }}
      </label>
    </div>
    <br>
<br>
    <div class="Wrap">
      <label class="property">
        <b>Tiroides: </b>{{ $beneficiario->Tiroides }}
      </label>
    </div>
    <div class="Wrap">
      <label class="property">
        <b>Triglíceridos colesterol: </b>{{ $beneficiario->Trigliceridos_Colesterol }}
      </label>
    </div>
    <div>
      <br>
        <label>
          <b class="subT">Observaciones de antecedentes patológicos: </b>
        </label>
        <br />
        <label> @if($beneficiario->Observaciones_patologicas == null){{"Sin observaciones"}}
                @else{{ $beneficiario->Observaciones_patologicas }}
                @endif</label>
      </div>

  <div>
    <div class="linea"></div>
    <br>
    <p class="Subtittle1">Cirugías</p>
    <div>
      @if ($beneficiario->Cirugia == 'Si')
      <label> {{ $beneficiario->Descripcion_Cirugia }} </label>
      @else
      <label> No </label>
      @endif
    </div>
    <div class="linea"></div>
    <br>
    <p class="Subtittle1">Ayuda Biomecánica</p>
    <div>
      @if ($beneficiario->AyudaBiomecanica == 'Si')
      <label> {{ $beneficiario->Descripcion_AyudaBiomecanica }} </label>
      @else
      <label> No </label>
      @endif
    </div>
    <div class="linea"></div>
    <br>
    <p class="Subtittle1">Prótesis Dental</p>
    <div>
      @if ($beneficiario->Protesis_Dental == 'Si')
      <label> {{ $beneficiario->Descripcion_Protesis_Dental }} </label>
      @else
      <label> No </label>
      @endif
    </div>
    <div class="linea"></div>
    <br>
    <p class="Subtittle1">Factores Nutricionales</p>

    <div class="Wrap">
      <label class="property">
        <b class="subT">Alimentos intolerables: </b>{{ $beneficiario->Alimentos_Intolerables }}
      </label>
    </div>
    <br>
    <div class="Wrap">
      <label class="property">
        <b class="subT">Alimentos favoritos: </b>{{ $beneficiario->Alimentos_Favoritos }}
      </label>
    </div>
    <div class="linea"></div>
    <br>
    <p class="Subtittle1">Afectación del Sueño</p>
    <div>
      @if ($beneficiario->Sueño == 'Si')
      <label> {{ $beneficiario->Descripcion_Sueño }} </label>
      @else
      <label> No </label>
      @endif
    </div>
    <div class="linea"></div>
    <br>
    <p class="Subtittle1">Afectaciones de Incontinencia</p>
    <div>
      @if ($beneficiario->Incontinencia == 'Si')
      <label> {{ $beneficiario->Descripcion_Incontinencia }} </label>
      @else
      <label> No </label>
      @endif
    </div>
    <div class="linea"></div>
    <br>
    <p class="Subtittle1">Apoyo Familiar</p>
    <div>
      @if ($beneficiario->Apoyo_Familiar == 'Si')
      <label> {{ $beneficiario->Descripcion_Apoyo_Familiar }} </label>
      @else
      <label> No </label>
      @endif
    </div>
    <div class="linea"></div>
    <br>
    <p class="Subtittle1">Déficit Visual y Auditiva</p>
    <div class=" col-md-6 text-center">
      <label>
        <b class="subT">Deficit visual: </b>
      </label>

      <label> {{ $beneficiario->Deficit_Visual }} </label>
    </div>
    <div class=" col-md-6 text-center">
      <label>
        <b class="subT">Deficit auditiva: </b>
      </label>

      <label> {{ $beneficiario->Deficit_Auditiva }} </label>
    </div>
    <div class="linea"></div>
    <br>
    <p class="Subtittle1">Medicación</p>
    <div>
      <label>
        <b class="subT">Dosis de medicamento: </b>
      </label>
      <br />
      <label> {{ $beneficiario->Medicamentos_Dosis }} </label>
    </div>
    <div>
      <label>
        <b class="subT">Padecimiento tratamiento: </b>
      </label>
      <br />
      <label> {{ $beneficiario->Padecimiento_Tratamiento }} </label>
    </div>
    <div class="linea"></div>
    <br>
    <p class="Subtittle1">Diagnóstico</p>
    <div>
      <label>
        <b class="subT">Diagnóstico Fisioterapéutico : </b>
      </label>
      <br />
      <label> {{ $beneficiario->DiagnosticoFisioterapeutico }} </label>
    </div>
    <div>
      <label>
        <b class="subT">Observaciones: </b>
      </label>
      <br />
      <label> @if($beneficiario->Observaciones == null){{"Sin observaciones"}}
              @else{{ $beneficiario->Observaciones }}
              @endif</label>
    </div>
  </div>
</body>

</html>
