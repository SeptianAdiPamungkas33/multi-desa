<nav class="fixed top-0 w-full bg-gradient-to-br from-blue-800 to-blue-300 h-fit" style="z-index: 99;">
    <div class="px-3 py-3 lg:px-5 lg:pl-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button onclick="toggleSidebarMobile()" type="button" class="inline-flex items-center p-2 text-lg text-black rounded-lg lg:hidden hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-gray-200">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <div class="w-full lg:flex items-center gap-4 py-2">
                    <img src="{{ url('img/Logo_Dinas_Kra.png') }}" alt="Logo Diskominfo Karanganyar" class="w-8">

                    <h1 class="font-bold w-full text-white text-lg m-0">
                        PEMERINTAH KABUPATEN KARANGANYAR
                    </h1>
                </div>
            </div>

            <div class="flex items-center">
                <div class="flex items-center ml-3">
                    <div class="flex items-center gap-2">
                        <button type="button" class="flex text-sm  rounded-full items-center gap-2 text-white" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <div class="text-white font-medium text-center text-sm">{{auth()->user()->username}}</div>
                            <span class="sr-only">Open user menu</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                    </div>
                    <div class="z-50 text-lg hidden my-4 list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <div class="text-lg text-gray-900 text-center dark:text-white" role="none">
                                Admin Utama
                            </div>
                            <!-- <div class="text-lg font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                145171251212
                            </div> -->
                        </div>
                        <ul class="py-1" role="none">
                            <!-- <li>
                                <a href="{{ url('home') }}" class="block px-4 py-2 text-lg text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ url('profile') }}" class="block px-4 py-2 text-lg text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Profile</a>
                            </li> -->
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full text-start block px-4 py-2 text-lg text-gray-700 hover:bg-gray-100">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>