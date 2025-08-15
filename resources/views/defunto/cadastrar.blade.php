@extends('layout.site')
@section('titulo', 'Cadastrar Defunto')

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