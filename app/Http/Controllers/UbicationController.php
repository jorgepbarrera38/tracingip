<?php

namespace App\Http\Controllers;

use App\Ubication;
use App\Dependence;
use Illuminate\Http\Request;

class UbicationController extends Controller
{
    public function index(){
        $ubications = Ubication::latest()->get();
        return view('ubications.index', compact('ubications'));
    }

    public function create(){
        return view('ubications.create', compact('ubications', 'dependences'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:50|unique:ubications,name'
        ], [], [
            'name' => 'Nombre'
        ]);
        
        $ubication = (new Ubication)->fill($request->all());
        $ubication->slug = str_slug($request->input('name'));
        $ubication->save();
        return redirect()->route('ubications.index')->with('info', 'Ubicación creada correctamente');
    }

    public function destroy($id){
        Ubication::findOrFail($id)->delete();
        return redirect()->route('ubications.index')->with('info', 'Ubicación eliminada correctamente');
    }
}
