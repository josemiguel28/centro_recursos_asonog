<section class="bg-white">

    <!-- Hero -->
    <div class="grid max-w-screen-xl px-4 py-4 pb-10 mx-auto lg:gap-8 xl:gap-0 lg:grid-cols-12">
        <div class="mr-auto mx-auto place-self-center lg:col-span-6 text-center">
            <h1 class="max-w-2xl mb-4 text-5xl font-medium tracking-wide leading-none lg:text-left lg:text-6xl">
                Descubre un mundo de conocimiento
            </h1>

            <div class="text-center">
                <p class="max-w-xl mb-6 font-light text-gray-500 lg:text-left lg:mb-8 md:text-lg ">Explora
                    una colección de libros y recursos exclusivos para enriquecer tu aprendizaje.</p>
            </div>

            <!-- Formulario de búsqueda -->
            <div class="flex flex-col mb-6 md:flex-row md:gap-12 items-center">
                <form class="flex items-center max-w-100 mb-6 md:mb-0">
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

                <a href="#"
                   class="inline-flex items-center justify-center text-base font-medium text-center text-gray-600 underline">
                    Explorar Biblioteca
                </a>
            </div>
        </div>
        <div class="mx-auto mt-10 lg:mt-0 lg:col-span-6 lg:flex">
            <picture>
                <source srcset="build/img/hero_img.webp" type="image/webp">
                <source srcset="build/img/hero_img.jpg" type="image/jpeg">
                <img loading="lazy" class="rounded" src="build/img/hero_img.jpg" alt="hero img">
            </picture>
        </div>
    </div>

    <!-- Features -->
    <div class="mx-auto text-center pt-10 pb-10 md:max-w-screen-md lg:max-w-screen-lg  ">
        <div class="flex flex-wrap flex-col justify-center items-center mt-8 gap-16 text-gray-500 sm:justify-evenly md:flex-row md:justify-between sm:gap-12">
            <div class="flex justify-center flex-col mb-7 lg:mb-0">
                <svg class="h-20 w-20 mx-auto" viewBox="0 0 90 90" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M73.125 8.4375H25.3125C22.3288 8.4375 19.4673 9.62276 17.3575 11.7325C15.2478 13.8423 14.0625 16.7038 14.0625 19.6875V78.75C14.0625 79.4959 14.3588 80.2113 14.8863 80.7387C15.4137 81.2662 16.1291 81.5625 16.875 81.5625H67.5C68.2459 81.5625 68.9613 81.2662 69.4887 80.7387C70.0162 80.2113 70.3125 79.4959 70.3125 78.75C70.3125 78.0041 70.0162 77.2887 69.4887 76.7613C68.9613 76.2338 68.2459 75.9375 67.5 75.9375H19.6875C19.6875 74.4457 20.2801 73.0149 21.335 71.96C22.3899 70.9051 23.8207 70.3125 25.3125 70.3125H73.125C73.8709 70.3125 74.5863 70.0162 75.1137 69.4887C75.6412 68.9613 75.9375 68.2459 75.9375 67.5V11.25C75.9375 10.5041 75.6412 9.78871 75.1137 9.26126C74.5863 8.73382 73.8709 8.4375 73.125 8.4375ZM70.3125 64.6875H25.3125C23.3372 64.6845 21.3963 65.2049 19.6875 66.1957V19.6875C19.6875 18.1957 20.2801 16.7649 21.335 15.71C22.3899 14.6551 23.8207 14.0625 25.3125 14.0625H70.3125V64.6875Z"
                          fill="#666666"/>
                </svg>

                <p class="font-semibold ms-auto text-center text-xl ">+130 libros digitales</p>

            </div>
            <div class="flex justify-center flex-col mb-7 lg:mb-0">

                <svg class="h-20 w-20 mx-auto" viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M61.0523 34.5727C61.3138 34.8339 61.5213 35.144 61.6628 35.4855C61.8044 35.8269 61.8772 36.1929 61.8772 36.5625C61.8772 36.9321 61.8044 37.2981 61.6628 37.6395C61.5213 37.981 61.3138 38.2911 61.0523 38.5523L41.3648 58.2398C41.1036 58.5013 40.7935 58.7088 40.452 58.8503C40.1106 58.9919 39.7446 59.0647 39.375 59.0647C39.0054 59.0647 38.6394 58.9919 38.298 58.8503C37.9565 58.7088 37.6464 58.5013 37.3852 58.2398L28.9477 49.8023C28.4199 49.2746 28.1234 48.5588 28.1234 47.8125C28.1234 47.0662 28.4199 46.3504 28.9477 45.8227C29.4754 45.2949 30.1912 44.9984 30.9375 44.9984C31.6838 44.9984 32.3996 45.2949 32.9273 45.8227L39.375 52.2738L57.0727 34.5727C57.3339 34.3112 57.6441 34.1037 57.9855 33.9622C58.3269 33.8206 58.6929 33.7478 59.0625 33.7478C59.4321 33.7478 59.7981 33.8206 60.1395 33.9622C60.481 34.1037 60.7911 34.3112 61.0523 34.5727ZM81.5625 45C81.5625 52.2314 79.4181 59.3004 75.4006 65.313C71.3831 71.3257 65.6728 76.012 58.9919 78.7793C52.3109 81.5467 44.9594 82.2707 37.867 80.86C30.7746 79.4492 24.2598 75.9669 19.1464 70.8536C14.0331 65.7402 10.5508 59.2254 9.14004 52.133C7.72927 45.0406 8.45333 37.6891 11.2207 31.0081C13.988 24.3272 18.6743 18.6169 24.687 14.5994C30.6996 10.5819 37.7686 8.4375 45 8.4375C54.6938 8.44774 63.9877 12.3031 70.8423 19.1577C77.6969 26.0123 81.5523 35.3062 81.5625 45ZM75.9375 45C75.9375 38.8811 74.123 32.8997 70.7236 27.812C67.3241 22.7244 62.4924 18.7591 56.8393 16.4175C51.1862 14.0759 44.9657 13.4632 38.9644 14.657C32.9631 15.8507 27.4506 18.7972 23.1239 23.1239C18.7972 27.4506 15.8507 32.9631 14.657 38.9644C13.4632 44.9657 14.0759 51.1862 16.4175 56.8393C18.7591 62.4924 22.7244 67.3241 27.812 70.7236C32.8997 74.123 38.8811 75.9375 45 75.9375C53.2023 75.9282 61.0659 72.6657 66.8658 66.8658C72.6657 61.0659 75.9282 53.2023 75.9375 45Z"
                          fill="#666666"/>
                </svg>


                <p class="font-semibold ms-auto text-center text-xl ">Acceso gratuito</p>

            </div>
            <div class="flex justify-center flex-col mb-5 lg:mb-0">
                <svg class="h-20 w-20 mx-auto" viewBox="0 0 90 90" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M73.125 8.4375H25.3125C22.3288 8.4375 19.4673 9.62276 17.3575 11.7325C15.2478 13.8423 14.0625 16.7038 14.0625 19.6875V78.75C14.0625 79.4959 14.3588 80.2113 14.8863 80.7387C15.4137 81.2662 16.1291 81.5625 16.875 81.5625H67.5C68.2459 81.5625 68.9613 81.2662 69.4887 80.7387C70.0162 80.2113 70.3125 79.4959 70.3125 78.75C70.3125 78.0041 70.0162 77.2887 69.4887 76.7613C68.9613 76.2338 68.2459 75.9375 67.5 75.9375H19.6875C19.6875 74.4457 20.2801 73.0149 21.335 71.96C22.3899 70.9051 23.8207 70.3125 25.3125 70.3125H73.125C73.8709 70.3125 74.5863 70.0162 75.1137 69.4887C75.6412 68.9613 75.9375 68.2459 75.9375 67.5V11.25C75.9375 10.5041 75.6412 9.78871 75.1137 9.26126C74.5863 8.73382 73.8709 8.4375 73.125 8.4375ZM70.3125 64.6875H25.3125C23.3372 64.6845 21.3963 65.2049 19.6875 66.1957V19.6875C19.6875 18.1957 20.2801 16.7649 21.335 15.71C22.3899 14.6551 23.8207 14.0625 25.3125 14.0625H70.3125V64.6875Z"
                          fill="#666666"/>
                </svg>

                <p class="font-semibold ms-auto text-center text-xl ">+130 libros digitales</p>

            </div>
        </div>
    </div>

    <!-- CTA -->
    <!-- Cartas -->
    <div class="mx-auto md:max-w-screen-md lg:max-w-screen-lg flex flex-col px-4 py-4 pb-10 space-y-4 md:flex-row md:space-x-4">
        <!-- Primera Carta -->
        <div class="relative flex flex-col md:flex-row w-full bg-white shadow-md border border-slate-200 rounded-lg">
            <div class="relative p-2.5 md:w-2/5 shrink-0 overflow-hidden">
                <picture>
                    <source srcset="build/img/banner-library.webp" type="image/webp">
                    <source srcset="build/img/banner-library.jpg" type="image/jpeg">
                    <img class="h-full w-full rounded-md md:rounded-lg object-cover"
                         loading="lazy" src="build/img/banner-library.png" alt="hero img">
                </picture>
            </div>
            <div class="p-6">
                <div class="mb-4 rounded-full bg-secondary-500 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-20 text-center">
                    PÚBLICO
                </div>
                <h4 class="mb-2 text-slate-800 text-xl font-semibold">
                    Accede a todos nuestros libros de forma gratuita
                </h4>
                <p class="mb-8 text-slate-600 leading-normal font-light">
                    Puedes acceder a todos nuestros libros de forma gratuita 📕.
                </p>
                <div>
                    <a href="#" class="text-slate-800 font-semibold text-sm hover:underline flex items-center">
                        Biblioteca
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Segunda Carta -->
        <div class="relative flex flex-col md:flex-row w-full bg-white shadow-md border border-slate-200 rounded-lg">
            <div class="relative p-2.5 md:w-2/5 shrink-0 overflow-hidden">
                <picture>
                    <source srcset="build/img/banner-colaboradores.webp" type="image/webp">
                    <source srcset="build/img/banner-colaboradores.jpg" type="image/jpeg">
                    <img class="h-full w-full rounded-md md:rounded-lg object-cover"
                         loading="lazy" src="build/img/banner-colaboradores.jpg" alt="hero img">
                </picture>
            </div>
            <div class="p-6">
                <div class="mb-4 rounded-full bg-primary-500 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-20 text-center">
                    PRIVADO
                </div>
                <h4 class="mb-2 text-slate-800 text-xl font-semibold">
                    ¿Eres parte de nuestra organizacion?
                </h4>
                <p class="mb-8 text-slate-600 leading-normal font-light">
                    Si eres parte de nuestra organizacion puedes acceder a nuestros recursos de forma online.
                </p>
                <div>
                    <a href="#" class="text-slate-800 font-semibold text-sm hover:underline flex items-center">
                        Acceder
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Banner -->
    <div class="bg-primary-light mx-auto max-w-screen-xl rounded-[2rem] mt-28 pb-20 relative">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-6 mb-0">
            <!-- Columna 1: Título y subtítulo -->
            <div class="flex flex-col justify-center pt-20 mb-20 text-center">
                <h1 class="text-3xl font-bold mb-2">Todos pueden aprender.</h1>
                <h2 class="text-xl text-gray-700">Accede a recursos y materiales diseñados para todos los niveles de
                    conocimiento.</h2>
            </div>
            <!-- Columna 2: Imagen -->
            <div class="flex justify-center relative z-30"> <!-- Ajusta el z-index -->
                <picture>
                    <source srcset="build/img/img_banner.webp" type="image/webp">
                    <source srcset="build/img/img_banner.jpg" type="image/jpeg">
                    <img class="w-full h-auto max-w-sm object-cover -mt-32"
                         loading="lazy" src="build/img/img_banner.png" alt="hero img">
                </picture>
            </div>
        </div>
    </div>

    <!-- Sección de categorias destacados -->
    <div class="mx-auto max-w-screen-xl bg-gray-100 px-4 py-4 mt-28">
        <!-- Título y Subtítulo -->
        <div class="mb-8">
            <h1 class="text-3xl font-semibold mb-2">Explora Nuestras Categorías</h1>
            <h2 class="text-xl text-gray-400">Encuentra fácilmente los recursos que necesitas, organizados por temas y áreas de interés.</h2>
        </div>

        <!-- 4 Columnas -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Columna 1 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-2">Título 1</h3>
                <p class="text-gray-700">Descripción corta del contenido o recurso destacado.</p>
            </div>
            <!-- Columna 2 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-2">Título 2</h3>
                <p class="text-gray-700">Descripción corta del contenido o recurso destacado.</p>
            </div>
            <!-- Columna 3 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-2">Título 3</h3>
                <p class="text-gray-700">Descripción corta del contenido o recurso destacado.</p>
            </div>
            <!-- Columna 4 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-2">Título 4</h3>
                <p class="text-gray-700">Descripción corta del contenido o recurso destacado.</p>
            </div>
        </div>

        <div class="flex justify-center mt-8">
            <a href="#" class="bg-primary-500 text-white px-6 py-3 rounded-md text-lg hover:bg-blue-700 transition">
                Ver más
            </a>
        </div>
    </div>

</section>