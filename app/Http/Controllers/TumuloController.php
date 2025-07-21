<?php

namespace App\Http\Controllers;

use App\Models\Cemiterio;
use App\Models\Tumulo;
use Illuminate\Http\Request;

class TumuloController extends Controller
{
    public function cadastrar(){
        $cemiterios = Cemiterio::all();
        return view('tumulo.cadastrar', compact('cemiterios'));
    }

    public function salvar(Request $request) {
        $dados = $request->all();
        $tumulo = array(
            'nome'=> $dados['nome'],
            'numero'=> $dados['numero'],
            'cemiterio_id'=> $dados['cemiterio'],
        );
        Tumulo::create($tumulo);
        return redirect(route('tumulo.listar'));
    }

    public function listar() {
        $tumulos = Tumulo::all();
        $cemiterios= Cemiterio::all();
        return view('tumulo.listar', compact('tumulos','cemiterios'));
    }

    public function editar($id) {
        $tumulo = Tumulo::find($id);
        $cemiterios = Cemiterio::all();
        return view('tumulo.editar', compact('tumulo','cemiterios'));
    }

    public function atualizar(Request $request, $id){
        $tumuloAntigo = Tumulo::find($id);
        $dados = $request->all();
        $tumulo = array(
            'nome'=> $dados['nome'],
            'numero'=> $dados['numero'],
            'cemiterio_id'=> $dados['cemiterio'],
        );
        Tumulo::find($id)->update($tumulo);
        return redirect(route('tumulo.listar'));
    }

    public function deletar($id){
        dd("deletar tumulo");
    }

}
