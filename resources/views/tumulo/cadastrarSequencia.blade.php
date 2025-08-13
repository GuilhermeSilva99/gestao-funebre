@extends('layout.site')
@section('titulo', 'Cadastrar Túmulo')

@section('conteudo')
    <div class="div_conteudo">
        <div class="flex justify-between items-center">
            <div>
                <h3
                    class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                    Cadastrar Túmulo</h3>
            </div>
            <div>
                @if (session('success'))
                    <div id="alert-success" class="bg-green-100 text-green-800 p-3 rounded-lg mb-4 shadow">
                        {{ session('success') }}
                    </div>

                    <script>
                        setTimeout(() => {
                            let alert = document.getElementById('alert-success');
                            if (alert) {
                                alert.style.transition = 'opacity 0.5s ease';
                                alert.style.opacity = '0';
                                setTimeout(() => alert.remove(), 500); // remove do DOM
                            }
                        }, 2000); // 2 segundos
                    </script>
                @endif
            </div>

        </div>
        <div class="row">
            <form class="w-full max-w-lg" action="{{route('tumulo.salvarSequencia')}}" method="post">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-nome">
                            Nome
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-nome" type="text" name="nome" value="{{isset($tumulo->nome) ? $tumulo->nome : ''}}">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-numero">
                            Número
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-numero" type="text" name="numero"
                            value="{{isset($tumulo->numero) ? $tumulo->numero : ''}}">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-cemiterio">
                            Cemitério
                        </label>
                        <select name="cemiterio"
                            class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option value={{ $cemiterio->id }}>{{$cemiterio->nome}}</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Salvar e cadastrar
                    outro</button>
            </form>
        </div>

    </div>
@endsection