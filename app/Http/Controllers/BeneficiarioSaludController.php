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
            'Sue??o' => 'required',
            'Descripcion_Sue??o' => 'required_if:Sue??o,Si|max:300',
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
            'Fecha.required' => 'Debe indicar la fecha de la ficha m??dica',
            'Peso.required' => 'Debe ingresar el peso del beneficiario',
            'Peso.max' => 'El peso no debe tener mas de 5 caracteres',
            'IMC.required' => 'Debe ingresar el IMC del beneficiario',
            'IMC.max' => 'El IMC no debe tener m??s de 5 caracteres',
            'Talla.required' => 'Debe ingresar la talla del beneficiario',
            'Talla.max' => 'La talla no debe tener m??s de 5 caracteres',
            'Religion.required' => 'Debe indicar la religi??n del beneficiario',
            'Religion.max' => 'La religi??n no debe tener m??s de 50 caracteres',
            'HTA.required' => 'Elija una opci??n en hipertensi??n  arterial',
            'Diabetes.required' => 'Elija una opci??n en diabetes',
            'Asma.required' => 'Elija una opci??n en asma',
            'Gastritis.required' => 'Elija una opci??n en gastritis',
            'Tiroides.required' => 'Elija una opci??n en tiroides',
            'Cardiopatia.required' => 'Elija una opci??n en cardiopat??a',
            'Trigliceridos_Colesterol.required' => 'Elija una opci??n en triglic??ridos colesterol',
            'Observaciones_patologicas.max' => 'La observaci??n de antecedentes patol??gicos no debe tener mas de 300 caracteres',

            'Cirugia.required' => 'Elija una opci??n en cirug??a',
            'Descripcion_Cirugia.required_if' => 'Debe ingresar la descripci??n de la cirug??a',
            'Descripcion_Cirugia.max' => 'La descripci??n cirug??a no debe tener m??s de 300 caracteres',
            'AyudaBiomecanica.required' => 'Elija una opci??n en ayuda biomec??nica ',
            'Descripcion_AyudaBiomecanica.required_if' => 'Debe ingresar la descripci??n de ayuda biomec??nica',
            'Descripcion_AyudaBiomecanica.max' => 'La descripci??n de ayuda biomec??nica no debe tener mas de 300 caracteres',
            'Protesis_Dental.required' => 'Elija una opci??n en pr??tesis dental',
            'Descripcion_Protesis_Dental.required_if' => 'Debe ingresar la descripci??n de pr??tesis dental',
            'Descripcion_Protesis_Dental.max' => 'La descripci??n de pr??tesis dental no debe tener m??s de 300 caracteres',
            'Alimentos_Intolerables.required' => 'Debe ingresar los alimentos intolerables',
            'Alimentos_Intolerables.max' => 'La descripci??n de alimentos intolerables no debe tener m??s de 300 caracteres',
            'Alimentos_Favoritos.required' => 'Debe ingresar los alimentos favoritos',
            'Alimentos_Favoritos.max' => 'La descripci??n de alimentos favoritos no debe tener m??s de 300 caracteres',
            'Sue??o.required' => 'Elija una opci??n en afectaci??n de sue??o',
            'Descripcion_Sue??o.required_if' => 'Debe ingresar la descripci??n de afectaci??n de sue??o',
            'Descripcion_Sue??o.max' => 'La descripci??n de afectaci??n de sue??o no debe tener mas de 300 caracteres',
            'Incontinencia.required' => 'Elija una opci??n en afectaci??n de incontinencia',
            'Descripcion_Incontinencia.required_if' => 'Debe ingresar la descripci??n de afectaci??n de incontinencia',
            'Descripcion_Incontinencia.max' => 'La descripci??n de afectaci??n de incontinencia no debe tener m??s de 300 caracteres',
            'Apoyo_Familiar.required' => 'Elija una opci??n en apoyo familiar',
            'Descripcion_Apoyo_Familiar.required_if' => 'Debe igresar la descripci??n del apoyo familiar',
            'Descripcion_Apoyo_Familiar.max' => 'La descripci??n de apoyo familiar no debe tener m??s de 300 caracteres.',
            'Deficit_Visual.required' => 'Elija una opci??n en deficit visual',
            'Deficit_Auditiva.required' => 'Elija una opci??n en deficit auditiva',
            'Medicamentos_Dosis.required' => 'Debe ingresar la medicaci??n/dosis',
            'Medicamentos_Dosis.max' => 'La descripci??n medicamentos/dosis no debe tener m??s de 255 caracteres',
            'Padecimiento_Tratamiento.required' => 'Debe ingresar el padecimiento/tratamiento',
            'Padecimiento_Tratamiento.max' => 'La descripci??n de padecimiento/tratamiento no bebe tener m??s de 255 caracteres',
            'DiagnosticoFisioterapeutico.required' => 'Debe ingresar el diagn??stico fisioterap??utico',
            'DiagnosticoFisioterapeutico.max' => 'La descripci??n de diagn??stico fisioterap??utico no bebe tener m??s de 255 caracteres',

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
            'Sue??o' => 'required',
            'Descripcion_Sue??o' => 'required_if:Sue??o,Si|max:300',
            'Incontinencia' => 'required',
            'Descripcion_Incontinencia' => 'required_if:Incontinencia,Si|max:300',
            'Apoyo_Familiar' => 'required',
            'Descripcion_Apoyo_Familiar' => 'required_if:Apoyo_Familiar,Si|max:300',
            'Deficit_Visual' => 'required',
            'Deficit_Auditiva' => 'required'
        ];

        $mensaje = [
            'Fecha.required' => 'Debe indicar la fecha de la ficha m??dica',
            'Peso.required' => 'Debe ingresar el peso del beneficiario',
            'Peso.max' => 'El peso no debe tener mas de 5 caracteres',
            'IMC.required' => 'Debe ingresar el IMC del beneficiario',
            'IMC.max' => 'El IMC no debe tener m??s de 5 caracteres',
            'Talla.required' => 'Debe ingresar la talla del beneficiario',
            'Talla.max' => 'La talla no debe tener m??s de 5 caracteres',
            'Religion.required' => 'Debe indicar la religi??n del beneficiario',
            'Religion.max' => 'La religi??n no debe tener m??s de 50 caracteres',
            'HTA.required' => 'Elija una opci??n en hipertensi??n  arterial',
            'Diabetes.required' => 'Elija una opci??n en diabetes',
            'Asma.required' => 'Elija una opci??n en asma',
            'Gastritis.required' => 'Elija una opci??n en gastritis',
            'Tiroides.required' => 'Elija una opci??n en tiroides',
            'Cardiopatia.required' => 'Elija una opci??n en cardiopat??a',
            'Trigliceridos_Colesterol.required' => 'Elija una opci??n en triglic??ridos colesterol',
            'Observaciones_patologicas.max' => 'La observaci??n de antecedentes patol??gicos no debe tener mas de 300 caracteres',

            'Cirugia.required' => 'Elija una opci??n en cirug??a',
            'Descripcion_Cirugia.required_if' => 'Debe ingresar la descripci??n de la cirug??a',
            'Descripcion_Cirugia.max' => 'La descripci??n cirug??a no debe tener m??s de 300 caracteres',
            'AyudaBiomecanica.required' => 'Elija una opci??n en ayuda biomec??nica ',
            'Descripcion_AyudaBiomecanica.required_if' => 'Debe ingresar la descripci??n de ayuda biomec??nica',
            'Descripcion_AyudaBiomecanica.max' => 'La descripci??n de ayuda biomec??nica no debe tener mas de 300 caracteres',
            'Protesis_Dental.required' => 'Elija una opci??n en pr??tesis dental',
            'Descripcion_Protesis_Dental.required_if' => 'Debe ingresar la descripci??n de pr??tesis dental',
            'Descripcion_Protesis_Dental.max' => 'La descripci??n de pr??tesis dental no debe tener m??s de 300 caracteres',
            'Alimentos_Intolerables.required' => 'Debe ingresar los alimentos intolerables',
            'Alimentos_Intolerables.max' => 'La descripci??n de alimentos intolerables no debe tener m??s de 300 caracteres',
            'Alimentos_Favoritos.required' => 'Debe ingresar los alimentos favoritos',
            'Alimentos_Favoritos.max' => 'La descripci??n de alimentos favoritos no debe tener m??s de 300 caracteres',
            'Sue??o.required' => 'Elija una opci??n en afectaci??n de sue??o',
            'Descripcion_Sue??o.required_if' => 'Debe ingresar la descripci??n de afectaci??n de sue??o',
            'Descripcion_Sue??o.max' => 'La descripci??n de afectaci??n de sue??o no debe tener mas de 300 caracteres',
            'Incontinencia.required' => 'Elija una opci??n en afectaci??n de incontinencia',
            'Descripcion_Incontinencia.required_if' => 'Debe ingresar la descripci??n de afectaci??n de incontinencia',
            'Descripcion_Incontinencia.max' => 'La descripci??n de afectaci??n de incontinencia no debe tener m??s de 300 caracteres',
            'Apoyo_Familiar.required' => 'Elija una opci??n en apoyo familiar',
            'Descripcion_Apoyo_Familiar.required_if' => 'Debe igresar la descripci??n del apoyo familiar',
            'Descripcion_Apoyo_Familiar.max' => 'La descripci??n de apoyo familiar no debe tener m??s de 300 caracteres.',
            'Deficit_Visual.required' => 'Elija una opci??n en deficit visual',
            'Deficit_Auditiva.required' => 'Elija una opci??n en deficit auditiva',
            'Medicamentos_Dosis.required' => 'Debe ingresar la medicaci??n/dosis',
            'Medicamentos_Dosis.max' => 'La descripci??n medicamentos/dosis no debe tener m??s de 255 caracteres',
            'Padecimiento_Tratamiento.required' => 'Debe ingresar el padecimiento/tratamiento',
            'Padecimiento_Tratamiento.max' => 'La descripci??n de padecimiento/tratamiento no bebe tener m??s de 255 caracteres',
            'DiagnosticoFisioterapeutico.required' => 'Debe ingresar el diagn??stico fisioterap??utico',
            'DiagnosticoFisioterapeutico.max' => 'La descripci??n de diagn??stico fisioterap??utico no bebe tener m??s de 255 caracteres',
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
