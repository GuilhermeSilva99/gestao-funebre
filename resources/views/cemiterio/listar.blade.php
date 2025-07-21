
@extends('layout.site')
@section('titulo','Cemitérios')

@section('conteudo')
    <div class="container">
        <div class="row">
            <div>
                <h3 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white" >Lista de Cemitérios </h3>
            </div>
            <div class="flex justify-end border-r-[30px] border-r-transparent">
                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href={{route('cemiterio.cadastrar')}}>Adicionar</a>
            </div>
        </div>
        <br>

        <div class="row">
            <table class="min-w-full table-auto border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2 text-left">Nome</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Endereço</th>
                        <th></th>
                    </tr>

                </thead>
                <tbody>
                    @foreach($cemiterios as $cemiterio)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $cemiterio->nome }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $cemiterio->endereco }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <a class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600" href={{ route('cemiterio.editar', $cemiterio->id) }}>Editar</a>
                                <!-- <a class="bg-red-500 text-white px-3 py-1 rounded hover:bg-blue-600" href={{ route('cemiterio.deletar', $cemiterio->id) }}>Deletar</a> -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
