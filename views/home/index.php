<section class="bg-white">

    <!-- Hero -->
    <div class="grid max-w-screen-xl px-4 mx-auto lg:gap-8 xl:gap-0 lg:grid-cols-12" data-aos="zoom-in"
         data-aos-duration="1500">
        <div class="mr-auto mx-auto place-self-center lg:col-span-6 text-center">
            <h1 class="max-w-2xl mb-4 text-5xl font-medium tracking-wide leading-none lg:text-left lg:text-6xl">
                Centro de recursos para la gestión del conocimiento
            </h1>

            <div class="text-center">
                <p class="max-w-xl mb-6 font-light text-gray-500 lg:text-left lg:mb-8 md:text-lg ">ASONOG te ofrece
                    una colección de libros y recursos exclusivos para enriquecer tu aprendizaje.</p>
            </div>

            <!-- Formulario de búsqueda -->
            <?php
            include_once __DIR__ . "/../templates/formulario_busqueda.php";
            ?>

            <a href="/biblioteca"
               class="inline-flex items-center justify-center text-base font-medium text-center text-gray-600 underline">
                Explorar Biblioteca
            </a>
        </div>
    </div>
    <div class="mx-auto lg:mt-0 lg:col-span-6 lg:flex">
        <picture>
            <source srcset="build/img/hero_img.webp" type="image/webp">
            <source srcset="build/img/hero_img.jpg" type="image/jpeg">
            <img loading="lazy" class="rounded px-4" src="build/img/hero_img.jpg" alt="hero img">
        </picture>
    </div>
    </div>

    <!-- Features -->
    <div class="mx-auto text-center py-32 px-4 md:max-w-screen-md lg:max-w-screen-lg  ">
        <div class="flex flex-wrap flex-col justify-center items-center mt-8 gap-16 text-gray-500 sm:justify-evenly md:flex-row md:justify-between sm:gap-12">
            <div class="flex justify-center flex-col mb-7 lg:mb-0">
                <svg class="h-20 w-20 mx-auto" viewBox="0 0 90 90" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M73.125 8.4375H25.3125C22.3288 8.4375 19.4673 9.62276 17.3575 11.7325C15.2478 13.8423 14.0625 16.7038 14.0625 19.6875V78.75C14.0625 79.4959 14.3588 80.2113 14.8863 80.7387C15.4137 81.2662 16.1291 81.5625 16.875 81.5625H67.5C68.2459 81.5625 68.9613 81.2662 69.4887 80.7387C70.0162 80.2113 70.3125 79.4959 70.3125 78.75C70.3125 78.0041 70.0162 77.2887 69.4887 76.7613C68.9613 76.2338 68.2459 75.9375 67.5 75.9375H19.6875C19.6875 74.4457 20.2801 73.0149 21.335 71.96C22.3899 70.9051 23.8207 70.3125 25.3125 70.3125H73.125C73.8709 70.3125 74.5863 70.0162 75.1137 69.4887C75.6412 68.9613 75.9375 68.2459 75.9375 67.5V11.25C75.9375 10.5041 75.6412 9.78871 75.1137 9.26126C74.5863 8.73382 73.8709 8.4375 73.125 8.4375ZM70.3125 64.6875H25.3125C23.3372 64.6845 21.3963 65.2049 19.6875 66.1957V19.6875C19.6875 18.1957 20.2801 16.7649 21.335 15.71C22.3899 14.6551 23.8207 14.0625 25.3125 14.0625H70.3125V64.6875Z"
                          fill="#666666"/>
                </svg>

                <p class="font-semibold ms-auto text-center text-xl mt-2 ">+130 libros digitales</p>

            </div>
            <div class="flex justify-center flex-col mb-7 lg:mb-0">

                <svg class="h-20 w-20 mx-auto" viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M61.0523 34.5727C61.3138 34.8339 61.5213 35.144 61.6628 35.4855C61.8044 35.8269 61.8772 36.1929 61.8772 36.5625C61.8772 36.9321 61.8044 37.2981 61.6628 37.6395C61.5213 37.981 61.3138 38.2911 61.0523 38.5523L41.3648 58.2398C41.1036 58.5013 40.7935 58.7088 40.452 58.8503C40.1106 58.9919 39.7446 59.0647 39.375 59.0647C39.0054 59.0647 38.6394 58.9919 38.298 58.8503C37.9565 58.7088 37.6464 58.5013 37.3852 58.2398L28.9477 49.8023C28.4199 49.2746 28.1234 48.5588 28.1234 47.8125C28.1234 47.0662 28.4199 46.3504 28.9477 45.8227C29.4754 45.2949 30.1912 44.9984 30.9375 44.9984C31.6838 44.9984 32.3996 45.2949 32.9273 45.8227L39.375 52.2738L57.0727 34.5727C57.3339 34.3112 57.6441 34.1037 57.9855 33.9622C58.3269 33.8206 58.6929 33.7478 59.0625 33.7478C59.4321 33.7478 59.7981 33.8206 60.1395 33.9622C60.481 34.1037 60.7911 34.3112 61.0523 34.5727ZM81.5625 45C81.5625 52.2314 79.4181 59.3004 75.4006 65.313C71.3831 71.3257 65.6728 76.012 58.9919 78.7793C52.3109 81.5467 44.9594 82.2707 37.867 80.86C30.7746 79.4492 24.2598 75.9669 19.1464 70.8536C14.0331 65.7402 10.5508 59.2254 9.14004 52.133C7.72927 45.0406 8.45333 37.6891 11.2207 31.0081C13.988 24.3272 18.6743 18.6169 24.687 14.5994C30.6996 10.5819 37.7686 8.4375 45 8.4375C54.6938 8.44774 63.9877 12.3031 70.8423 19.1577C77.6969 26.0123 81.5523 35.3062 81.5625 45ZM75.9375 45C75.9375 38.8811 74.123 32.8997 70.7236 27.812C67.3241 22.7244 62.4924 18.7591 56.8393 16.4175C51.1862 14.0759 44.9657 13.4632 38.9644 14.657C32.9631 15.8507 27.4506 18.7972 23.1239 23.1239C18.7972 27.4506 15.8507 32.9631 14.657 38.9644C13.4632 44.9657 14.0759 51.1862 16.4175 56.8393C18.7591 62.4924 22.7244 67.3241 27.812 70.7236C32.8997 74.123 38.8811 75.9375 45 75.9375C53.2023 75.9282 61.0659 72.6657 66.8658 66.8658C72.6657 61.0659 75.9282 53.2023 75.9375 45Z"
                          fill="#666666"/>
                </svg>


                <p class="font-semibold ms-auto text-center text-xl mt-2 ">Acceso gratuito</p>

            </div>
            <div class="flex justify-center flex-col mb-5 lg:mb-0">

                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto" viewBox="0 0 512 512">
                    <path fill="none" stroke="#666666" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"
                          d="M176 416v64M80 32h192a32 32 0 0 1 32 32v412a4 4 0 0 1-4 4H48h0V64a32 32 0 0 1 32-32m240 160h112a32 32 0 0 1 32 32v256h0h-160h0V208a16 16 0 0 1 16-16"/>
                    <path fill="#666666"
                          d="M98.08 431.87a16 16 0 1 1 13.79-13.79a16 16 0 0 1-13.79 13.79m0-80a16 16 0 1 1 13.79-13.79a16 16 0 0 1-13.79 13.79m0-80a16 16 0 1 1 13.79-13.79a16 16 0 0 1-13.79 13.79m0-80a16 16 0 1 1 13.79-13.79a16 16 0 0 1-13.79 13.79m0-80a16 16 0 1 1 13.79-13.79a16 16 0 0 1-13.79 13.79m80 240a16 16 0 1 1 13.79-13.79a16 16 0 0 1-13.79 13.79m0-80a16 16 0 1 1 13.79-13.79a16 16 0 0 1-13.79 13.79m0-80a16 16 0 1 1 13.79-13.79a16 16 0 0 1-13.79 13.79m0-80a16 16 0 1 1 13.79-13.79a16 16 0 0 1-13.79 13.79m80 320a16 16 0 1 1 13.79-13.79a16 16 0 0 1-13.79 13.79m0-80a16 16 0 1 1 13.79-13.79a16 16 0 0 1-13.79 13.79m0-80a16 16 0 1 1 13.79-13.79a16 16 0 0 1-13.79 13.79"/>
                    <ellipse cx="256" cy="176" fill="#666666" rx="15.95" ry="16.03"
                             transform="rotate(-45 255.99 175.996)"/>
                    <path fill="#666666"
                          d="M258.08 111.87a16 16 0 1 1 13.79-13.79a16 16 0 0 1-13.79 13.79M400 400a16 16 0 1 0 16 16a16 16 0 0 0-16-16m0-80a16 16 0 1 0 16 16a16 16 0 0 0-16-16m0-80a16 16 0 1 0 16 16a16 16 0 0 0-16-16m-64 160a16 16 0 1 0 16 16a16 16 0 0 0-16-16m0-80a16 16 0 1 0 16 16a16 16 0 0 0-16-16m0-80a16 16 0 1 0 16 16a16 16 0 0 0-16-16"/>
                </svg>

                <p class="font-semibold ms-auto text-center text-xl mt-2">Repositorio Institucional</p>

            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="mx-auto md:max-w-screen-md lg:max-w-screen-lg flex flex-col py-8 px-4 mb-32 md:flex-row md:gap-8">
        <!-- Primera Carta -->
        <div class="relative flex flex-col md:flex-row w-full bg-white shadow-md border border-slate-200 rounded-lg min-h-[20rem]"
             data-aos="fade-right" data-aos-duration="1000">
            <div class="relative md:w-2/5 shrink-0 overflow-hidden">
                <picture>
                    <source srcset="build/img/banner-library.webp" type="image/webp">
                    <source srcset="build/img/banner-library.jpg" type="image/jpeg">
                    <img class="h-full w-full rounded-md md:rounded-lg object-cover"
                         loading="lazy" src="build/img/banner-library.jpeg" alt="library img">
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
                    <a href="/biblioteca"
                       class="text-slate-800 font-semibold text-sm hover:underline flex items-center">
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
        <div class="relative flex flex-col md:flex-row w-full bg-white shadow-md border border-slate-200 rounded-lg mx-auto mt-8 md:mt-0"
             data-aos="fade-left" data-aos-duration="1000">
            <div class="relative md:w-2/5 shrink-0 overflow-hidden">
                <picture>
                    <source srcset="build/img/logo_asonog.webp" type="image/webp">
                    <source srcset="build/img/logo_asonog.jpg" type="image/jpeg">
                    <img class="h-full w-full rounded-md md:rounded-lg object-contain"
                         loading="lazy" src="build/img/logo_asonog.png" alt="colaborador img">
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
                    <a href="/login" class="text-slate-800 font-semibold text-sm hover:underline flex items-center">
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

    <!-- Sección de categorias destacados -->
    <div class="mx-auto max-w-screen-xl px-4 py-16 mb-16" data-aos="fade-up"
         data-aos-anchor-placement="top-center" data-aos-duration="1000">
        <!-- Título y Subtítulo -->
        <div class="mb-8">
            <h2 class="text-3xl font-semibold mb-2">Explora Nuestras Categorías</h2>
            <h3 class="text-lg md:text-xl text-gray-400 lg:w-1/2">Encuentra fácilmente los recursos que necesitas,
                organizados por temas y áreas de interés.</h3>
        </div>

        <!-- 4 Columnas -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Derechos Humanos -->
            <div class="bg-white shadow-md rounded-lg border border-transparent transition transform hover:-translate-y-2 hover:shadow-lg hover:border-blue-500 flex flex-col"
                 data-aos="fade-right">
                <a href="/search-book?busqueda-libro=derechos+humanos" class="flex-grow">
                    <div>
                        <picture>
                            <source srcset="build/img/img_categoria_derechos.webp" type="image/webp">
                            <source srcset="build/img/img_categoria_derechos.jpg" type="image/jpeg">
                            <img loading="lazy" class="rounded-t-lg w-full h-56 object-cover"
                                 src="build/img/img_categoria_derechos.jpeg" alt="derechos humanos">
                        </picture>
                    </div>
                    <div class="p-4">
                        <h3 class="text-xl font-semibold">Derechos Humanos</h3>
                        <p class="text-gray-700">Recursos enfocados en la protección y promoción de los derechos
                            humanos.</p>
                    </div>
                </a>
                <!-- Call to Action -->
                <div class="mt-4 text-right">
                    <a href="/search-book?busqueda-libro=derechos+humanos"
                       class="inline-block bg-blue-500 text-white text-sm font-semibold py-3 px-6 rounded-full mb-6 mx-4 shadow hover:bg-blue-600 transition">
                        Explorar Recursos
                    </a>
                </div>
            </div>

            <!-- Seguridad Alimentaria -->
            <div class="bg-white shadow-md rounded-lg border border-transparent transition transform hover:-translate-y-2 hover:shadow-lg hover:border-green-500 flex flex-col"
                 data-aos="fade-left">
                <a href="/search-book?busqueda-libro=seguridad+alimentaria" class="flex-grow">
                    <div>
                        <picture>
                            <source srcset="build/img/img_categoria_san.webp" type="image/webp">
                            <source srcset="build/img/img_categoria_san.jpg" type="image/jpeg">
                            <img loading="lazy" class="rounded-t-lg w-full h-56 object-cover"
                                 src="build/img/img_categoria_san.jpeg" alt="seguridad alimentaria">
                        </picture>
                    </div>
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">Seguridad alimentaria y nutricional (SAN)</h3>
                        <p class="text-gray-700">Información sobre políticas y prácticas de acceso a alimentos.</p>
                    </div>
                </a>
                <!-- Call to Action -->
                <div class="mt-4 text-right">
                    <a href="/search-book?busqueda-libro=seguridad+alimentaria"
                       class="inline-block bg-green-500 text-white text-sm font-semibold py-3 px-6 rounded-full mb-6 mx-4 shadow hover:bg-green-600 transition">
                        Explorar Recursos
                    </a>
                </div>
            </div>

            <!-- Cambio Climático -->
            <div class="bg-white shadow-md rounded-lg border border-transparent transition transform hover:-translate-y-2 hover:shadow-lg hover:border-yellow-500 flex flex-col"
                 data-aos="fade-left">
                <a href="/search-book?busqueda-libro=cambio+climatico" class="flex-grow">
                    <div>
                        <picture>
                            <source srcset="build/img/img_categoria_ambiente.webp" type="image/webp">
                            <source srcset="build/img/img_categoria_ambiente.jpg" type="image/jpeg">
                            <img loading="lazy" class="rounded-t-lg w-full h-56 object-cover"
                                 src="build/img/img_categoria_ambiente.jpeg" alt="cambio climatico">
                        </picture>
                    </div>
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">Cambio Climático</h3>
                        <p class="text-gray-700">Recursos relacionados con el impacto y soluciones ante el cambio
                            climático.</p>
                    </div>
                </a>
                <!-- Call to Action -->
                <div class="mt-4 text-right">
                    <a href="/search-book?busqueda-libro=cambio+climatico"
                       class="inline-block bg-yellow-500 text-white text-sm font-semibold py-3 px-6 rounded-full mb-6 mx-4 shadow transition hover:bg-yellow-600">
                        Explorar Recursos
                    </a>
                </div>

            </div>

            <!-- Género e Inclusión -->
            <div class="bg-white shadow-md rounded-lg border border-transparent transition transform hover:-translate-y-2 hover:shadow-lg hover:border-purple-500 flex flex-col"
                 data-aos="fade-left">
                <a href="/search-book?busqueda-libro=genero+e+inclusion" class="flex-grow">
                    <div>
                        <picture>
                            <source srcset="build/img/img_categoria_genero.webp" type="image/webp">
                            <source srcset="build/img/img_categoria_genero.jpg" type="image/jpeg">
                            <img loading="lazy" class="rounded-t-lg w-full h-56 object-cover"
                                 src="build/img/img_categoria_genero.jpeg" alt="genero e inclusion">
                        </picture>
                    </div>
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">Género e Inclusión</h3>
                        <p class="text-gray-700">Materiales sobre equidad de género e inclusión social.</p>
                    </div>
                </a>
                <!-- Call to Action -->
                <div class="mt-4 text-right">
                    <a href="/search-book?busqueda-libro=genero+e+inclusion"
                       class="inline-block bg-purple-500 text-white text-sm font-semibold py-3 px-6 rounded-full mb-6 mx-4 shadow hover:bg-purple-600 transition">
                        Ver Recursos
                    </a>
                </div>
            </div>

            <!-- Participación Ciudadana -->
            <div class="bg-white shadow-md rounded-lg border border-transparent transition transform hover:-translate-y-2 hover:shadow-lg hover:border-red-500 flex flex-col"
                 data-aos="fade-right">
                <a href="/search-book?busqueda-libro=participacion+ciudadana" class="flex-grow">
                    <div>
                        <picture>
                            <source srcset="build/img/img_categoria_participacion.webp" type="image/webp">
                            <source srcset="build/img/img_categoria_participacion.jpg" type="image/jpeg">
                            <img loading="lazy" class="rounded-t-lg w-full h-56 object-cover"
                                 src="build/img/img_categoria_participacion.jpeg" alt="participacion ciudadana">
                        </picture>
                    </div>
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">Participación Ciudadana</h3>
                        <p class="text-gray-700">Guías y herramientas para fomentar la participación cívica.</p>
                    </div>
                </a>
                <!-- Call to Action -->
                <div class="mt-4 text-right">
                    <a href="/search-book?busqueda-libro=participacion+ciudadana"
                       class="inline-block bg-red-500 text-white text-sm font-semibold py-3 px-6 rounded-full mb-6 mx-4 shadow hover:bg-red-600 transition">
                        Explorar Guías
                    </a>
                </div>
            </div>

        </div>

        <!-- Botón Ver Más
        <div class="flex justify-center mt-7">
            <a href="#"
                class="border-2 border-gray-700 text-black px-6 py-3 rounded-md text-lg hover:bg-gray-200 transition">
                Ver más
            </a>
        </div>
        -->
    </div>

    <!-- Banner -->
    <div class="container mx-auto px-4 mb-32">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">

            <!-- Columna 1: Título y subtítulo -->
            <div class="text-center md:text-left">
                <h2 class="text-4xl font-bold mb-8">Todos pueden aprender.</h2>
                <h3 class="text-xl text-gray-700 mb-8">Accede a recursos y materiales diseñados para todos los
                    niveles
                    de conocimiento.</h3>
                <button class="relative inline-block w-48 h-auto mx-auto mt-2 mb-4 cursor-pointer focus:outline-none border-0 text-inherit font-inherit group"
                        aria-label="Explorar recursos">
                    <a href="/biblioteca">
                        <span class="block relative w-10 h-10 bg-primary-500 rounded-full transition-all duration-450 ease-[cubic-bezier(0.65,0,0.076,1)] group-hover:w-full"></span>

                        <span class="absolute inset-0 flex items-center justify-center font-bold uppercase tracking-wide text-primary-500 transition-all duration-450 ease-[cubic-bezier(0.65,0,0.076,1)] group-hover:text-white">
                        Explorar
                    </span>

                        <span class="absolute top-0 bottom-0 left-0 mx-auto flex items-center justify-center h-10 w-10 transition-all duration-450 ease-[cubic-bezier(0.65,0,0.076,1)] group-hover:translate-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white transform -rotate-45"
                                 fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                          </span>
                    </a>

                </button>
            </div>

            <!-- Columna 2: Imagen con fondo -->
            <div class="flex justify-center md:justify-end w-full h-full">
                <!-- Contenedor de la imagen con fondo -->
                <picture class="w-full h-full  p-4 bg-cover bg-center"
                         style="background-image: url('build/img/banner_pattern.png');">
                    <source srcset="build/img/img_banner.webp" type="image/webp">
                    <source srcset="build/img/img_banner.jpg" type="image/jpeg">
                    <img class="w-full h-full object-contain" loading="lazy"
                         src="build/img/img_banner.png" alt="Imagen ilustrativa de aprendizaje">
                </picture>
            </div>

        </div>
    </div>

    <!-- Sección de libros destacados -->
    <div class="mx-auto max-w-screen-xl px-4 py-16 ">
        <!-- Título y Subtítulo -->
        <div class="mb-8 w-full mx-auto">
            <h2 class="text-3xl font-semibold mb-2 lg:w-1/2">Libros destacados</h2>
            <h3 class="text-lg md:text-xl text-gray-400 lg:w-1/2">Descubre una selección de nuestras obras más
                populares
                y recomendadas.
                Accede a su versión digital desde cualquier lugar.</h3>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-6 contenedor-libros">

            <?php foreach ($libros as $libro) : ?>
                <div class="w-full mb-7 max-w-sm bg-white flex flex-col justify-between sm:max-w-xs"
                     data-aos="flip-left" data-aos-duration="1500">
                    <a href="/libros/<?= $libro->archivo_url ?>" class="flex justify-center p-4 sm:p-8"
                       target="_blank"
                       style="background-color: #FCFCF7;">
                        <img class="rounded-xl" loading="lazy" src="imagenesLibros/<?php echo $libro->imagen ?>"
                             alt="libro img">
                    </a>
                    <div class="flex flex-col justify-between h-full px-3 sm:px-5 pb-3 sm:pb-5">
                        <a href="/libros/<?= $libro->archivo_url ?>" target="_blank">
                            <h5 class="text-lg sm:text-xl font-semibold tracking-tight text-gray-900 dark:text-white line-clamp-4"><?php echo $libro->titulo ?></h5>
                        </a>
                        <div class="flex items-center mt-2.5 mb-4 sm:mb-5">
                            <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                    <div class="flex items-start space-x-1 rtl:space-x-reverse px-2 py-1 rounded-[1rem] bg-secondary-500">
                                        <p class="text-xs sm:text-sm text-white max-w-[150px] truncate"><?= $libro->id_categoria //nombre de la categoria                   ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="flex items-center justify-end px-3 sm:px-5 pb-3 sm:pb-5">
                        <a href="/libros/<?= $libro->archivo_url ?>" target="_blank"
                           class="text-white bg-primary-500 hover:bg-primary-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium
                                     text-sm sm:text-lg py-3 px-6 rounded-full text-center w-full">
                            Ver Libro</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="flex justify-center mt-5 md:max-w-[25%] mx-auto">
            <a href="/biblioteca"
               class="border-2 border-gray-700 text-black px-5 py-2.5 rounded-md text-lg hover:bg-gray-200 transition w-full text-center">
                Ver más
            </a>
        </div>

    </div>

    <!-- Sección de nosotros -->
    <div class="mx-auto max-w-screen-xl px-4 py-16">
        <!-- Título centrado -->
        <h2 class="text-3xl font-semibold mb-8">Acerca de Nosotros</h2>

        <!-- Contenedor de dos columnas -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-20 items-center">
            <!-- Columna con imagen -->
            <div>
                <div class="relative bg-blue-100 rounded-tl-[6rem] w-[95%] h-96 mx-auto mt-10 sm:w-full">
                    <picture>
                        <source srcset="build/img/aboutUs.webp" type="image/webp">
                        <source srcset="build/img/aboutUs.jpg" type="image/jpeg">
                        <img loading="lazy"
                             class="absolute top-20 left-1/2 transform -translate-x-1/2 w-80 h-80 sm:translate-x-12 sm:w-96 sm:h-96 sm:left-[12rem] sm:top-8 rounded-xl object-cover shadow-lg"
                             src="/build/img/aboutUs.png" alt="about us">
                    </picture>
                </div>
            </div>

            <!-- Columna con texto -->
            <div>
                <p class="text-lg leading-relaxed">
                    El <span
                            class="font-semibold"> Centro de Recursos para la Gestión del Conocimiento de ASONOG </span>
                    es una plataforma digital de acceso
                    público e institucional que alberga una valiosa colección de recursos informativos enfocados en
                    la
                    <span class="font-semibold"> defensa de los derechos humanos, la equidad de género e inclusión, defensa del territorio y el medio
                    ambiente</span>, así como el fortalecimiento institucional y la gestión de riesgos, entre otros
                    temas. El
                    CRGC sido creado con el propósito de preservar y difundir herramientas para promover la gestión
                    del
                    conocimiento de los usuarios.
                </p>

                <a href="/nosotros">
                    <button class="hover:brightness-110 hover:animate-pulse
                font-bold py-3 px-6 rounded-full bg-primary-500 shadow-lg shadow-primary-500/50 text-white mx-auto flex justify-center mt-12">
                        Conoce más
                    </button>
                </a>
            </div>

        </div>
    </div>

    <!-- Sección de contacto -->
    <section class="mx-auto max-w-screen-xl px-4 py-16">
        <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
            <h2 class="mb-4 text-4xl tracking-tight font-semibold text-center text-gray-900">Contactanos</h2>
            <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Si tienes
                dudas
                o consultas, puedes contactarnos a través de nuestro formulario de contacto.</p>
            <form action="#" class="space-y-8">
                <div>
                    <label for="email" class="block mb-2 font-medium text-gray-900 dark:text-gray-300">Tu
                        email</label>
                    <input type="email" id="email"
                           class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-medium rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 "
                           placeholder="correo@correo.com" required>
                </div>
                <div>
                    <label for="subject"
                           class="block mb-2 font-medium text-gray-900 dark:text-gray-300">Tema</label>
                    <input type="text" id="subject"
                           class="block p-3 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                           placeholder="¿En qué te podemos ayudar?" required>
                </div>
                <div class="sm:col-span-2">
                    <label for="message" class="block mb-2 font-medium text-gray-900 dark:text-gray-400">Tu
                        mensaje</label>
                    <textarea id="message" rows="6"
                              class="block p-2.5 w-full text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                              placeholder="Dejanos un mensaje..."></textarea>
                </div>
                <div class="bg-primary-500 py-3 px-5 font-medium text-center text-white rounded-lg hover:bg-primary-300 sm:w-fit">


                    <button type="submit"
                            class="bg-primary-500 focus:ring-4 focus:outline-none focus:ring-primary-300 ">
                        Enviar mensajes
                    </button>
                </div>
            </form>
        </div>
    </section>


</section>