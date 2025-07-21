<?php

namespace App\Http\Controllers;

use App\Models\Cemiterio;
use Illuminate\Http\Request;

class CemiterioController extends Controller
{
     public function cadastrar(){
        return view('cemiterio.cadastrar');
    }

    public function salvar(Request $request) {
        $dados = $request->all();
        $cemiterio=array(
            'nome'=>$dados['nome'],
            'endereco'=>$dados['endereco']
        );
        Cemiterio::create($cemiterio);
        return redirect(route('cemiterio.listar'));
    }

    public function listar() {
        $cemiterios = Cemiterio::all();
        return view('cemiterio.listar', compact('cemiterios'));
    }

    public function editar($id) {

        $cemiterio=Cemiterio::find($id);
        
        return view('cemiterio.editar', compact('cemiterio'));
    }

    public function atualizar(Request $request, $id){
        $cemiterioAntigo = Cemiterio::find($id);
        $dados = $request->all();
        $cemiterio=array(
            'nome'=>$dados['nome'],
            'endereco'=>$dados['endereco']
        );
        Cemiterio::find($id)->update($cemiterio);
        return redirect(route('cemiterio.listar'));
    }

    public function deletar($id){
        Cemiterio::find($id)->delete();
        return redirect(route('cemiterio.listar'));
    }
}
