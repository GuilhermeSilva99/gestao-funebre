@extends('layout.site')
@section('titulo','Editar Cemitério')

@section('conteudo')
    <div class="div_conteudo">
        <h3  class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Cadastrar Cemitério</h3>
        <div class="row">
            <form class="w-full max-w-lg" action="{{route('cemiterio.atualizar', $cemiterio->id)}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="put">
                @include('cemiterio.form')

                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Atualizar</button>
            </form>
        </div>

    </div>
@endsection