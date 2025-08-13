<?php

namespace App\Http\Controllers;

use App\Models\Cemiterio;
use App\Models\Defunto;
use App\Models\Midia;
use App\Models\Tumulo;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


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
            'codigo_qr'=>"",
            'cemiterio_id'=> $dados['cemiterio'],
        );
        $tumuloCriado = Tumulo::create($tumulo);
        $this->gerarQrCode($tumuloCriado->id);
        return redirect(route('tumulo.listar'));
    }

    public function visualizar($id){
        $tumulo = Tumulo::find($id);
        $defuntos = Defunto::where('tumulo_id', $tumulo->id)->get();
        $defuntosIds = Defunto::where('tumulo_id', $tumulo->id)->pluck('id');

        $midias = Midia::whereIn('defunto_id', $defuntosIds)->get();

        return view('tumulo.visualizar', compact('tumulo','defuntos', 'midias'));
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
    function gerarQrCode($id){
        $tumulo = Tumulo::find($id);
        $nome_qr = $tumulo->nome.'_'.$tumulo->numero.'_qrcode.png';
        $qrCode = QrCode::size(300)->generate(route('tumulo.visualizar', $id));
        $path = QrCode::format('png')->size(300)->generate(route('tumulo.visualizar', $id), public_path('storage/qrcodes/'.$nome_qr));

        
        $nome_codigo_qr = 'storage/qrcodes/'.$nome_qr;
        Tumulo::find($id)->update(['codigo_qr'=>$nome_codigo_qr]);
        
    }

    public function qrcode($id) {
        $tumulo = Tumulo::find($id);
        return view('tumulo.qrcode', compact('tumulo'));
    }
}
