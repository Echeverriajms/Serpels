<?php

namespace App\Http\Controllers;

use App\serpel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SerpelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['serpels']=serpel::paginate(5);

        return view('serpels.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('serpels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosserpel=request()->all();


        $campos=[
            'Nombre' => 'required|string|max:50',
            'Genero' => 'required|string|max:50',
            'Año' => 'required|string|max:4',
            'Sinopsis' => 'required|string|max:250',
            'Foto' => 'required|max:10000|mimes:jpeg,png,jpg'
        ];

        $Mensaje=["required"=> 'El campo :Attribute es requerido',
                    "max"=> 'El campo :Attribute no puede sobrepasar los 250 caracteres',
                    "mimes"=> 'El campo :Attribute solo puede aceptar formatos jpg, jpeg y png'
            ];

        $this->validate($request, $campos, $Mensaje);

        $datosserpel=request()->except('_token');
        
        if($request->hasFile('Foto')){

        $datosserpel['Foto']=$request->file('Foto')->store('uploads','public');

        }

        serpel::insert($datosserpel);

       // return response ()->json($datosserpel);

       return redirect ('serpels')->with('Mensaje','Registro agregado con éxito');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\serpel  $serpel
     * @return \Illuminate\Http\Response
     */
    public function show(serpel $serpel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\serpel  $serpel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serpel= serpel::findOrFail($id);

        return view ('serpels.edit', compact('serpel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\serpel  $serpel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)

    {
        $campos=[
            'Nombre' => 'required|string|max:50',
            'Genero' => 'required|string|max:50',
            'Año' => 'required|string|max:4',
            'Sinopsis' => 'required|string|max:250'
            
        ];

        
        if($request->hasFile('Foto')){

        $campos+=['Foto' => 'required|max:10000|mimes:jpeg,png,jpg'];

        }

        $Mensaje=["required"=> 'El campo :Attribute es requerido',
                    "max"=> 'El campo :Attribute no puede sobrepasar los 250 caracteres',
                    "mimes"=> 'El campo :Attribute solo puede aceptar formatos jpg, jpeg y png'
                ];

        $this->validate($request, $campos, $Mensaje);


        $datosserpel=request()->except(['_token','_method']);

        $serpel= serpel::findOrFail($id);

        Storage::delete(['public/'.$serpel->Foto]);

        if($request->hasFile('Foto')){

        $datosserpel['Foto']=$request->file('Foto')->store('uploads','public');
    
        }


        Serpel::where('id','=',$id)->update($datosserpel);

       // $serpel= serpel::findOrFail($id);

       // return view ('serpels.edit', compact('serpel'));

        return redirect('serpels')->with('Mensaje','Registro modificado con éxito');
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\serpel  $serpel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serpel= serpel::findOrFail($id);

        if (Storage::delete(['public/'.$serpel->Foto])){
        
        Serpel::destroy($id);

        }

        return redirect ('serpels')->with('Mensaje','Registro eliminado correctamente');
    }
}
