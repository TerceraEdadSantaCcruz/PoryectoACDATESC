<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Reporte Beneficiario</title>
    <meta charset="UTF-8" />
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/rptBeneficiario.css') }}" rel="stylesheet">
  </head>

  <body>
    <div class="invoice-box">
     {{-- <tr class="top">
        <td colspan="2">--}}
          <table>
            <tr>
              <td class="title">
                <img
                  src="img/logoRpt.png"
                  style="width: 100%; max-width: 150px"
                />
              </td>

              <td>
               <p class="aso">ASOCIACIÓN CENTRO DIURNO DE ATENCIÓN <br/>A CIUDADANOS DE LA TERCERA EDAD DE <br/>SANTA CRUZ.<br/></p>
              </td>
            </tr>
          </table>
       {{-- </td>
      </tr>--}}
      
      <p class="tittle">Reporte de beneficiario - {{ $fecha }}</p>

      <div class="linea"></div>
      <br>
      <p class="Subtittle1">Datos personales</p>
      <div>
        <label>
          <b>Identificación: </b>
        </label>

        <label> {{ $beneficiario->Identificacion_Beneficiario }} </label>
      </div>

      <div>
        <label>
          <b>Nombre: </b>
        </label>

        <label> {{ $beneficiario->Nombre }} </label>
        <label> {{ $beneficiario->Apellido_1 }} </label>
        <label> {{ $beneficiario->Apellido_2 }} </label>
      </div>

      <div>
        <label>
          <b>Fecha de nacimiento: </b>
        </label>

        <label> {{ $beneficiario->Fecha_nacimiento }} </label>
      </div>

      <div>
        <label>
          <b>Teléfono: </b>
        </label>

        <label> {{ $beneficiario->Telefono }} </label>
      </div>

      <div>
        <label>
          <b>Dirección: </b>
        </label>

        <label> {{ $beneficiario->Direccion }} </label>
      </div>

      <div>
        <label>
          <b>Fecha de ingreso: </b>
        </label>

        <label> {{ $beneficiario->Fecha_Ingreso }} </label>
      </div>
      
      <div class="linea"></div>
      <br>
      <p class="Subtittle1">Datos de Encargado</p>
      @if($encargado == null)
      <div>
        <label> Persona encargada no registrada </label>
      </div>

      @else
      <div>
        <label>
          <b>Nombre: </b>
        </label>

        <label> {{ $encargado->Nombre_Encargado }} </label>
        <label> {{ $encargado->Apellido_1_Encargado }} </label>
        <label> {{ $encargado->Apellido_2_Encargado }} </label>
      </div>

      <div>
        <label>
          <b>Teléfono: </b>
        </label>

        <label> {{ $encargado->Telefono_Encargado }} </label>
      </div>

      <div>
        <label>
          <b>Correo electrónico: </b>
        </label>

        <label> {{ $encargado->Correo_Electronico_Encargado }} </label>
      </div>

      <div>
        <label>
          <b>Fecha de nacimiento: </b>
        </label>

        <label> {{ $encargado->Fecha_Nacimiento_Encargado }} </label>
      </div>

      <div>
        <label>
          <b>Dirección: </b>
        </label>

        <label> {{ $encargado->Direccion_Encargado }} </label>
      </div>
      @endif
    
    <div class="linea"></div>
    <br>
    <p class="Subtittle1">Historial de pagos</p>
    
    @if( $pagosCount < 1 )
    <div>
      <label> No hay registros de pagos </label>
    </div>
    @else
    <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
      <thead class="bg-primary">
            <tr>
                <th>Fecha de pago</th>
                <th>Tipo de cuota</th>
                <th>Monto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pagos as $pago)
            <tr>
              <td>{{ $pago->Fecha_Pago}}</td>
                <td>{{ $pago->Tipo_Cuota}}</td>
                <td>¢ {{ $pago->Monto}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
  </div>
  </body>
</html>
