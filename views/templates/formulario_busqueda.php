<div class="flex flex-col mb-6 md:flex-row md:gap-12 items-center">
    <form class="flex items-center max-w-100 mb-6 md:mb-0" method="get" action="/search">
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-full">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                     aria-hidden="true" viewBox="0 0 256 256">
                    <path fill="#999999"
                          d="M208 24H72a32 32 0 0 0-32 32v168a8 8 0 0 0 8 8h144a8 8 0 0 0 0-16H56a16 16 0 0 1 16-16h136a8 8 0 0 0 8-8V32a8 8 0 0 0-8-8m-8 160H72a31.8 31.8 0 0 0-16 4.29V56a16 16 0 0 1 16-16h128Z"/>
                </svg>
            </div>
            <input type="text" id="simple-search" name="busqueda-libro"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 lg:text-lg lg:p-4"
                   placeholder="Busca un libro..." required/>
        </div>

        <div class="bg-primary-500 rounded-lg hover:bg-primary-300 mx-2">

            <button type="submit"
                    class="ms-auto p-2.5 text-sm font-medium text-white focus:ring-4 ">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"
                          d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
                <span class="sr-only">Buscar</span>
            </button>
        </div>
    </form>