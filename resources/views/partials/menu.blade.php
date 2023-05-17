<nav class="side-nav">
    <ul>
        <li>
            <a href="{{ route('admin.home') }}"
               class="side-menu side-menu{{ request()->is("admin") ? "--active" : "" }}">
                <div class="side-menu__icon"><i data-lucide="home"></i></div>
                <div class="side-menu__title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="{{ route("admin.products") }}"
               class="side-menu side-menu{{ request()->is("admin/products") || request()->is("admin/products/*") ? "--active" : "" }}">
                <div class="side-menu__icon"><i data-lucide="inbox"></i></div>
                <div class="side-menu__title">Products</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.categories') }}"
               class="side-menu side-menu{{ request()->is("admin/categories") || request()->is("admin/categories/*") ? "--active" : "" }}">
                <div class="side-menu__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         icon-name="shopping-bag" data-lucide="shopping-bag" class="lucide lucide-shopping-bag">
                        <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"></path>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <path d="M16 10a4 4 0 01-8 0"></path>
                    </svg>
                </div>
                <div class="side-menu__title">Category</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="side-menu side-menu{{ request()->is("admin/import") || request()->is("admin/import/*") ? "--active" : "" }}">
                <div class="side-menu__icon">
                    <svg fill="#174f64" height="24px" width="24px" version="1.1" id="Layer_1"
                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                         viewBox="0 0 511.876 511.876" xml:space="preserve" stroke="#164e63"
                         stroke-width="9.213767999999998"><g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <g>
                                    <g>
                                        <path
                                            d="M475.626,172.489c-0.533-0.427-1.173-0.853-1.92-1.173l-85.867-32.213c-6.187-2.453-13.333,1.28-14.507,8.213 c-0.747,4.373,1.387,8.853,5.227,10.987c0.533,0.32,1.173,0.64,1.813,0.853l59.84,22.507l-184.427,73.813l-184.32-73.92 l60.053-22.4c5.547-1.92,8.533-8,6.613-13.653c-1.92-5.547-8-8.533-13.653-6.613c-0.107,0-0.32,0.107-0.427,0.213l-85.867,32 c-0.32,0.213-0.64,0.32-0.853,0.533c-0.533,0.213-0.96,0.427-1.387,0.747c-0.213,0.213-0.427,0.427-0.64,0.533 c-0.32,0.32-0.64,0.533-0.96,0.853c-0.747,0.747-1.493,1.707-1.92,2.667c-0.107,0.213-0.107,0.427-0.213,0.64 c-0.427,1.067-0.853,2.133-0.853,3.2v0.427l1.067,0.533v213.333c0,4.053,2.24,7.787,5.867,9.493L251.626,510.73 c0.107,0,0.213,0,0.32,0.107c2.773,1.387,6.08,1.387,8.96,0c0.107,0,0.213,0,0.32-0.107l213.333-106.667 c3.627-1.813,5.867-5.547,5.867-9.493V182.836C480.959,178.783,479.145,174.73,475.626,172.489z M245.652,483.956l-192-96 V197.023l192,76.8V483.956z M458.986,388.063l-192,96V273.929l192-76.8V388.063z"></path>
                                        <path
                                            d="M248.745,188.916c4.16,4.16,10.88,4.16,15.04,0l85.333-85.333c4.053-4.267,3.947-10.987-0.213-15.04 c-4.16-3.947-10.667-3.947-14.827,0l-67.093,66.987V10.996c0-5.333-3.84-10.133-9.067-10.88 c-6.613-0.96-12.267,4.16-12.267,10.56v144.96l-67.093-67.093c-4.267-4.053-10.987-3.947-15.04,0.213 c-3.947,4.16-3.947,10.667,0,14.827L248.745,188.916z"></path>
                                    </g>
                                </g>
                            </g>
                        </g></svg>
                </div>
                <div class="side-menu__title">
                    Imports
                    <div class="side-menu__sub-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </div>
                </div>
            </a>
            <ul class="{{ request()->is("admin/import") || request()->is("admin/import/*") ? "side-menu__sub-open" : "" }}">
                <li>
                    <a href="{{route('admin.customers')}}" class="side-menu">
                        <div class="side-menu__icon">
                            <i data-lucide="users"></i>
                        </div>
                        <div class="side-menu__title">
                            Customers
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.import.sales') }}"
                       class="side-menu side-menu{{ request()->is("admin/import/sales") || request()->is("admin/import/sales/*") ? "--active" : "" }}">
                        <div class="side-menu__icon"><i data-lucide="clipboard"></i></div>
                        <div class="side-menu__title">Sales</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.import.finances')}}"
                       class="side-menu side-menu{{ request()->is("admin/import/finances") || request()->is("admin/import/finances/*") ? "--active" : "" }}">
                        <div class="side-menu__icon"><i data-lucide="dollar-sign"></i></div>
                        <div class="side-menu__title">Finances</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         icon-name="box" data-lucide="box" class="lucide lucide-box">
                        <path
                            d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"></path>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                    </svg>
                </div>
                <div class="side-menu__title">
                    Sales System
                    <div class="side-menu__sub-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </div>
                </div>
            </a>
            <ul class="" style="display: none;">
                <li>
                    <a href="{{ route('admin.clients') }}"
                       class="side-menu side-menu{{ request()->is("admin/clients") || request()->is("admin/clients/*") ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 icon-name="users" data-lucide="users" class="lucide lucide-users">
                                <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 00-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 010 7.75"></path>
                            </svg>
                        </div>
                        <div class="side-menu__title">Clients</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.sales') }}"
                       class="side-menu side-menu{{ request()->is("admin/sales") || request()->is("admin/sales/*") ? "--active" : "" }}">
                        <div class="side-menu__icon"><i data-lucide="clipboard"></i></div>
                        <div class="side-menu__title">Sales</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.finances') }}"
                       class="side-menu side-menu{{ request()->is("admin/finances") || request()->is("admin/finances/*") ? "--active" : "" }}">
                        <div class="side-menu__icon"><i data-lucide="dollar-sign"></i></div>
                        <div class="side-menu__title">Finances</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    <div data-url="#" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 box dark:bg-dark-2 border rounded-full
    w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
        <div class="mr-4 text-gray-700 dark:text-gray-300">Dark Mode</div>
        <div onclick="switchDark()" class="dark-mode-switcher__toggle dark-mode-switcher__toggle--active border"></div>
    </div>
</nav>
