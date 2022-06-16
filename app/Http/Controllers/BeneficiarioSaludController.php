<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\BeneficiarioSalud;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class BeneficiarioSaludController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datos['beneficiario'] = Beneficiario::join('beneficiario_saluds', 'beneficiario_saluds.beneficiario_id', '=', 'beneficiarios.id')
            ->orderBy('beneficiario_salud_id', 'DESC')
            ->paginate();

        return view('beneficiario_Salud.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $beneficiarios = Beneficiario::orderBy('Apellido_1', 'ASC')
            ->get();
        return view('beneficiario_Salud.create', compact('beneficiarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $campos = [
            'beneficiario_id' => 'required|not_in:0',
            'Fecha' => 'required|date_format:Y-m-d',
            'Peso' => 'required|max:5',
            'IMC' => 'required|string|max:5',
            'Talla' => 'required|max:5',
            'Religion' => 'required|max:50',
            'HTA' => 'required',
            'Diabetes' => 'required',
            'Asma' => 'required',
            'Gastritis' => 'required',
            'Tiroides' => 'required',
            'Cardiopatia' => 'required',
            'Trigliceridos_Colesterol' => 'required',
            'Cirugia' => 'required',
            'Descripcion_Cirugia' => 'required_if:Cirugia,Si|max:300',
            'AyudaBiomecanica' => 'required',
            'Descripcion_AyudaBiomecanica' => 'required_if:AyudaBiomecanica,Si|max:300',
            'Medicamentos_Dosis' => 'required|max:255',
            'Padecimiento_Tratamiento' => 'required|max:255',
            'DiagnosticoFisioterapeutico' => 'required|max:255',
            'Observaciones_patologicas' => 'max:300',
            'Protesis_Dental' => 'required',
            'Descripcion_Protesis_Dental' => 'required_if:Protesis_Dental,Si|max:300',
            'Alimentos_Intolerables' => 'required|max:300',
            'Alimentos_Favoritos' => 'required|max:300',
            'Sueño' => 'required',
            'Descripcion_Sueño' => 'required_if:Sueño,Si|max:300',
            'Incontinencia' => 'required',
            'Descripcion_Incontinencia' => 'required_if:Incontinencia,Si|max:300',
            'Apoyo_Familiar' => 'required',
            'Descripcion_Apoyo_Familiar' => 'required_if:Apoyo_Familiar,Si|max:300',
            'Deficit_Visual' => 'required',
            'Deficit_Auditiva' => 'required'
        ];

        $mensaje = [
            'beneficiario_id.required' => 'Debe seleccionar un beneficiario',
            'beneficiario_id.not_in' => 'Debe seleccionar un beneficiario',
            'Fecha.required' => 'Debe indicar la fecha de la ficha médica',
            'Peso.required' => 'Debe ingresar el peso del beneficiario',
            'Peso.max' => 'El peso no debe tener mas de 5 caracteres',
            'IMC.required' => 'Debe ingresar el IMC del beneficiario',
            'IMC.max' => 'El IMC no debe tener más de 5 caracteres',
            'Talla.required' => 'Debe ingresar la talla del beneficiario',
            'Talla.max' => 'La talla no debe tener más de 5 caracteres',
            'Religion.required' => 'Debe indicar la religión del beneficiario',
            'Religion.max' => 'La religión no debe tener más de 50 caracteres',
            'HTA.required' => 'Elija una opción en hipertensión  arterial',
            'Diabetes.required' => 'Elija una opción en diabetes',
            'Asma.required' => 'Elija una opción en asma',
            'Gastritis.required' => 'Elija una opción en gastritis',
            'Tiroides.required' => 'Elija una opción en tiroides',
            'Cardiopatia.required' => 'Elija una opción en cardiopatía',
            'Trigliceridos_Colesterol.required' => 'Elija una opción en triglicéridos colesterol',
            'Observaciones_patologicas.max' => 'La observación de antecedentes patológicos no debe tener mas de 300 caracteres',

            'Cirugia.required' => 'Elija una opción en cirugía',
            'Descripcion_Cirugia.required_if' => 'Debe ingresar la descripción de la cirugía',
            'Descripcion_Cirugia.max' => 'La descripción cirugía no debe tener más de 300 caracteres',
            'AyudaBiomecanica.required' => 'Elija una opción en ayuda biomecánica ',
            'Descripcion_AyudaBiomecanica.required_if' => 'Debe ingresar la descripción de ayuda biomecánica',
            'Descripcion_AyudaBiomecanica.max' => 'La descripción de ayuda biomecánica no debe tener mas de 300 caracteres',
            'Protesis_Dental.required' => 'Elija una opción en prótesis dental',
            'Descripcion_Protesis_Dental.required_if' => 'Debe ingresar la descripción de prótesis dental',
            'Descripcion_Protesis_Dental.max' => 'La descripción de prótesis dental no debe tener más de 300 caracteres',
            'Alimentos_Intolerables.required' => 'Debe ingresar los alimentos intolerables',
            'Alimentos_Intolerables.max' => 'La descripción de alimentos intolerables no debe tener más de 300 caracteres',
            'Alimentos_Favoritos.required' => 'Debe ingresar los alimentos favoritos',
            'Alimentos_Favoritos.max' => 'La descripción de alimentos favoritos no debe tener más de 300 caracteres',
            'Sueño.required' => 'Elija una opción en afectación de sueño',
            'Descripcion_Sueño.required_if' => 'Debe ingresar la descripción de afectación de sueño',
            'Descripcion_Sueño.max' => 'La descripción de afectación de sueño no debe tener mas de 300 caracteres',
            'Incontinencia.required' => 'Elija una opción en afectación de incontinencia',
            'Descripcion_Incontinencia.required_if' => 'Debe ingresar la descripción de afectación de incontinencia',
            'Descripcion_Incontinencia.max' => 'La descripción de afectación de incontinencia no debe tener más de 300 caracteres',
            'Apoyo_Familiar.required' => 'Elija una opción en apoyo familiar',
            'Descripcion_Apoyo_Familiar.required_if' => 'Debe igresar la descripción del apoyo familiar',
            'Descripcion_Apoyo_Familiar.max' => 'La descripción de apoyo familiar no debe tener más de 300 caracteres.',
            'Deficit_Visual.required' => 'Elija una opción en deficit visual',
            'Deficit_Auditiva.required' => 'Elija una opción en deficit auditiva',
            'Medicamentos_Dosis.required' => 'Debe ingresar la medicación/dosis',
            'Medicamentos_Dosis.max' => 'La descripción medicamentos/dosis no debe tener más de 255 caracteres',
            'Padecimiento_Tratamiento.required' => 'Debe ingresar el padecimiento/tratamiento',
            'Padecimiento_Tratamiento.max' => 'La descripción de padecimiento/tratamiento no bebe tener más de 255 caracteres',
            'DiagnosticoFisioterapeutico.required' => 'Debe ingresar el diagnóstico fisioterapéutico',
            'DiagnosticoFisioterapeutico.max' => 'La descripción de diagnóstico fisioterapéutico no bebe tener más de 255 caracteres',

        ];

        $this->validate($request, $campos, $mensaje);

        $datosBeneficiario = request()->except('_token');

        BeneficiarioSalud::insert($datosBeneficiario);

        Alert::success('Registro Guardado', 'El registro se ha guardado correctamente');

        return  redirect('beneficiario_Salud');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beneficiario_Salud  $beneficiario_Salud
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $beneficiario_Salud = BeneficiarioSalud::where('beneficiario_saluds.beneficiario_salud_id','=',$id)
        ->join('beneficiarios', 'beneficiario_saluds.beneficiario_id', '=', 'beneficiarios.id')
        ->first();

        return view('beneficiario_Salud.show', compact('beneficiario_Salud'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BeneficiarioSalud  $beneficiario_Salud
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $beneficiario_Salud = BeneficiarioSalud::findOrFail($id);

        return view('beneficiario_Salud.edit', compact('beneficiario_Salud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beneficiario_Salud  $beneficiario_Salud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'Fecha' => 'required|date_format:Y-m-d',
            'Peso' => 'required|max:50',
            'IMC' => 'required|string|max:5',
            'Talla' => 'required|max:5',
            'Religion' => 'required|max:50',
            'HTA' => 'required',
            'Diabetes' => 'required',
            'Asma' => 'required',
            'Gastritis' => 'required',
            'Tiroides' => 'required',
            'Cardiopatia' => 'required',
            'Trigliceridos_Colesterol' => 'required',
            'Cirugia' => 'required',
            'Descripcion_Cirugia' => 'required_if:Cirugia,Si|max:300',
            'AyudaBiomecanica' => 'required',
            'Descripcion_AyudaBiomecanica' => 'required_if:AyudaBiomecanica,Si|max:300',
            'Medicamentos_Dosis' => 'required|max:255',
            'Padecimiento_Tratamiento' => 'required|max:255',
            'DiagnosticoFisioterapeutico' => 'required|max:255',
            'Observaciones_patologicas' => 'max:300',
            'Protesis_Dental' => 'required',
            'Descripcion_Protesis_Dental' => 'required_if:Protesis_Dental,Si|max:300',
            'Alimentos_Intolerables' => 'required|max:300',
            'Alimentos_Favoritos' => 'required|max:300',
            'Sueño' => 'required',
            'Descripcion_Sueño' => 'required_if:Sueño,Si|max:300',
            'Incontinencia' => 'required',
            'Descripcion_Incontinencia' => 'required_if:Incontinencia,Si|max:300',
            'Apoyo_Familiar' => 'required',
            'Descripcion_Apoyo_Familiar' => 'required_if:Apoyo_Familiar,Si|max:300',
            'Deficit_Visual' => 'required',
            'Deficit_Auditiva' => 'required'
        ];

        $mensaje = [
            'Fecha.required' => 'Debe indicar la fecha de la ficha médica',
            'Peso.required' => 'Debe ingresar el peso del beneficiario',
            'Peso.max' => 'El peso no debe tener mas de 5 caracteres',
            'IMC.required' => 'Debe ingresar el IMC del beneficiario',
            'IMC.max' => 'El IMC no debe tener más de 5 caracteres',
            'Talla.required' => 'Debe ingresar la talla del beneficiario',
            'Talla.max' => 'La talla no debe tener más de 5 caracteres',
            'Religion.required' => 'Debe indicar la religión del beneficiario',
            'Religion.max' => 'La religión no debe tener más de 50 caracteres',
            'HTA.required' => 'Elija una opción en hipertensión  arterial',
            'Diabetes.required' => 'Elija una opción en diabetes',
            'Asma.required' => 'Elija una opción en asma',
            'Gastritis.required' => 'Elija una opción en gastritis',
            'Tiroides.required' => 'Elija una opción en tiroides',
            'Cardiopatia.required' => 'Elija una opción en cardiopatía',
            'Trigliceridos_Colesterol.required' => 'Elija una opción en triglicéridos colesterol',
            'Observaciones_patologicas.max' => 'La observación de antecedentes patológicos no debe tener mas de 300 caracteres',

            'Cirugia.required' => 'Elija una opción en cirugía',
            'Descripcion_Cirugia.required_if' => 'Debe ingresar la descripción de la cirugía',
            'Descripcion_Cirugia.max' => 'La descripción cirugía no debe tener más de 300 caracteres',
            'AyudaBiomecanica.required' => 'Elija una opción en ayuda biomecánica ',
            'Descripcion_AyudaBiomecanica.required_if' => 'Debe ingresar la descripción de ayuda biomecánica',
            'Descripcion_AyudaBiomecanica.max' => 'La descripción de ayuda biomecánica no debe tener mas de 300 caracteres',
            'Protesis_Dental.required' => 'Elija una opción en prótesis dental',
            'Descripcion_Protesis_Dental.required_if' => 'Debe ingresar la descripción de prótesis dental',
            'Descripcion_Protesis_Dental.max' => 'La descripción de prótesis dental no debe tener más de 300 caracteres',
            'Alimentos_Intolerables.required' => 'Debe ingresar los alimentos intolerables',
            'Alimentos_Intolerables.max' => 'La descripción de alimentos intolerables no debe tener más de 300 caracteres',
            'Alimentos_Favoritos.required' => 'Debe ingresar los alimentos favoritos',
            'Alimentos_Favoritos.max' => 'La descripción de alimentos favoritos no debe tener más de 300 caracteres',
            'Sueño.required' => 'Elija una opción en afectación de sueño',
            'Descripcion_Sueño.required_if' => 'Debe ingresar la descripción de afectación de sueño',
            'Descripcion_Sueño.max' => 'La descripción de afectación de sueño no debe tener mas de 300 caracteres',
            'Incontinencia.required' => 'Elija una opción en afectación de incontinencia',
            'Descripcion_Incontinencia.required_if' => 'Debe ingresar la descripción de afectación de incontinencia',
            'Descripcion_Incontinencia.max' => 'La descripción de afectación de incontinencia no debe tener más de 300 caracteres',
            'Apoyo_Familiar.required' => 'Elija una opción en apoyo familiar',
            'Descripcion_Apoyo_Familiar.required_if' => 'Debe igresar la descripción del apoyo familiar',
            'Descripcion_Apoyo_Familiar.max' => 'La descripción de apoyo familiar no debe tener más de 300 caracteres.',
            'Deficit_Visual.required' => 'Elija una opción en deficit visual',
            'Deficit_Auditiva.required' => 'Elija una opción en deficit auditiva',
            'Medicamentos_Dosis.required' => 'Debe ingresar la medicación/dosis',
            'Medicamentos_Dosis.max' => 'La descripción medicamentos/dosis no debe tener más de 255 caracteres',
            'Padecimiento_Tratamiento.required' => 'Debe ingresar el padecimiento/tratamiento',
            'Padecimiento_Tratamiento.max' => 'La descripción de padecimiento/tratamiento no bebe tener más de 255 caracteres',
            'DiagnosticoFisioterapeutico.required' => 'Debe ingresar el diagnóstico fisioterapéutico',
            'DiagnosticoFisioterapeutico.max' => 'La descripción de diagnóstico fisioterapéutico no bebe tener más de 255 caracteres',
        ];

        $this->validate($request, $campos, $mensaje);
        //
        $datosBeneficiario = request()->except('_token', '_method');
        BeneficiarioSalud::where('beneficiario_salud_id', '=', $id)->update($datosBeneficiario);

        $beneficiario_Salud = BeneficiarioSalud::findOrFail($id);

        Alert::success('Registro Editado', 'El registro se ha editado correctamente');

        return redirect('beneficiario_Salud');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BeneficiarioSalud  $beneficiario_Salud
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $beneficiario_Salud = BeneficiarioSalud::findOrFail($id);
        $delete = BeneficiarioSalud::destroy($id);


        if ($delete == 1) {
            try {
                if (Storage::delete('public/' . $beneficiario_Salud->Fotografia)) {
                    BeneficiarioSalud::destroy($id);
                } else {
                    BeneficiarioSalud::destroy($id);
                }
                $success = true;
                $message = "El registro se ha eliminado correctamente";
            } catch (\Exception $e) {
                if ($e->getCode() == "23000") {
                    Alert::error('No se puede eliminar este registro');
                }
            }
        } else {
            $success = true;
            $message = "No se puede eliminar este registro";
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public static function downloadPDF($id)
    {
        $beneficiario = BeneficiarioSalud::where('beneficiario_salud_id', '=', $id)
            ->join('beneficiarios', 'beneficiario_saluds.beneficiario_id', '=', 'beneficiarios.id')
            ->first();
            $fecha = Carbon::now();
            $fecha = $fecha->format('d/m/Y');

        $pdf = PDF::loadView('beneficiario_Salud.reporte', compact('beneficiario','fecha'));

        return $pdf->stream('beneficiario.pdf');
    }
}
