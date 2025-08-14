
@extends('layout.site')
@section('titulo','Defuntos')

@section('conteudo')
    <div class="container">
        <div class="row">
            <div>
                <h3 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white" >Lista de Defuntos </h3>
            </div>
            <div class="flex justify-end border-r-[30px] border-r-transparent">
                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href={{route('defunto.cadastrar')}}>Adicionar</a>
            </div>
        </div>
        <br>

        <div class="row">
            <table class="min-w-full table-auto border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2 text-left">Nome</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">cpf</th>
                        <th></th>
                    </tr>

                </thead>
                <tbody>
                    @foreach($defuntos as $defunto)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $defunto->nome }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $defunto->cpf }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <a class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600" href={{ route('defunto.editar', $defunto->id) }}>Editar</a>
                                <a class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600" href={{ route('defunto.visualizar', $defunto->id) }}>Visualizar</a>
                                <!-- <a class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600" href={{ route('defunto.qrcode', $defunto->id) }}>QR Code</a> -->
                                <!-- <a class="bg-red-500 text-white px-3 py-1 rounded hover:bg-blue-600" href={{ route('defunto.deletar', $defunto->id) }}>Deletar</a> -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $defuntos->links() }}
        </div>
    </div>
@endsection
