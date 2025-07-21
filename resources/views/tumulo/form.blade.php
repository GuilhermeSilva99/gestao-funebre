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
            id="grid-numero" type="text" name="numero" value="{{isset($tumulo->numero) ? $tumulo->numero : ''}}">
    </div>
</div>
<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-cemiterio">
            Cemitério
        </label>
        <select name="cemiterio" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
            
            @if(isset($tumulo->cemiterio_id))
                @foreach ($cemiterios as $cemiterio)
                    @if ($cemiterio->id == $tumulo->cemiterio_id)
                        <option selected="" value={{ $cemiterio->id }}>{{$cemiterio->nome}}</option>
                    @else
                        <option value={{ $cemiterio->id }}>{{$cemiterio->nome}}</option>
                    @endif
                @endforeach
            @else
                <option  selected="">Selecione um</option>
                @foreach ($cemiterios as $cemiterio)
                    <option value={{ $cemiterio->id }}>{{$cemiterio->nome}}</option>
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