@extends('layout.site')
@section('titulo', 'QR Code Falecido')

@section('conteudo')
    <div class="div_conteudo">
        <h3
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            QR Code do tumulo</h3>
        <div class="row">
             @if(isset($tumulo->codigo_qr))
                    <div class="input-field">
                        <img width="300" src="{{asset($tumulo->codigo_qr)}}" />
                    </div>
                @endif
                <br>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-nome">
                            Nome
                        </label>
                        <h1>{{isset($tumulo->nome) ? $tumulo->nome : ''}}</h1>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-historia">
                            Historia
                        </label>
                        <h1>{{isset($tumulo->numero) ? $tumulo->numero : ''}}</h1>
                    </div>
                </div>

                <!-- <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-foto">
                Foto
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="file" name="foto" accept="image/*">
            <input id="grid-foto" type="text" name="foto" value="{{isset($defunto->foto) ? $defunto->foto : ''}}">
        </div>
    </div> -->
    </div>

    </div>
@endsection