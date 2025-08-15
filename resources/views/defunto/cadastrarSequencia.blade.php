@extends('layout.site')
@section('titulo', 'Cadastrar Defunto')

@section('conteudo')
    <div class="div_conteudo">
        <div class="flex justify-between items-center">
            <div>
                <h3
                    class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                    Cadastrar Defunto</h3>
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
            <form class="w-full max-w-lg" action="{{route('defunto.salvarSequencia')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-nome">
                            Nome
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                            id="grid-nome" type="text" name="nome" value="{{isset($defunto->nome) ? $defunto->nome : old('nome')}}" required>
                        @error('nome')
                            <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-cpf">
                            Cpf
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-cpf" type="text" name="cpf" placeholder="000.000.000-00" value="{{isset($defunto->cpf) ? $defunto->cpf : old('cpf')}}" required>
                        @error('cpf')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-tumulo">
                            Túmulo
                        </label>
                        <select name="tumulo"
                            class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option value={{ $tumulo->id }}>{{$tumulo->nome}}</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-historia">
                            Historia
                        </label>
                        <textarea
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-historia" type="text"
                            name="historia" required> {{isset($defunto->historia) ? $defunto->historia : old('historia')}} </textarea>
                        @error('historia')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
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

                <div class="flex flex-wrap -mx-3 mb-6">
                    <label class="block">
                        <span class="sr-only">Escolha a foto</span>
                        <input type="file" name="foto" class="block w-full text-sm text-gray-500
            file:me-4 file:py-2 file:px-4
            file:rounded-lg file:border-0
            file:text-sm file:font-semibold
            file:bg-blue-600 file:text-white
            hover:file:bg-blue-700
            file:disabled:opacity-50 file:disabled:pointer-events-none
            dark:text-neutral-500
            dark:file:bg-blue-500
            dark:hover:file:bg-blue-400
          ">
                    </label>
                </div>
                @if(isset($defunto->foto))
                    <div class="input-field">
                        <img width="150" src="{{asset($defunto->foto)}}" />
                    </div>
                @endif

                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Salvar e cadastrar outro</button>
            </form>
        </div>

    </div>

    <script>
        const cpfInput = document.getElementById('grid-cpf');

        cpfInput.addEventListener('input', function () {
            let value = this.value.replace(/\D/g, ''); // remove tudo que não é número
            if (value.length > 11) value = value.slice(0, 11); // limita a 11 dígitos

            // Aplica a máscara corretamente
            value = value.replace(/^(\d{3})(\d)/, '$1.$2');
            value = value.replace(/^(\d{3})\.(\d{3})(\d)/, '$1.$2.$3');
            value = value.replace(/^(\d{3})\.(\d{3})\.(\d{3})(\d{1,2})$/, '$1.$2.$3-$4');

            this.value = value;
        });
    </script>
@endsection