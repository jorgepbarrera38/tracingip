<?php

namespace App\Http\Controllers;

use App\Dependence;
use Illuminate\Http\Request;

class DependenceController extends Controller
{
    public function index(){
        $dependences = Dependence::latest()->get();
        return view('dependences.index', compact('dependences'));
    }

    public function create(){
        return view('dependences.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:50|unique:dependences'
        ], [], [
            'name' => 'Nombre'
        ]);

        $name = $request->input('name');

        $dependence = (new Dependence)->fill($data);
        $dependence->slug = str_slug($name);
        $dependence->save();

        return redirect()->route('dependences.index')->with('info', 'Dependencia creada correctamente');
    }

    public function destroy($id){
        Dependence::findOrFail($id)->delete();
        return redirect()->route('dependences.index')->with('info', 'Dependencia eliminada correctamente');
    }
}
