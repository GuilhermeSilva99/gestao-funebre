<?php

namespace App\Http\Controllers;

use App\Models\Cemiterio;
use App\Models\Midia;
use App\Models\Tumulo;
use App\Models\Defunto;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DefuntoController extends Controller
{

    function gerarQrCode($id)
    {
        $defunto = Defunto::find($id);
        $nome_qr = $defunto->nome . '_' . $defunto->cpf . '_qrcode.png';
        $qrCode = QrCode::size(300)->generate(route('defunto.visualizar', $id));
        $path = QrCode::format('png')->size(300)->generate(route('defunto.visualizar', $id), public_path('qrcodes/' . $nome_qr));


        $nome_codigo_qr = 'qrcodes/' . $nome_qr;
        Defunto::find($id)->update(['codigo_qr' => $nome_codigo_qr]);

    }

    public function cadastrar()
    {
        $tumulos = Tumulo::all();
        return view('defunto.cadastrar', compact('tumulos'));
    }

    public function cadastrarSequencia($id)
    {
        $tumulo = Tumulo::find($id);
        return view('defunto.cadastrarSequencia', compact('tumulo'));
    }

    public function salvar(Request $request)
    {

        $validatedData = $request->validate([
            'nome' => 'required|string|regex:/^[\pL\s]+$/u|max:255',
            'cpf' => 'required|digits:11|unique:defuntos,cpf',
            'tumulo' => 'required',
            'historia' => 'required|min:10',
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.regex' => 'O campo nome deve conter apenas letras.',
            'cpf.required' => 'O campo e-mail é obrigatório.',
            'cpf.digits' => 'O CPF deve ter exatamente 11 números.',
            'cpf.unique' => 'Este CPF já foi cadastrado.',
            'tumulo.required' => 'Selecione uma opção.',
            'historia.required' => 'O campo historia é obrigatório.',
            'historia.min' => 'O campo história deve ter no mínimo :min caracteres.',
        ]);

        $dados = $request->all();

        if (isset($request->file)) {
            $extension = $request->file('foto')->extension();
            $nome_foto = 'nome_' . $dados['nome'] . '_cpf_' . $dados['cpf'] . '.' . $extension;

            $path_foto = $request->file('foto')->storeAs('defuntos', $nome_foto, 'public');
        }
        $defunto = array(
            'nome' => $dados['nome'],
            'cpf' => $dados['cpf'],
            'historia' => $dados['historia'],
            'tumulo_id' => $dados['tumulo']
        );


        $defuntoCriado = Defunto::create($defunto);

        if (isset($request->file)) {
            $midia = array(
                'midia' => $path_foto,
                'defunto_id' => $defuntoCriado->id
            );

            Midia::create($midia);
        }
        return redirect(route('defunto.listar'));
    }

    public function salvarSequencia(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|regex:/^[\pL\s]+$/u|max:255',
            'cpf' => 'required|digits:11|unique:defuntos,cpf',
            'tumulo' => 'required',
            'historia' => 'required|min:10',
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.regex' => 'O campo nome deve conter apenas letras.',
            'cpf.required' => 'O campo e-mail é obrigatório.',
            'cpf.digits' => 'O CPF deve ter exatamente 11 números.',
            'cpf.unique' => 'Este CPF já foi cadastrado.',
            'tumulo.required' => 'Selecione uma opção.',
            'historia.required' => 'O campo historia é obrigatório.',
            'historia.min' => 'O campo história deve ter no mínimo :min caracteres.',
        ]);

        $dados = $request->all();

        if (isset($request->file)) {
            $extension = $request->file('foto')->extension();
            $nome_foto = 'nome_' . $dados['nome'] . '_cpf_' . $dados['cpf'] . '.' . $extension;

            $path_foto = $request->file('foto')->storeAs('defuntos', $nome_foto, 'public');
        }
        $defunto = array(
            'nome' => $dados['nome'],
            'cpf' => $dados['cpf'],
            'historia' => $dados['historia'],
            'tumulo_id' => $dados['tumulo']
        );


        $defuntoCriado = Defunto::create($defunto);

        if (isset($request->file)) {
            $midia = array(
                'midia' => $path_foto,
                'defunto_id' => $defuntoCriado->id
            );

            Midia::create($midia);
        }
        return redirect()->route('defunto.cadastrarSequencia', $dados['tumulo'])->with('success', 'Cadastrado com sucesso!');
    }

    public function listar()
    {
        $cemiterios = Cemiterio::all();
        $tumulos = Tumulo::all();
        $defuntos = Defunto::orderBy('id', 'desc')->paginate(10);

        // $tumulos = Tumulo::orderBy('id', 'desc')->paginate(10);
        return view('defunto.listar', compact('cemiterios', 'tumulos', 'defuntos'));
    }

    public function editar($id)
    {
        dd("Editar defunto");
    }

    public function atualizar(Request $request, $id)
    {
        dd("Atualizar defunto");
    }

    public function visualizar($id)
    {
        $defunto = Defunto::find($id);
        $tumulos = Tumulo::all();

        return view('defunto.visualizar', compact('defunto', 'tumulos'));
    }

    public function qrcode($id)
    {
        $defunto = Defunto::find($id);
        return view('defunto.qrcode', compact('defunto'));
    }

    public function deletar($id)
    {
        dd("deletar defunto");
    }

}
