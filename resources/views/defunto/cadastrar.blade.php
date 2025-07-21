@extends('layout.site')
@section('titulo','Cadastrar Defunto')

@section('conteudo')
    <div class="div_conteudo">
        <h3  class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Cadastrar Defunto</h3>
        <div class="row">
            <form class="w-full max-w-lg" action="{{route('defunto.salvar')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('defunto.form')

                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Salvar</button>
            </form>
        </div>

    </div>
@endsection