<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-nome">
            Nome
        </label>
        <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
            id="grid-nome" type="text" name="nome" value="{{isset($defunto->nome) ? $defunto->nome : ''}}">
    </div>
</div>
<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-cpf">
            Cpf
        </label>
        <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="grid-cpf" type="text" name="cpf" value="{{isset($defunto->cpf) ? $defunto->cpf : ''}}">
    </div>
</div>

<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-tumulo">
            Túmulo
        </label>
        <select name="tumulo" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
            
            @if(isset($defunto->tumulo_id))
                @foreach ($tumulos as $tumulo)
                    @if ($tumulo->id == $defunto->tumulo_id)
                        <option selected="" value={{ $defunto->id }}>{{$defunto->nome}}</option>
                    @else
                        <option value={{ $defunto->id }}>{{$defunto->nome}}</option>
                    @endif
                @endforeach
            @else
                <option  selected="">Selecione um</option>
                @foreach ($tumulos as $tumulo)
                    <option value={{ $tumulo->id }}>{{$tumulo->nome}}</option>
                @endforeach
            @endif
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
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-historia">
            Historia
        </label>
        <textarea
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="grid-historia" type="text" name="historia" > {{isset($defunto->historia) ? $defunto->historia : ''}} </textarea>
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