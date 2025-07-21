<?php

namespace App\Http\Controllers;

use App\Models\Cemiterio;
use App\Models\Tumulo;
use App\Models\Defunto;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DefuntoController extends Controller
{

    function gerarQrCode($id){
        $defunto = Defunto::find($id);
        $nome_qr = $defunto->nome.'_'.$defunto->cpf.'_qrcode.png';
        $qrCode = QrCode::size(300)->generate(route('defunto.visualizar', $id));
        $path = QrCode::format('png')->size(300)->generate(route('defunto.visualizar', $id), public_path('qrcodes/'.$nome_qr));

        
        $nome_codigo_qr = 'qrcodes/'.$nome_qr;
        Defunto::find($id)->update(['codigo_qr'=>$nome_codigo_qr]);
        
    }

    public function cadastrar(){
        $tumulos = Tumulo::all();
        return view('defunto.cadastrar', compact('tumulos'));
    }

    public function salvar(Request $request) {
        $dados = $request->all();

        $extension = $request->file('foto')->extension();
        $nome_foto = 'nome_' . $dados['nome'] . '_cpf_' . $dados['cpf'] . '.' . $extension;

        $path_foto = $request->file('foto')->storeAs('defuntos', $nome_foto, 'public');
            $defunto = array(
                'nome'=> $dados['nome'],
                'cpf'=> $dados['cpf'],
                'historia'=> $dados['historia'],
                'foto'=> $path_foto,
                'codigo_qr'=>"",
                'tumulo_id'=> $dados['tumulo']
            );
            
        $defuntoCriado = Defunto::create($defunto);
        $this->gerarQrCode($defuntoCriado->id);
        return redirect(route('defunto.listar'));
    }

    public function listar() {
        $cemiterios = Cemiterio::all();
        $tumulos= Tumulo::all();
        $defuntos = Defunto::all();

        return view('defunto.listar', compact('cemiterios','tumulos','defuntos'));
    }

    public function editar($id) {
        dd("Editar defunto");
    }

    public function atualizar(Request $request, $id){
        dd("Atualizar defunto");
    }

    public function visualizar($id){
        $defunto = Defunto::find($id);
                $tumulos= Tumulo::all();

        return view('defunto.visualizar', compact('defunto','tumulos'));
    }

    public function qrcode($id){
        $defunto = Defunto::find($id);
        return view('defunto.qrcode', compact('defunto'));
    }

    public function deletar($id){
        dd("deletar defunto");
    }

}
