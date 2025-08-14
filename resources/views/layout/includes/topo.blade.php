<!DOCTYPE html>
<html>

<head>
    <title> @yield('titulo') </title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <div>
        <aside class="w-64 bg-gray-800 text-white h-screen p-4 space-y-2">
            <h2 class="text-xl font-bold mb-4">Menu</h2>

            <div class="relative">
                <button
                    class="flex justify-between items-center w-full px-4 py-2 hover:bg-gray-700 rounded dropdown-toggle"
                    data-target="dropdown0">
                    Cemitérios
                    <svg class="w-4 h-4 ml-2 transition-transform transform rotate-0" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div id="dropdown0" class="hidden mt-1 ml-4 space-y-1">
                    <a href={{route('cemiterio.cadastrar')}} class="block px-4 py-2 text-sm hover:bg-gray-700 rounded">Cadastrar</a>
                    <a href={{ route('cemiterio.listar') }} class="block px-4 py-2 text-sm hover:bg-gray-700 rounded">Listar</a>
                </div>
            </div>

            <div class="relative">
                <button
                    class="flex justify-between items-center w-full px-4 py-2 hover:bg-gray-700 rounded dropdown-toggle"
                    data-target="dropdown1">
                    Túmulos
                    <svg class="w-4 h-4 ml-2 transition-transform transform rotate-0" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div id="dropdown1" class="hidden mt-1 ml-4 space-y-1">
                    <a href={{ route('tumulo.cadastrar') }} class="block px-4 py-2 text-sm hover:bg-gray-700 rounded">Cadastrar</a>
                    <a href={{ route('tumulo.listar') }} class="block px-4 py-2 text-sm hover:bg-gray-700 rounded">Listar</a>
                </div>
            </div>
            <div class="relative">
                <button
                    class="flex justify-between items-center w-full px-4 py-2 hover:bg-gray-700 rounded dropdown-toggle"
                    data-target="dropdown2">
                    Defuntos
                    <svg class="w-4 h-4 ml-2 transition-transform transform rotate-0" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div id="dropdown2" class="hidden mt-1 ml-4 space-y-1">
                    <a href={{ route('defunto.cadastrar') }} class="block px-4 py-2 text-sm hover:bg-gray-700 rounded">Cadastrar</a>
                    <a href={{ route('defunto.listar') }} class="block px-4 py-2 text-sm hover:bg-gray-700 rounded">Listar</a>
                </div>
            </div>
            <div class="relative">
                <button
                    class="flex justify-between items-center w-full px-4 py-2 hover:bg-gray-700 rounded dropdown-toggle"
                    data-target="dropdown3">
                    Funcionalidades
                    <svg class="w-4 h-4 ml-2 transition-transform transform rotate-0" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div id="dropdown3" class="hidden mt-1 ml-4 space-y-1">
                    <a href={{ route('tumulo.listarqrcodes') }} class="block px-4 py-2 text-sm hover:bg-gray-700 rounded">Listar Qr Codes</a>
                </div>
            </div>

            <!-- <div class="relative">
                <button
                    class="flex justify-between items-center w-full px-4 py-2 hover:bg-gray-700 rounded dropdown-toggle"
                    data-target="dropdown3">
                    Usuários
                    <svg class="w-4 h-4 ml-2 transition-transform transform rotate-0" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div id="dropdown3" class="hidden mt-1 ml-4 space-y-1">
                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-700 rounded">Cadastrar</a>
                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-700 rounded">Listar</a>
                </div>
            </div> -->

            <!-- <div class="relative">
                <button
                    class="flex justify-between items-center w-full px-4 py-2 hover:bg-gray-700 rounded dropdown-toggle"
                    data-target="dropdown4">
                    Permissões
                    <svg class="w-4 h-4 ml-2 transition-transform transform rotate-0" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div id="dropdown4" class="hidden mt-1 ml-4 space-y-1">
                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-700 rounded">Cadastrar</a>
                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-700 rounded">Listar</a>
                </div>
            </div> -->
        </aside>
    </div>
    <div id="full" >
        <!-- Navbar -->
        <nav class="bg-gray-800 text-white px-4 py-2 flex justify-between items-center">
            <div class="text-lg font-semibold">Sistema de Gestão Funebre - Prefeitura de Cumaru</div>
            <ul class="flex space-x-4 items-center">
                <li><a href="#" class="hover:text-gray-300">Início</a></li>
                <li><a href="#" class="hover:text-gray-300">Sobre</a></li>

                <!-- Dropdown -->
                <li class="relative group" id="dropdown">
                    <button id="dropdownToggle" class="hover:text-gray-300 flex items-center gap-1">
                        Serviços
                        <svg class="w-4 h-4 transform group-hover:rotate-180 transition" fill="none"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul id="dropdownMenu"
                        class="absolute hidden bg-white text-black mt-2 py-2 rounded shadow-lg min-w-[10px] z-10">
                        <li><a href="#" class="block px-2 py-2 hover:bg-gray-100">Cadastro</a></li>
                        <li><a href="#" class="block px-2 py-2 hover:bg-gray-100">Consulta</a></li>
                        <li><a href="#" class="block px-2 py-2 hover:bg-gray-100">Relatórios</a></li>
                    </ul>
                </li>
                <li><a href="#" class="hover:text-gray-300"></a></li>
            </ul>
        </nav>
    