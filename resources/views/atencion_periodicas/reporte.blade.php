<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registro Periodico</title>
    <meta charset="UTF-8">
    <link href="{{ asset('css/rptPeriodico.css') }}" rel="stylesheet">

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
        <p class="tittle">Reporte periódico de fisioterapia - {{$fecha}}</p>
        <div class="linea"></div>
        <br>
    <div>
        <label>
            <b>Fecha de atención: </b>
        </label>

        <label>
            {{ $beneficiario->Fecha }}
        </label>

    </div>
<br>
    <div>
        <label>
            <b>Identificación: </b>
        </label>

        <label>
            {{ $beneficiario->Identificacion_Beneficiario }}
        </label>
    </div>
<br>
    <div>
        <label>
            <b>Nombre de paciente: </b>
        </label>

        <label>
            {{ $beneficiario->Nombre }}
        </label>
        <label>
            {{ $beneficiario->Apellido_1 }}
        </label>
        <label>
            {{ $beneficiario->Apellido_2 }}
        </label>
    </div>

<br>
    <div>
        <label>
            <b>Presión arterial (mmHg): </b>
        </label>

        <label>
            {{ $beneficiario->Presion_Arterial }}
        </label>
    </div>
<br>
    <div>
        <label>
            <b>Palpitaciones por minuto: </b>
        </label>

        <label>
            {{ $beneficiario->Palpitaciones }}
        </label>

    </div>
<br>
    <div>
        <label>
            <b>Diabetes mg/dL: </b>
        </label>

        <label>
            {{ $beneficiario->Diabetes }}
        </label>
    </div>

<br>
    <div>
        <label>
            <b>Temperatura en grados celsius (°C): </b>
        </label>

        <label>
            {{ $beneficiario->Temperatura }}
        </label>
    </div>

<br>
    <div>
        <label>
            <b>Oxígeno en la sangre: </b>
        </label>

        <label>
            {{ $beneficiario->Oxigeno }}
        </label>

    </div>
    <br>
    <div>
        <label>
          <b class="subT">Observaciones generales: </b>
        </label>
        <br />
        <label> @if($beneficiario->Observaciones == null){{"Sin observaciones"}}
                @else{{ $beneficiario->Observaciones }}
                @endif</label>
      </div>
</div>
</body>

</html>

