@php
    $links = [
        [
            'header' => 'Dashboard',
        ],

        [
            'name' => 'Dashboard',
            'icon' => 'fa-solid fa-gauge',
            'route' => route('dashboard'),
            'active' => request()->routeIs('dashboard'),
        ],

        [
            'header' => 'Página',
        ],

        [
            'name' => 'Menu',
            'icon' => 'fa-solid fa-bars',
            'route' => route('menus.index'),
            'active' => request()->routeIs('menus.*'),
        ],
        [
            'name' => 'Categorías',
            'icon' => 'fa-solid fa-layer-group',
            'route' => route('categories.index'),
            'active' => request()->routeIs('categories.*'),
        ],
        [
            'name' => 'Tours',
            'icon' => 'fa-solid fa-route',
            'route' => route('tours.index'),
            'active' => request()->routeIs('tours.*'),
        ],
        [
            'name' => 'Paquetes',
            'icon' => 'fa-solid fa-jet-fighter',
            'route' => route('packages.index'),
            'active' => request()->routeIs('packages.*'),
        ],
        [
            'name' => 'Promos 2X1',
            'icon' => 'fa-solid fa-bomb',
            'route' => route('promotions.index'),
            'active' => request()->routeIs('promotions.*'),
        ],
        [
            'name' => 'Paque Viajes',
            'icon' => 'fa-solid fa-plane-arrival',
            'route' => route('paqueviajes.index'),
            'active' => request()->routeIs('paqueviajes.*'),
        ],
        [
            'name' => 'Combo Amigos',
            'icon' => 'fa-solid fa-hand-fist',
            'route' => route('comboamigos.index'),
            'active' => request()->routeIs('comboamigos.*'),
        ],
        [
            'name' => 'Tren Maya',
            'icon' => 'fa-solid fa-train-tram',
            'route' => route('trenmaya.index'),
            'active' => request()->routeIs('trenmaya.*'),
        ],
        [
            'name' => 'Temporada',
            'icon' => 'fa-solid fa-calendar-alt',
            'route' => route('seaseons.index'),
            'active' => request()->routeIs('seaseons.*'),
        ],

        [
            'header' => 'Administración',
        ],

        [
            'name' => 'Usuarios',
            'icon' => 'fa-solid fa-users',
            'route' => route('users.index'),
            'active' => request()->routeIs('users.*'),
        ],
        [
            'name' => 'Correo',
            'icon' => 'fa-solid fa-envelope-open-text',
            'route' => route('mails.index'),
            'active' => request()->routeIs('mails.*'),
        ],
        [
            'name' => 'Galería carros',
            'icon' => 'fa-solid fa-panorama',
            'route' => route('cars.index'),
            'active' => request()->routeIs('cars.*'),
        ],
        [
            'name' => 'Equipo',
            'icon' => 'fa-solid fa-users-gear',
            'route' => route('teams.index'),
            'active' => request()->routeIs('teams.*'),
        ],
        
        [
            'header' => 'Ventas',
        ],

        [
            'name' => 'Tour y Combo amigo',
            'icon' => 'fa-solid fa-sack-dollar',
            'route' => route('sale-inn'),
            'active' => request()->routeIs('sale-inn'),
        ],
        [
            'name' => 'Promociones',
            'icon' => 'fa-solid fa-sack-dollar',
            'route' => route('sale-promo'),
            'active' => request()->routeIs('sale-promo  '),
        ],
        [
            'name' => 'Otros',
            'icon' => 'fa-solid fa-sack-dollar',
            'route' => route('sale-delivery'),
            'active' => request()->routeIs('sale-delivery'),
        ],

    ];
@endphp

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
    :class="{
        'transform-none': open,
        '-translate-x-full': !open
    }" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            @foreach ($links as $link)
                <li>
                    @isset($link['header'])
                        <div class="px-3 py-2 text-xs font-semibold text-gray-300 uppercase">
                            {{ $link['header'] }}
                        </div>
                    @else
                        @if (isset($link['submenu']))
                            <div x-data="{
                                open: {{ $link['active'] ? 'true' : 'false' }}
                            }">
                                <button
                                    class="flex items-center w-full p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ $link['active'] ? 'bg-gray-300' : '' }}"
                                    x-on:click="open= !open">
                                    <span class="inline-flex items-center justify-center w-6 h-6">
                                        <i class="{{ $link['icon'] }} text-black"></i>
                                    </span>
                                    <span class="flex-1 text-left ms-3">
                                        {{ $link['name'] }}
                                    </span>

                                    <i class="fa-solid fa-angle-down"
                                        :class="{
                                            'fa-angle-down': !open,
                                            'fa-angle-up': open
                                        }"></i>

                                </button>

                                <ul x-cloak x-show="open">
                                    @foreach ($link['submenu'] as $item)
                                        <li class="pl-4">
                                            <a href=""
                                                class="flex items-center w-full p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ $item['active'] ? 'bg-gray-300' : '' }}">
                                                <span class="inline-flex items-center justify-center w-6 h-6">
                                                    <i class="{{ $item['icon'] }} text-black"></i>
                                                </span>
                                                <span class="flex-1 text-left ms-3">
                                                    {{ $item['name'] }}
                                                </span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <a href="{{ $link['route'] }}"
                                class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ $link['active'] ? 'bg-gray-300' : '' }}">
                                <span class="inline-flex items-center justify-center w-6 h-6">
                                    <i class="{{ $link['icon'] }} text-black"></i>
                                </span>
                                <span class="ms-3">
                                    {{ $link['name'] }}
                                </span>
                            </a>
                        @endif
                    @endisset
                </li>
            @endforeach
        </ul>
    </div>
</aside>
