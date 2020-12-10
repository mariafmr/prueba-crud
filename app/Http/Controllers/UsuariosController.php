<?php

namespace App\Http\Controllers;

use App\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //mostrar datos
        $datos['usuarios']=Usuarios::paginate(6);
       
        return view('usuarios.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //pruebas
        //$datosUsuarios=request()->all();
        //insertar bd
        $datosUsuarios=request()->except('_token');
            
        //imagenes
        if ($request->hasFile('Foto')){
            $datosUsuarios['Foto']=$request->file('Foto')->store('uploads', 'public');
        }

       Usuarios::insert($datosUsuarios);
        //return response()->json($datosUsuarios);
        return redirect('usuarios')->with('Mensaje','usuario agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(Usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usuario= Usuarios::findOrFail($id);
        return view('usuarios.edit',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosUsuarios=request()->except(['_token','_method']);
             //imagenes
             if ($request->hasFile('Foto')){
                $usuario= Usuarios::findOrFail($id);

                Storage::delete('public/'.$usuario->Foto);

                $datosUsuarios['Foto']=$request->file('Foto')->store('uploads', 'public');
            }
        Usuarios::where('id','=',$id)->update($datosUsuarios);
         
        $usuario= Usuarios::findOrFail($id);
        return view('usuarios.edit',compact('usuario'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //eliminar por id
        $usuario= Usuarios::findOrFail($id);

       if( Storage::delete('public/'.$usuario->Foto)){
        Usuarios::destroy($id);
        }
   
        return redirect('usuarios');

    }
}
