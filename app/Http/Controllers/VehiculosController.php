<?php
namespace App\Http\Controllers;
use App\Models\Organizacione;
use App\Models\propietario;
use App\Models\Vehiculo;
use App\Models\User;
use PDF;
use App\Helpers\Helper;
use Hamcrest\Core\IsNull;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\Qrcode;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class VehiculosController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
    abort_if(Gate::denies('vehiculo_index'), 403);
    $searchText = $request->get('fromDate');
    $searchText2 = $request->get('toDate');
    $mytime = Carbon::now('America/La_Paz');
    $fechActual = $mytime->toDateString();
        //
    if (empty($searchText) && empty($searchtex2)) {
        $vehiculos = Vehiculo::all();
        return view('vehiculo.index', compact('vehiculos', 'fechActual', 'searchText', 'searchText2'));
    }else {

        $vehiculos = Vehiculo::whereBetween('fechaInicio', array($searchText, $searchText2))->get();
        return view('vehiculo.index', compact('vehiculos','fechActual','searchText', 'searchText2'));
    }



}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        abort_if(Gate::denies('vehiculo_create'), 403);
        $organizaciones = Organizacione::orderBy('id', 'desc')->get();
        $propietarios = Propietario::orderBy('id', 'desc')->get();


        return view('vehiculo.create', compact('organizaciones', 'propietarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {


           //
    $request->validate([

         'organizacion'=> 'required',
        'ci' => 'required|alpha_dash',
        'nombre' => 'required|regex:/^[a-zA-ZÀ-ÿ\s]{1,255}$/',
        'domicilio' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s\_\-\"\'\(\)\/]+)',
        'telefono' => 'required|alpha_dash',
        'anio' => 'required',
        'placa' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s\_\-]+)',
        'color' => 'required|regex:/^[a-zA-ZÀ-ÿ\s]{1,255}$/',
        'chasis' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s\_\-\*\+\(\)\"]+)',
        'motor' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s\_\-\*\+\(\)\"]+)',
        'capacidad' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s\_\-\/\.\,]+)',
        'asiento'=> 'required|regex:/^\d{1,10}$/',
        'modelo'=> 'required|regex:/^\d{1,4}$/',
        'marca' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s\_\-]+)',
        'tipoVehiculo' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s\-\_]+)',
        'combustible' => 'required|regex:/^[a-zA-ZÀñÑáéíóúÁÉÍÓÚ-ÿ\s]{1,255}$/',
        'fechaInicio' => 'required',
        'fechaFin' => 'required',

    ],

     [
        'organizacion.required' => 'La organizacion es obligatorio.',
        'anio.required' => 'El campo año es obligatorio.',
        'ci.required' => 'El campo ci es obligatorio.',
        'ci.alpha_dash'=> 'El formato SOLO puede contener letras,numero y guiones',
        'nombre.required' => 'El campo nombre es obligatorio.',
        'nombre.regex'=> 'El formato SOLO puede contener letras',
        'domicilio.required' => 'El campo domicilio es obligatorio.',
        'dimicilio.regex'=> 'El formato SOLO puede contener letras y guiones y caracteres',
        'telefono.required' => 'El campo telefono es obligatorio.',
        'telefono.alpha_dash'=> 'El formato de  telefono solo puede contener letras, numeros y el maximo es de 8 digitos',
        'placa.required' => 'El campo Placa es obligatorio',
        'placa.regex'=> 'El formato debe de contener letras, numeros y giones',
        'color.required' => 'El campo Color es obligatorio',
        'color.regex'=> 'El formato SOLO puede contener letras',
        'chasis.required' => 'El campo Chasis es obligatorio',
        'chasis.regex'=> 'El formato SOLO puede contener letras, numeros y guiones',
        'moto.required'=> 'El campo Motor es obligatorio',
        'moto.regex'=> 'El formato SOLO puede contener letras, numeros y guiones',
        'capacidad.required' => 'El campo Capacidad es obligatorio',
        'capacidad.regex'=> 'El formato SOLO puede contener letras y numeros',
        'asiento.required' => 'el campo Asiento es obligatorio',
        'asiento.regex'=> 'El formato SOLO puede contener numeros',
        'modelo.required' => 'El campo Modelo es obligatorio',
        'modelo.regex'=> 'El formato modelo debe de ser año y el maximo es de 4 digitos',
        'marca.required' => 'El campo Marca es obligatorio',
        'marca.regex'=> 'El formato debe de contener letras, numeros y giones',
        'tipoVehiculo' => 'El campo Tipo de Vehiculo es obligatorio',
        'tipoVehiculo.regex'=> 'El formato SOLO puede contener letras, numeros y guiones',
        'combustible.required' => 'El campo Combustible es obligatorio',
        'combustible.regex'=> 'El formato SOLO puede contener letras',
        'fechaInicio.required' => 'El campo de fecha de Registro es obligatorio',
        'fechaFin.required' => 'El campo de la fecha de vencimiento es obligatorio'


    ]);

   DB::beginTransaction();
            try{

                    $propietario = new Propietario();
                    $propietario->ci = strtoupper($request->ci);
                    $propietario->nombre = strtoupper($request->nombre);
                    $propietario->domicilio = strtoupper($request->domicilio);
                    $propietario->telefono = strtoupper($request->telefono);
                    $propietario->save();
                    $vehiculo = new Vehiculo;
                    $vehiculo->propietario_id = $propietario->id;
                    $n = Helper::IDGenerator(new Vehiculo, 'n', 4, 'N°'); /** Generate id */
                    $vehiculo->n = $n;
                    $vehiculo->anio = strtoupper($request->anio);
                    $vehiculo->placa = strtoupper($request->placa);
                    $vehiculo->color = strtoupper($request->color);
                    $vehiculo->chasis = strtoupper($request->chasis);
                    $vehiculo->motor = strtoupper($request->motor);
                    $vehiculo->capacidad = strtoupper($request->capacidad);
                    $vehiculo->asiento = strtoupper($request->asiento);
                    $vehiculo->modelo = strtoupper($request->modelo);
                    $vehiculo->marca = strtoupper($request->marca);
                    $vehiculo->tipoVehiculo = strtoupper($request->tipoVehiculo);
                    $vehiculo->combustible = strtoupper($request->combustible);
                    $vehiculo->fechaInicio = $request->fechaInicio;
                    $vehiculo->fechaFin = $request->fechaFin;
                    $vehiculo->organizacion_id = $request->organizacion;
                     /*$vehiculo->user_id = Auth()->user()->name; */
                     $vehiculo->user_id = Auth::user()->id;


                  /*    SELECT users.name
                        FROM `vehiculos`, `users`
                        where vehiculos.user_id = users.id AND vehiculos.user_id =2; */


/*
                        DB::table('`vehiculos`')
                        ->select('users.name')
                        ->crossJoin('`users`')
                        ->whereRaw('vehiculos.user_id = users.id')
                        ->where('vehiculos.user_id','=',2)
                        ->get(); */

                    $vehiculo->save();

                    DB::commit();
                    return redirect()->route('vehiculo.index')->with('datos', 'Registrado Correctamente');

            }catch (\Exception $e){
              DB::rollBack();
                 return redirect()->route('vehiculo.create')->with('datos', 'error vuelve a intentarlo');
             }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('vehiculo_show'), 403);

        $vehiculo = Vehiculo::find($id);
        $fechaini = Carbon::parse($vehiculo->fechaInicio);
        $f = $fechaini->format('d-m-Y');
        $fechafin = Carbon::parse($vehiculo->fechaFin);
        $ff = $fechafin->format('d-m-Y');
        return view('vehiculo.show', compact('vehiculo','f','ff'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        abort_if(Gate::denies('vehiculo_edit'), 403);
        $vehiculo = Vehiculo::findOrFail($id);
        $organizaciones = Organizacione::orderBy('nombre', 'asc')->get();
        $propietario = Propietario::findOrFail($id);
        return view('vehiculo.edit', compact('vehiculo', 'organizaciones', 'propietario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'organizacion'=> 'required',
           'ci' => 'required|alpha_dash',
           'nombre' => 'required|regex:/^[a-zA-ZÀ-ÿ\s]{1,255}$/',
           'domicilio' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s\_\-\"\'\(\)\/]+)',
           'telefono' => 'required|alpha_dash',
           'anio' => 'required',
           'placa' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s\_\-]+)',
           'color' => 'required|regex:/^[a-zA-ZÀ-ÿ\s]{1,255}$/',
           'chasis' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s\_\-\*\+\(\)\"]+)',
           'motor' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s\_\-\*\+\(\)\"]+)',
           'capacidad' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s\_\-\/\.\,]+)',
           'asiento'=> 'required|regex:/^\d{1,10}$/',
           'modelo'=> 'required|regex:/^\d{1,4}$/',
           'marca' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s\_\-]+)',
           'tipoVehiculo' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s\-\_]+)',
           'combustible' => 'required|regex:/^[a-zA-ZÀñÑáéíóúÁÉÍÓÚ-ÿ\s]{1,255}$/',
           'fechaInicio' => 'required',
           'fechaFin' => 'required',

       ],

        [
           'organizacion.required' => 'La organizacion es obligatorio.',
           'anio.required' => 'El campo año es obligatorio.',
           'ci.required' => 'El campo ci es obligatorio.',
           'ci.alpha_dash'=> 'El formato SOLO puede contener letras,numero y guiones',
           'nombre.required' => 'El campo nombre es obligatorio.',
           'nombre.regex'=> 'El formato SOLO puede contener letras',
           'domicilio.required' => 'El campo domicilio es obligatorio.',
           'dimicilio.regex'=> 'El formato SOLO puede contener letras y guiones y caracteres',
           'telefono.required' => 'El campo telefono es obligatorio.',
           'telefono.alpha_dash'=> 'El formato de  telefono solo puede contener letras, numeros y el maximo es de 8 digitos',
           'placa.required' => 'El campo Placa es obligatorio',
           'placa.regex'=> 'El formato debe de contener letras, numeros y giones',
           'color.required' => 'El campo Color es obligatorio',
           'color.regex'=> 'El formato SOLO puede contener letras',
           'chasis.required' => 'El campo Chasis es obligatorio',
           'chasis.regex'=> 'El formato SOLO puede contener letras, numeros y guiones',
           'moto.required'=> 'El campo Motor es obligatorio',
           'moto.regex'=> 'El formato SOLO puede contener letras, numeros y guiones',
           'capacidad.required' => 'El campo Capacidad es obligatorio',
           'capacidad.regex'=> 'El formato SOLO puede contener letras y numeros',
           'asiento.required' => 'el campo Asiento es obligatorio',
           'asiento.regex'=> 'El formato SOLO puede contener numeros',
           'modelo.required' => 'El campo Modelo es obligatorio',
           'modelo.regex'=> 'El formato modelo debe de ser año y el maximo es de 4 digitos',
           'marca.required' => 'El campo Marca es obligatorio',
           'marca.regex'=> 'El formato debe de contener letras, numeros y giones',
           'tipoVehiculo' => 'El campo Tipo de Vehiculo es obligatorio',
           'tipoVehiculo.regex'=> 'El formato SOLO puede contener letras, numeros y guiones',
           'combustible.required' => 'El campo Combustible es obligatorio',
           'combustible.regex'=> 'El formato SOLO puede contener letras',
           'fechaInicio.required' => 'El campo de fecha de Registro es obligatorio',
           'fechaFin.required' => 'El campo de la fecha de vencimiento es obligatorio'


       ]);
        $propietario = Propietario::findOrFail($id);
        $propietario->ci = strtoupper($request->ci);
        $propietario->nombre = strtoupper($request->nombre);
        $propietario->domicilio = strtoupper($request->domicilio);
        $propietario->telefono = strtoupper($request->telefono);
        $propietario->save();
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->propietario_id = $propietario->id;
        $vehiculo->anio = strtoupper($request->anio);
        $vehiculo->placa = strtoupper($request->placa);
        $vehiculo->color = strtoupper($request->color);
        $vehiculo->chasis = strtoupper($request->chasis);
        $vehiculo->motor = strtoupper($request->motor);
        $vehiculo->capacidad = strtoupper($request->capacidad);
        $vehiculo->asiento = strtoupper($request->asiento);
        $vehiculo->modelo = strtoupper($request->modelo);
        $vehiculo->marca = strtoupper($request->marca);
        $vehiculo->tipoVehiculo = strtoupper($request->tipoVehiculo);
        $vehiculo->combustible = strtoupper($request->combustible);

        $vehiculo->fechaInicio = $request->fechaInicio;
        $vehiculo->fechaFin = $request->fechaFin;




        $vehiculo->organizacion_id = $request->organizacion;

        $vehiculo->save();

        return redirect()->route('vehiculo.index')->with('datos', 'Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        return view('vehiculo.confirm', compact('vehiculo'));
    }
    public function destroy($id)
    {
        //
        abort_if(Gate::denies('vehiculo_destroy'), 403);
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->delete();
        return redirect()->route('vehiculo.index')->with('datos', 'Eliminado Correctamente');
    }
    public function downloadPdf($id)
    {

       $vehiculo = Vehiculo::where("id","=",$id)->firstOrFail();
       $fechaini = Carbon::parse($vehiculo->fechaInicio);
       $f = $fechaini->format('d-m-Y');
       $fechafin = Carbon::parse($vehiculo->fechaFin);
       $ff = $fechafin->format('d-m-Y');
       $dato_qr = $vehiculo->n .'|' . $vehiculo->organizacion->nombre . '|' . 'NOMBRE:'. $vehiculo->propietario->nombre .'|'. 'PLACA:' . $vehiculo->placa.'|'. 'MARCA:' . $vehiculo->marca.'|'. 'RUTA:' . $vehiculo->rutaAutorizada  ;
       $qrcode = QrCode::format('svg')->size(125)->errorCorrection('H')->generate($dato_qr,'../public/qrcodes/qrcode.svg');
        $pdf = PDF::loadView('vehiculo.pdf',compact('vehiculo','qrcode','f','ff'))->setPaper('A5', 'landscape');
        return $pdf->download('permiso.pdf');

    }
    public function reportePDF()
    {
       $vehiculos = Vehiculo::all();
          //Obtenemos la fecha actual
          $mytime = Carbon::now('America/La_Paz');
          $fechActual = $mytime->toDateString();

       $pdf = PDF::loadView('vehiculo.reportePDF', compact('vehiculos', 'fechActual'))->setPaper('A1', 'landscape');
        return $pdf->download('reporte registros.pdf');

    }

    public function indexVigente(Request $request)
    {
        abort_if(Gate::denies('vehiculo_index'), 403);
        $searchText = $request->get('fromDate');
        $searchText2 = $request->get('toDate');
         //Obtenemos la fecha actual
        $mytime = Carbon::now('America/La_Paz');
        $fechActual = $mytime->toDateString();
            //
        if (empty($searchText) && empty($searchtex2)) {
            $vehiculos = Vehiculo::where("fechaFin", '>', $fechActual)->get();
           /*  $vehiculos = Vehiculo::where("fechaFin", '<', $fechActual)->get(); */
            return view('vehiculo.index', compact('vehiculos', 'fechActual', 'searchText', 'searchText2'));
        }else {

            $vehiculos = Vehiculo::whereBetween('fechaInicio', array($searchText, $searchText2))->get();
            return view('vehiculo.index', compact('vehiculos','fechActual','searchText', 'searchText2'));
        }
  }



    public function reportevigentePDF()
    {
        $mytime = Carbon::now('America/La_Paz');
        $fechActual = $mytime->toDateString();
        $vehiculos = Vehiculo::where("fechaFin", '>', $fechActual)->get();
        $pdf = PDF::loadView('vehiculo.reportevigentePDF',compact('vehiculos','fechActual'))->setPaper('A1', 'landscape');
         return $pdf->download('reporte registros.pdf');


    }
    public function indexVencido(Request $request)
    {
        abort_if(Gate::denies('vehiculo_index'), 403);
        $searchText = $request->get('fromDate');
        $searchText2 = $request->get('toDate');
         //Obtenemos la fecha actual
        $mytime = Carbon::now('America/La_Paz');
        $fechActual = $mytime->toDateString();
            //
        if (empty($searchText) && empty($searchtex2)) {
            $vehiculos = Vehiculo::where("fechaFin", '<', $fechActual)->get();
            return view('vehiculo.index', compact('vehiculos', 'fechActual', 'searchText', 'searchText2'));
        }else {

            $vehiculos = Vehiculo::whereBetween('fechaInicio', array($searchText, $searchText2))->get();
            return view('vehiculo.index', compact('vehiculos','fechActual','searchText', 'searchText2'));
        }

    }
    public function reportevencidaPDF()
    {
        // $vehiculos = Vehiculo::all();
        $mytime = Carbon::now('America/La_Paz');
        $fechActual = $mytime->toDateString();
        $vehiculos = Vehiculo::where("fechaFin", '<', $fechActual)->get();
        // dd($vehiculos);
        $pdf = PDF::loadView('vehiculo.reportevencidaPDF',compact('vehiculos','fechActual'))->setPaper('A1', 'landscape');
         return $pdf->download('reporte registros.pdf');


    }




}


