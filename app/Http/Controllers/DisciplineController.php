<?php

namespace App\Http\Controllers;

use App\Discipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisciplineController extends Controller
{

    #Funcao que retorna a view de formulario de adicao de materia
    public function viewDiscipline(){
        $dis = DB::table('disciplines')
            ->select('nome')
            ->get();

        return view('discipline', [
            'materias' => $dis
        ]);
    }

    #Funcao que guarda uma nova materia/disciplina no banco de dados
    public function store(Request $request){
        if($request){

            if(DB::table('disciplines')->where('nome', '=', $request->nome)->first()){
                return redirect()->route('disciplines')->withInput()->withErrors(['Materia ja existe!']);
            }

            $dis = new Discipline();
            $dis->nome = $request->nome;
            $dis->save();

            $msg = "on";
            return redirect()->route('disciplines')->withInput()->withErrors([$msg]);
        }
        else{
            $msg = "off";
            return redirect()->route('disciplines')->withInput()->withErrors([$msg]);
        }
    }
}
