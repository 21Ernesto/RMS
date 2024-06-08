<x-admin-layout>
    <div>

        <nav class="flex mb-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a class="inline-flex items-center text-sm font-medium">
                        <span class="text-3xl font-black">
                            <i class="fas fa-bullseye text-care3"></i>
                            <span class="text-care3">Dashboard</span>
                        </span>
                    </a>
                </li>
            </ol>
        </nav>


        <div class="grid items-center flex-auto grid-cols-1 gap-4 mb-4 sm:grid-cols-2 lg:grid-cols-4">

            <div class="overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800">
                <div class="flex items-center p-6 text-gray-900 dark:text-gray-100">
                    <i class="text-gray-500 fas fa-envelope text-7xl"></i>
                    <div class="ms-4">
                        <span class="block text">Correos</span>
                        <span class="text-2xl font-bold">{{ $totalCorreos }}</span>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800">
                <div class="flex items-center p-6 text-gray-900 dark:text-gray-100">
                    <i class="text-gray-500 fas fa-tag text-7xl"></i>
                    <div class="ms-4">
                        <span class="block text">Destacados</span>
                        <span class="text-2xl font-bold">{{ $detacados }}</span>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800">
                <div class="flex items-center p-6 text-gray-900 dark:text-gray-100">
                    <i class="text-gray-500 fas fa-shopping-bag text-7xl"></i>
                    <div class="ms-4">
                        <span class="block text">Sets</span>
                        <span class="text-2xl font-bold">{{ $totalProductos }}</span>
                    </div>
                </div>
            </div>
            <div class="overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800">
                <div class="flex items-center p-6 text-gray-900 dark:text-gray-100">
                    <i class="text-gray-500 fas fa-shopping-bag text-7xl"></i>
                    <div class="ms-4">
                        <span class="block text">Categorías</span>
                        <span class="text-2xl font-bold">{{ $totalCategory }}</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="grid items-center flex-auto grid-cols-1 gap-4 mb-4 sm:grid-cols-1 lg:grid-cols-2">
            <div class="overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800">
                <div class="flex items-center p-6 text-gray-900 dark:text-gray-100">
                    <i class="text-gray-500 fas fa-shopping-cart text-7xl"></i>
                    <div class="ms-4">
                        <span class="block text">Ganancias Tour por día</span>
                        <span class="text-2xl font-bold">$ {{ $gananciasTour }} MXN</span>
                    </div>
                </div>
            </div>
            
            <div class="overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800">
                <div class="flex items-center p-6 text-gray-900 dark:text-gray-100">
                    <i class="text-gray-500 fas fa-shopping-cart text-7xl"></i>
                    <div class="ms-4">
                        <span class="block text">Ganancias Paquetes</span>
                        <span class="text-2xl font-bold">$ {{ $gananciasPaquetes }} MXN</span>
                    </div>
                </div>
            </div>
            <div class="overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800">
                <div class="flex items-center p-6 text-gray-900 dark:text-gray-100">
                    <i class="text-gray-500 fas fa-shopping-cart text-7xl"></i>
                    <div class="ms-4">
                        <span class="block text">Ganancias Promos 2x1</span>
                        <span class="text-2xl font-bold">$ {{ $gananciasPromo }} MXN</span>
                    </div>
                </div>
            </div>
            <div class="overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800">
                <div class="flex items-center p-6 text-gray-900 dark:text-gray-100">
                    <i class="text-gray-500 fas fa-shopping-cart text-7xl"></i>
                    <div class="ms-4">
                        <span class="block text">Ganancias Paque Viajes</span>
                        <span class="text-2xl font-bold">$ {{ $gananciasPaque }} MXN</span>
                    </div>
                </div>
            </div>
            <div class="overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800">
                <div class="flex items-center p-6 text-gray-900 dark:text-gray-100">
                    <i class="text-gray-500 fas fa-shopping-cart text-7xl"></i>
                    <div class="ms-4">
                        <span class="block text">Ganancias Combo amigos</span>
                        <span class="text-2xl font-bold">$ {{ $gananciasCombo }} MXN</span>
                    </div>
                </div>
            </div>
            <div class="overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800">
                <div class="flex items-center p-6 text-gray-900 dark:text-gray-100">
                    <i class="text-gray-500 fas fa-shopping-cart text-7xl"></i>
                    <div class="ms-4">
                        <span class="block text">Ganancias Tren Maya</span>
                        <span class="text-2xl font-bold">$ {{ $gananciasTren }} MXN</span>
                    </div>
                </div>
            </div>
        </div>


    </div>
</x-admin-layout>
