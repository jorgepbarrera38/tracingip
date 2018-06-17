<?php

namespace App\Http\Controllers;

use App\Funcionary;
use App\Ubication;
use App\Dependence;
use App\Ip;
use Illuminate\Http\Request;

class IpController extends Controller
{
    public function index(){
        $ips = Ip::orderBy('ip')->get();
        return view('ip.index', compact('ips'));
    }

    public function hola($i, $ips){
        foreach ($ips as $ip) {
            if($ip->ip == $i){
                return true;
            }
        }
        return false;
    }

    public function create(){
        $ips = Ip::orderBy('ip')->get();
        $ipsFree = [];
        for ($i=1; $i <=254 ; $i++) { 
            if(!$this->hola($i, $ips)){ 
                array_push($ipsFree, $i);
            }
        }

        $funcionaries = Funcionary::orderBy('name')->get();
        $ubications = Ubication::orderBy('name')->get();
        $dependences = Dependence::orderBy('name')->get();
        return view('ip.create', compact('ubications', 'dependences', 'funcionaries', 'ipsFree'));
    }

    public function edit(Ip $ip){
        $ips = Ip::orderBy('ip')->get();
        $ipsFree = [];
        for ($i=1; $i <=254 ; $i++) { 
            if(!$this->hola($i, $ips)){ 
                array_push($ipsFree, $i);
            }
        }
        $funcionaries = Funcionary::orderBy('name')->get();
        $ubications = Ubication::orderBy('name')->get();
        $dependences = Dependence::orderBy('name')->get();
        return view('ip.edit', compact('ip', 'funcionaries', 'ubications', 'dependences', 'ipsFree'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'funcionary_id' => 'required|integer|exists:funcionaries,id|unique:ips',
            'ubication_id' => 'required|integer|exists:ubications,id',
            'dependence_id' => 'required|integer|exists:dependences,id',
            'ip' => 'required|integer|max:255|min:1|unique:ips'
        ], [
            'funcionary_id.unique' => 'El Funcionario ya tiene una IP asignada',
        ], [
            'funcionary_id' => 'Funcionario',
            'ubication_id' => 'Ubicación',
            'dependence_id' => 'Dependencia',
        ]);
        Ip::create($data);
        return redirect()->route('ip.index')->with('info', 'IP Registrada correctamente');
    }

    public function update(Request $request, Ip $ip){
        $data = $request->validate([
            'funcionary_id' => 'required|integer|exists:funcionaries,id|unique:ips,funcionary_id,'.$ip->id,
            'ubication_id' => 'required|integer|exists:ubications,id',
            'dependence_id' => 'required|integer|exists:dependences,id',
            'ip' => 'required|integer|max:255|min:1|unique:ips,ip,'.$ip->id
        ], [
            'funcionary_id.unique' => 'El Funcionario ya tiene una IP asignada',
        ], [
            'funcionary_id' => 'Funcionario',
            'ubication_id' => 'Ubicación',
            'dependence_id' => 'Dependencia',
        ]);
        $ip->update($data);
        return redirect()->route('ip.index')->with('info', 'IP actualizada correctamente');
    }

    public function destroy($id){
        Ip::findOrFail($id)->delete();
        return redirect()->route('ip.index')->with('info', 'IP Eliminada correctamente');
    }
}
