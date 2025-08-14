<?php

namespace App\Http\Controllers;

use App\Models\Cemiterio;
use App\Models\Defunto;
use App\Models\Midia;
use App\Models\Tumulo;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class TumuloController extends Controller
{
    public function cadastrar(){
        $cemiterios = Cemiterio::all();
        return view('tumulo.cadastrar', compact('cemiterios'));
    }

    public function cadastrarSequencia($id){
        $cemiterio = Cemiterio::find($id);
        return view('tumulo.cadastrarSequencia', compact('cemiterio'));
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
        $this->gerarQrCodeComTitulo($tumuloCriado->id);
        return redirect(route('tumulo.listar'));
    }

    public function salvarSequencia(Request $request){
        $dados = $request->all();
        $tumulo = array(
            'nome'=> $dados['nome'],
            'numero'=> $dados['numero'],
            'codigo_qr'=>"",
            'cemiterio_id'=> $dados['cemiterio'],
        );
        $tumuloCriado = Tumulo::create($tumulo);
        $this->gerarQrCodeComTitulo($tumuloCriado->id);
        $cemiterio = Cemiterio::find($dados['cemiterio']);
        return redirect()->route('tumulo.cadastrarSequencia', $cemiterio->id)->with('success', 'Cadastrado com sucesso!');
    }

    public function visualizar($id){
        $tumulo = Tumulo::find($id);
        $defuntos = Defunto::where('tumulo_id', $tumulo->id)->get();
        $defuntosIds = Defunto::where('tumulo_id', $tumulo->id)->pluck('id');

        $midias = Midia::whereIn('defunto_id', $defuntosIds)->get();

        return view('tumulo.visualizar', compact('tumulo','defuntos', 'midias'));
    }

    public function listar() {
        // $tumulos = Tumulo::all();
        $cemiterios= Cemiterio::all();
        // return view('tumulo.listar', compact('tumulos','cemiterios'));

        $tumulos = Tumulo::orderBy('id', 'desc')->paginate(10);
        return view('tumulo.listar', compact('tumulos', 'cemiterios'));
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

    public function gerarQrCodeComTitulo($id)
    {
        $tumulo = Tumulo::find($id);
        $nome_qr = $tumulo->nome.'_'.$tumulo->numero.'_qrcode.png';
        // 1. Gera o QR Code em PNG
        $qrPath = public_path('storage/qrcodes/' . $nome_qr);
        QrCode::format('png')
            ->size(300)
            ->generate(route('tumulo.visualizar', $id), $qrPath);

        // 2. Abre a imagem do QR Code
        $qrImage = imagecreatefrompng($qrPath);
        $qrWidth = imagesx($qrImage);
        $qrHeight = imagesy($qrImage);

        // 3. Configuração da área extra para o título
        $titleHeight = 40; // Altura da faixa
        $newHeight = $qrHeight + $titleHeight;

        // 4. Criar nova imagem com fundo branco
        $newImage = imagecreatetruecolor($qrWidth, $newHeight);
        $white = imagecolorallocate($newImage, 255, 255, 255);
        imagefill($newImage, 0, 0, $white);

        // 5. Colar o QR Code na nova imagem (começando de y=0)
        imagecopy($newImage, $qrImage, 0, 0, 0, 0, $qrWidth, $qrHeight);

        // 6. Escrever o título no espaço extra
        $black = imagecolorallocate($newImage, 0, 0, 0);
        $text = $tumulo->nome;
        $fontSize = 5; // Fonte interna do GD
        $textWidth = imagefontwidth($fontSize) * strlen($text);
        $x = ($qrWidth - $textWidth) / 2;
        $y = $qrHeight + ($titleHeight - imagefontheight($fontSize)) / 2;
        imagestring($newImage, $fontSize, $x, $y, $text, $black);

        $qrTituloPath = 'storage/qrcodes/'.$tumulo->nome.'_'.$tumulo->numero.'_titulo_qrcode.png';
        // 7. Salvar a nova imagem
        imagepng($newImage, $qrTituloPath);

        // Liberar memória
        imagedestroy($qrImage);
        imagedestroy($newImage);

        Tumulo::find($id)->update(['codigo_qr'=>$qrTituloPath]);
        // return response()->download(public_path('qrcode_titulo.png'));
    }

    public function qrcode($id) {
        $tumulo = Tumulo::find($id);
        return view('tumulo.qrcode', compact('tumulo'));
    }
    
    public function listarQrCodes() {
        // $tumulos = Tumulo::all();
        // return view('tumulo.listarQrCodes', compact('tumulos'));

        $tumulos = Tumulo::orderBy('id', 'desc')->paginate(10);
        return view('tumulo.listarQrCodes', compact('tumulos'));
    }

    public function baixarQrCode($id){
        $tumulo = Tumulo::find($id);
        return response()->download(public_path($tumulo->codigo_qr), $tumulo->nome.'.jpg');
    }

    public function baixarTodosQrCode(){
        // Lista de imagens
        $imagens = [];

        $tumulos = Tumulo::all();
        foreach ($tumulos as $tumulo) {
            $imagens[] = $tumulo->codigo_qr;
        }

        // Nome do arquivo zip temporário
        $zipFileName = 'QrCodes.zip';
        $zipPath = storage_path('app/public/' . $zipFileName);

        // Cria o arquivo zip
        $zip = new ZipArchive;
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($imagens as $imagem) {
                if (file_exists($imagem)) {
                    $zip->addFile($imagem, basename($imagem));
                }
            }
            $zip->close();
        }

        // Retorna o zip para download e deleta depois
        return response()->download($zipPath)->deleteFileAfterSend(true);
    }
}
