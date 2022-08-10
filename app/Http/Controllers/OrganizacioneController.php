<?php

namespace App\Http\Controllers;
use App\Models\Organizacione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OrganizacioneController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        abort_if(Gate::denies('organizacione_index'), 403);
        $organizaciones = Organizacione::all();
      /*   $organizaciones = Organizacione::orderBy('nombre', 'asc')->get(); */
        return view('organizacion.index', compact('organizaciones'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        abort_if(Gate::denies('organizacione_create'), 403);
        return view('organizacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    $request->validate([
            'nombre' =>'required|unique:organizaciones|regex:([a-zA-ZÀñÑáéíóúÁÉÍÓÚ-ÿ\s\_\-\"\,\.\(\)]+)',
        ],
        [
            'nombre.required' => 'El campo es obligatorio.',
            'nombre.regex' => 'El formato del texto debe ser"letras"',
            'nombre.unique'=> 'El nombre la organizacion ya existe',

        ]);
        $organizacion = new Organizacione();
        $organizacion->nombre = strtoupper($request->nombre);
        $organizacion->save();
        return redirect()->route('organizacion.index')->with('datos','Registrado Correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        abort_if(Gate::denies('organizacione_edit'), 403);
        $organizacion = Organizacione::findOrFail($id);
        return view('organizacion.edit', compact('organizacion'));

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
            'nombre' =>'required|unique:organizaciones|regex:/^[a-zA-ZÀñÑáéíóúÁÉÍÓÚ-ÿ\s\_\-\"\,\.\(\)]*[0-9]{1,255}$/',
        ],
        [
            'nombre.required' => 'El campo es obligatorio.',
            'nombre.regex' => 'El formato del texto debe ser"letras"',
            'nombre.unique'=> 'El nombre la organizacion ya existe',

        ]);
        $organizacion = new Organizacione();
        $organizacion->nombre = strtoupper($request->nombre);
        $organizacion->save();
        return redirect()->route('organizacion.index')->with('datos','Registrado Correctamente');


        $organizacion = Organizacione::findOrFail($id);
        $organizacion->nombre = strtoupper($request->nombre);
        $organizacion->save();

        return redirect()->route('organizacion.index')->with('datos','Actualizado Correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $organizacion = Organizacione::findOrFail($id);
        return view('organizacion.confirm', compact('organizacion'));
    }
    public function destroy($id)
    {
        //
        abort_if(Gate::denies('organizacione_destroy'), 403);

        $organizacion = Organizacione::findOrFail($id);
        $organizacion->delete();
        return redirect()->route('organizacion.index')->with('datos','Eliminado Correctamente');

    }
}
