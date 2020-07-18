<?php

namespace App\Http\Controllers;

use App\Discipline;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    #Funcao que mostra as revisoes atuais - as feitas e as pendentes
    public function show(){
        $revisoes = DB::table('review')
            ->join('disciplines', 'review.materia', '=', 'disciplines.id')
            ->select(
                'disciplines.nome as materia',
                'review.assunto',
                'review.anotacoes',
                'review.datarevisao as revisao',
                'review.dataconclusao as conclusao',
                'review.status'
            )
            ->get();

        return view('welcome', [
            'revisoes' => $revisoes
        ]);
    }

    #Funcao que agenda uma nova revisao
    public function viewSchedule(){
        $materias = Discipline::all();
        return view('schedule', ['materias' => $materias]);
    }

    #Funcao que insere na tabela de revisao
    public function store(Request $request){
        if($request){
            $review = new Review();
            $review->materia = $request->materia;
            $review->assunto = $request->assunto;
            $review->anotacoes = $request->anotacao;
            $review->datarevisao = $request->datarevisao;
            $review->dataconclusao = $request->datarevisao;
            $review->status = 'pendente';
            $review->save();

            $msg = "on";
            return redirect()->route('review.schedule')->withInput()->withErrors([$msg]);
        }
        else{
            $msg = "Erro de requisicao!";
            return redirect()->route('review.schedule')->withInput()->withErrors([$msg]);
        }
    }
}
