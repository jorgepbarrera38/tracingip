<?php

namespace App\Http\Controllers;

use App\Funcionary;
use App\Ip;
use Illuminate\Http\Request;

class FuncionaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionaries = Funcionary::latest()->get();
        return view('funcionaries.index', compact('funcionaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('funcionaries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50|unique:funcionaries'
        ], [], [
            'name' => 'Nombres completos'
        ]);
        Funcionary::create($data);
        return redirect()->route('funcionaries.index')->with('info', 'Funcionario creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Funcionary  $funcionary
     * @return \Illuminate\Http\Response
     */
    public function show(Funcionary $funcionary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Funcionary  $funcionary
     * @return \Illuminate\Http\Response
     */
    public function edit(Funcionary $funcionary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Funcionary  $funcionary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funcionary $funcionary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Funcionary  $funcionary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcionary $funcionary)
    {
        $ips = Ip::whereHas('funcionary', function($query)use($funcionary){
            $query->where('funcionary_id', $funcionary->id);
        })->count();

        if($ips){
            return redirect()->route('funcionaries.index')->with('error', 'No se pudo eliminar el funcionario, ya que tiene asignada una IP');
        }else{
            $funcionary->delete();
            return redirect()->route('funcionaries.index')->with('info', 'Funcionario eliminado correctamente');
        }
    
    }
}
