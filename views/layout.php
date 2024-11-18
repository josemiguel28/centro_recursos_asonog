<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro de recursos para la gestión del conocimiento</title>
    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!--google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
          rel="stylesheet">
    <!-- tailwind css link-->
    <link rel="stylesheet" href="/build/css/output.css">
    <!--AOS transitions
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    -->

    <!--Flowbite css link-->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet"/>


</head>

<body class="font-poppins">

<!-- barra de navegacion -->
<nav class="bg-white py-5 start-0 border-b sticky top-0 z-50 shadow-md">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <a
                    class="text-sm font-medium bg-primary-500 hover:bg-primary-400 transition text-white py-3 px-6 rounded-full"
                    href="#">
                Contactanos
            </a>

            <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 transition duration-300 ease-in-out"
                    aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Abrir el menú</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="/"
                       class="block py-2 px-3 text-gray-900 rounded md:bg-transparent md:p-0"
                       aria-current="page">Inicio</a>
                </li>
                <li>
                    <a href="/nosotros"
                       class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-secondary-400 md:p-0">Nosotros</a>
                </li>
                <li>
                    <a href="/biblioteca"
                       class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-secondary-400 md:p-0 ">Biblioteca</a>
                </li>

                <?php if (isset($_SESSION['login'])): ?>
                    <?php if ($_SESSION['rol'] === "1"): ?>
                        <li>
                            <a href="/colaborador"
                               class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-secondary-400 md:p-0">
                                Centro de Recursos
                            </a>
                        </li>
                        <li>
                            <a href="/admin"
                               class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-secondary-400 md:p-0">
                                Panel de administración
                            </a>
                        </li>

                    <?php elseif ($_SESSION['rol'] === "2"): ?>
                        <li>
                            <a href="/colaborador"
                               class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-secondary-400 md:p-0">
                                Centro de Recursos
                            </a>
                        </li>
                    <?php endif; ?>

                    <li>
                        <a href="/logout"
                           class="block py-2 px-3 text-red-600 rounded hover:bg-red-300 md:hover:bg-transparent md:hover:text-secondary-400 md:p-0 end-0">
                            Cerrar sesión
                        </a>
                    </li>

                <?php else: ?>
                    <li>
                        <a href="/login"
                           class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-secondary-400 md:p-0">
                            Repositorio Institucional
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="mt-20 mb-16 mx-auto max-w-screen-xl">
    <?php echo $contenido; ?>
</div>

<hr>

<footer class="font-sans tracking-wide bg-[#181818] py-12 px-16 rounded-t-xl text-white sm:mx-4 sm:my-4 sm:py-16 sm:rounded-xl">
    <div class="grid lg:grid-cols-2 gap-20 mx-auto max-md:grid-cols-1">
        <div>
            <h4 class="text-white font-bold text-xl">Centro de Recursos para la Gestión del conocimiento</h4>
            <ul class="grid sm:grid-cols-2 mt-12 gap-8">
                <!-- Teléfono -->
                <li class="flex items-center">
                    <div class="bg-[#343538] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill='#fff'
                             viewBox="0 0 482.6 482.6">
                            <path
                                    d="M98.339 320.8c47.6 56.9 104.9 101.7 170.3 133.4 24.9 11.8 58.2 25.8 95.3 28.2 2.3.1 4.5.2 6.8.2 24.9 0 44.9-8.6 61.2-26.3.1-.1.3-.3.4-.5 5.8-7 12.4-13.3 19.3-20 4.7-4.5 9.5-9.2 14.1-14 21.3-22.2 21.3-50.4-.2-71.9l-60.1-60.1c-10.2-10.6-22.4-16.2-35.2-16.2-12.8 0-25.1 5.6-35.6 16.1l-35.8 35.8c-3.3-1.9-6.7-3.6-9.9-5.2-4-2-7.7-3.9-11-6-32.6-20.7-62.2-47.7-90.5-82.4-14.3-18.1-23.9-33.3-30.6-48.8 9.4-8.5 18.2-17.4 26.7-26.1 3-3.1 6.1-6.2 9.2-9.3 10.8-10.8 16.6-23.3 16.6-36s-5.7-25.2-16.6-36l-29.8-29.8c-3.5-3.5-6.8-6.9-10.2-10.4-6.6-6.8-13.5-13.8-20.3-20.1-10.3-10.1-22.4-15.4-35.2-15.4-12.7 0-24.9 5.3-35.6 15.5l-37.4 37.4c-13.6 13.6-21.3 30.1-22.9 49.2-1.9 23.9 2.5 49.3 13.9 80 17.5 47.5 43.9 91.6 83.1 138.7zm-72.6-216.6c1.2-13.3 6.3-24.4 15.9-34l37.2-37.2c5.8-5.6 12.2-8.5 18.4-8.5 6.1 0 12.3 2.9 18 8.7 6.7 6.2 13 12.7 19.8 19.6 3.4 3.5 6.9 7 10.4 10.6l29.8 29.8c6.2 6.2 9.4 12.5 9.4 18.7s-3.2 12.5-9.4 18.7c-3.1 3.1-6.2 6.3-9.3 9.4-9.3 9.4-18 18.3-27.6 26.8l-.5.5c-8.3 8.3-7 16.2-5 22.2.1.3.2.5.3.8 7.7 18.5 18.4 36.1 35.1 57.1 30 37 61.6 65.7 96.4 87.8 4.3 2.8 8.9 5 13.2 7.2 4 2 7.7 3.9 11 6 .4.2.7.4 1.1.6 3.3 1.7 6.5 2.5 9.7 2.5 8 0 13.2-5.1 14.9-6.8l37.4-37.4c5.8-5.8 12.1-8.9 18.3-8.9 7.6 0 13.8 4.7 17.7 8.9l60.3 60.2c12 12 11.9 25-.3 37.7-4.2 4.5-8.6 8.8-13.3 13.3-7 6.8-14.3 13.8-20.9 21.7-11.5 12.4-25.2 18.2-42.9 18.2-1.7 0-3.5-.1-5.2-.2-32.8-2.1-63.3-14.9-86.2-25.8-62.2-30.1-116.8-72.8-162.1-127-37.3-44.9-62.4-86.7-79-131.5-10.3-27.5-14.2-49.6-12.6-69.7z"
                                    data-original="#000000"/>
                        </svg>
                    </div>
                    <a href="tel:+50426622626" class="text-gray-100 text-sm ml-4">
                        <small class="block">Tel</small>
                        <strong>+(504) 2662-2626</strong>
                    </a>
                </li>
                <!-- Correo -->
                <li class="flex items-center">
                    <div class="bg-[#343538] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill='#fff'
                             viewBox="0 0 479.058 479.058">
                            <path
                                    d="M434.146 59.882H44.912C20.146 59.882 0 80.028 0 104.794v269.47c0 24.766 20.146 44.912 44.912 44.912h389.234c24.766 0 44.912-20.146 44.912-44.912v-269.47c0-24.766-20.146-44.912-44.912-44.912zm0 29.941c2.034 0 3.969.422 5.738 1.159L239.529 264.631 39.173 90.982a14.902 14.902 0 0 1 5.738-1.159zm0 299.411H44.912c-8.26 0-14.971-6.71-14.971-14.971V122.615l199.778 173.141c2.822 2.441 6.316 3.655 9.81 3.655s6.988-1.213 9.81-3.655l199.778-173.141v251.649c-.001 8.26-6.711 14.97-14.971 14.97z"
                                    data-original="#000000"/>
                        </svg>
                    </div>
                    <a href="mailto:comunicacion@asonog.hn" class="text-gray-100 text-sm ml-4">
                        <small class="block">Mail</small>
                        <strong>comunicacion@asonog.hn</strong>
                    </a>
                </li>
                <!-- Ubicación -->
                <li class="flex items-center">
                    <div class="bg-[#343538] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill='#fff'
                             viewBox="0 0 1024 1024">
                            <path fill="#fff"
                                  d="M800 416a288 288 0 1 0-576 0c0 118.144 94.528 272.128 288 456.576C705.472 688.128 800 534.144 800 416M512 960C277.312 746.688 160 565.312 160 416a352 352 0 0 1 704 0c0 149.312-117.312 330.688-352 544"/>
                            <path fill="#fff"
                                  d="M512 512a96 96 0 1 0 0-192a96 96 0 0 0 0 192m0 64a160 160 0 1 1 0-320a160 160 0 0 1 0 320"/>
                        </svg>
                    </div>
                    <a href="https://www.google.com/maps?q=ASONOG,+Barrio+El+Calvario,+Santa+Rosa+de+Copán,+Honduras"
                       target="_blank" class="text-gray-100 text-sm ml-4">
                        <small class="block">Ubicación</small>
                        <strong>ASONOG, Barrio El Calvario, Santa Rosa de Copán, Honduras.</strong>
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <h4 class="text-gray-100 font-bold text-lg">Boletín Informativo</h4>
            <p class="text-sm mt-6 text-gray-300">¡Suscríbete a nuestro Boletín Trimestral “La Mensajera”!</p>

            <div class="bg-[#343538] flex px-2 py-1 rounded-full mt-12">
                <input type='email' placeholder='Ingresa tu email'
                       class="w-full outline-none text-gray-300 text-sm bg-transparent pl-4 border-0"/>
                <button type='button'
                        class="bg-gray-100 hover:bg-white transition-all text-gray-600 font-semibold text-sm rounded-full px-5 py-2 ml-4">
                    Enviar
                </button>
            </div>
            <ul class="flex items-center justify-center mt-8 space-x-4 flex-wrap md:flex md:justify-end">
                <li class="bg-[#343538] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                    <a href="https://www.facebook.com/ASONOG" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill='#fff'
                             viewBox="0 0 24 24">
                            <path
                                    d="M6.812 13.937H9.33v9.312c0 .414.335.75.75.75l4.007.001a.75.75 0 0 0 .75-.75v-9.312h2.387a.75.75 0 0 0 .744-.657l.498-4a.75.75 0 0 0-.744-.843h-2.885c.113-2.471-.435-3.202 1.172-3.202 1.088-.13 2.804.421 2.804-.75V.909a.75.75 0 0 0-.648-.743A26.926 26.926 0 0 0 15.071 0c-7.01 0-5.567 7.772-5.74 8.437H6.812a.75.75 0 0 0-.75.75v4c0 .414.336.75.75.75zm.75-3.999h2.518a.75.75 0 0 0 .75-.75V6.037c0-2.883 1.545-4.536 4.24-4.536.878 0 1.686.043 2.242.087v2.149c-.402.205-3.976-.884-3.976 2.697v2.755c0 .414.336.75.75.75h2.786l-.312 2.5h-2.474a.75.75 0 0 0-.75.75V22.5h-2.505v-9.312a.75.75 0 0 0-.75-.75H7.562z"
                                    data-original="#000000"/>
                        </svg>
                    </a>
                </li>
                <li class="bg-[#343538] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                    <a href="jhttps://www.linkedin.com/company/asonog" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill='#fff'
                             viewBox="0 0 511 512">
                            <path
                                    d="M111.898 160.664H15.5c-8.285 0-15 6.719-15 15V497c0 8.285 6.715 15 15 15h96.398c8.286 0 15-6.715 15-15V175.664c0-8.281-6.714-15-15-15zM96.898 482H30.5V190.664h66.398zM63.703 0C28.852 0 .5 28.352.5 63.195c0 34.852 28.352 63.2 63.203 63.2 34.848 0 63.195-28.352 63.195-63.2C126.898 28.352 98.551 0 63.703 0zm0 96.395c-18.308 0-33.203-14.891-33.203-33.2C30.5 44.891 45.395 30 63.703 30c18.305 0 33.195 14.89 33.195 33.195 0 18.309-14.89 33.2-33.195 33.2zm289.207 62.148c-22.8 0-45.273 5.496-65.398 15.777-.684-7.652-7.11-13.656-14.942-13.656h-96.406c-8.281 0-15 6.719-15 15V497c0 8.285 6.719 15 15 15h96.406c8.285 0 15-6.715 15-15V320.266c0-22.735 18.5-41.23 41.235-41.23 22.734 0 41.226 18.495 41.226 41.23V497c0 8.285 6.719 15 15 15h96.403c8.285 0 15-6.715 15-15V302.066c0-79.14-64.383-143.523-143.524-143.523zM466.434 482h-66.399V320.266c0-39.278-31.953-71.23-71.226-71.23-39.282 0-71.239 31.952-71.239 71.23V482h-66.402V190.664h66.402v11.082c0 5.77 3.309 11.027 8.512 13.524a15.01 15.01 0 0 0 15.875-1.82c20.313-16.294 44.852-24.907 70.953-24.907 62.598 0 113.524 50.926 113.524 113.523zm0 0"
                                    data-original="#000000"/>
                        </svg>
                    </a>
                </li>
                <li class="bg-[#343538] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                    <a href="https://www.youtube.com/@asonog8695" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill='#fff'
                             viewBox="0 0 682.667 682.667">
                            <defs>
                                <clipPath id="a" clipPathUnits="userSpaceOnUse">
                                    <path d="M0 512h512V0H0Z" data-original="#fff"/>
                                </clipPath>
                            </defs>
                            <g fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                               stroke-miterlimit="10"
                               stroke-width="40" clip-path="url(#a)" transform="matrix(1.33 0 0 -1.33 0 682.667)">
                                <path
                                        d="M492 255.75c0-39.49-3.501-75.479-7.497-103.698-5.191-36.655-34.801-64.96-71.646-68.567C373.764 79.658 318.529 75.75 256 75.75c-62.529 0-117.764 3.908-156.857 7.735-36.845 3.607-66.455 31.912-71.646 68.567C23.501 180.271 20 216.26 20 255.75c0 39.49 3.501 75.479 7.497 103.698 5.191 36.655 34.801 64.96 71.646 68.567 39.093 3.827 94.328 7.735 156.857 7.735 62.529 0 117.764-3.908 156.857-7.735 36.845-3.607 66.455-31.912 71.646-68.567C488.499 331.229 492 295.24 492 255.75Z"
                                        data-original="#000000"/>
                                <path
                                        d="m245.5 185.291 75.914 45.165c19.448 11.57 19.448 39.518 0 51.088L245.5 326.709c-20.024 11.913-45.5-2.39-45.5-25.544v-90.33c0-23.154 25.476-37.457 45.5-25.544Z"
                                        data-original="#000000"/>
                            </g>
                        </svg>
                    </a>
                </li>
                <li class="bg-[#343538] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                    <a href="https://www.instagram.com/asonog_honduras/" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill='#fff'
                             viewBox="0 0 24 24">
                            <path
                                    d="M12 9.3a2.7 2.7 0 1 0 0 5.4 2.7 2.7 0 0 0 0-5.4Zm0-1.8a4.5 4.5 0 1 1 0 9 4.5 4.5 0 0 1 0-9Zm5.85-.225a1.125 1.125 0 1 1-2.25 0 1.125 1.125 0 0 1 2.25 0ZM12 4.8c-2.227 0-2.59.006-3.626.052-.706.034-1.18.128-1.618.299a2.59 2.59 0 0 0-.972.633 2.601 2.601 0 0 0-.634.972c-.17.44-.265.913-.298 1.618C4.805 9.367 4.8 9.714 4.8 12c0 2.227.006 2.59.052 3.626.034.705.128 1.18.298 1.617.153.392.333.674.632.972.303.303.585.484.972.633.445.172.918.267 1.62.3.993.047 1.34.052 3.626.052 2.227 0 2.59-.006 3.626-.052.704-.034 1.178-.128 1.617-.298.39-.152.674-.333.972-.632.304-.303.485-.585.634-.972.171-.444.266-.918.299-1.62.047-.993.052-1.34.052-3.626 0-2.227-.006-2.59-.052-3.626-.034-.704-.128-1.18-.299-1.618a2.619 2.619 0 0 0-.633-.972 2.595 2.595 0 0 0-.972-.634c-.44-.17-.914-.265-1.618-.298-.993-.047-1.34-.052-3.626-.052ZM12 3c2.445 0 2.75.009 3.71.054.958.045 1.61.195 2.185.419A4.388 4.388 0 0 1 19.49 4.51c.457.45.812.994 1.038 1.595.222.573.373 1.227.418 2.185.042.96.054 1.265.054 3.71 0 2.445-.009 2.75-.054 3.71-.045.958-.196 1.61-.419 2.185a4.395 4.395 0 0 1-1.037 1.595 4.44 4.44 0 0 1-1.595 1.038c-.573.222-1.227.373-2.185.418-.96.042-1.265.054-3.71.054-2.445 0-2.75-.009-3.71-.054-.958-.045-1.61-.196-2.185-.419A4.402 4.402 0 0 1 4.51 19.49a4.414 4.414 0 0 1-1.037-1.595c-.224-.573-.374-1.227-.419-2.185C3.012 14.75 3 14.445 3 12c0-2.445.009-2.75.054-3.71s.195-1.61.419-2.185A4.392 4.392 0 0 1 4.51 4.51c.45-.458.994-.812 1.595-1.037.574-.224 1.226-.374 2.185-.419C9.25 3.012 9.555 3 12 3Z">
                            </path>
                        </svg>
                    </a>
                </li>

                <li class="bg-[#343538] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                    <a href="https://www.tiktok.com/@asonog" target="_blank">

                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill='#fff'
                             viewBox="0 0 24 24">
                            <mask id="IconifyId1932760fa64d20ccb5">
                                <g fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                                   stroke-width="2">
                                    <path fill="#fff" stroke="none"
                                          d="M16.6 5.82c-0.68 -0.78 -1.06 -1.78 -1.06 -2.82h-3.09v12.4c-0.02 0.67 -0.31 1.31 -0.79 1.77c-0.48 0.47 -1.13 0.73 -1.8 0.73c-1.42 0 -2.6 -1.16 -2.6 -2.6c0 -1.72 1.66 -3.01 3.37 -2.48v-3.16c-3.45 -0.46 -6.47 2.22 -6.47 5.64c0 3.33 2.76 5.7 5.69 5.7c3.14 0 5.69 -2.55 5.69 -5.7v-6.29c1.25 0.9 2.76 1.38 4.3 1.38v-3.09c0 0 -1.88 0.09 -3.24 -1.48Z"/>
                                    <path stroke="#000" stroke-dasharray="36" stroke-dashoffset="72" stroke-width="4"
                                          d="M11 11h-1c-2.21 0 -4.5 1.79 -4.5 4c0 2.21 1.5 4.5 4.5 4.5c2.21 0 4 -2.29 4 -4.5v-12.5">
                                        <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s"
                                                 values="72;36"/>
                                    </path>
                                    <path stroke="#000" stroke-dasharray="10" stroke-dashoffset="20" stroke-width="4"
                                          d="M18 2.5v8">
                                        <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.5s" dur="0.1s"
                                                 values="20;10"/>
                                    </path>
                                </g>
                            </mask>
                            <rect width="24" height="24" fill="#fff" mask="url(#IconifyId1932760fa64d20ccb5)"/>
                        </svg>
                    </a>
                </li>

                <li class="bg-[#343538] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                    <a href="https://x.com/AsonogOficial" target="_blank">

                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill='#fff'
                             viewBox="0 0 24 24">
                            <path fill="#fff"
                                  d="M8.5 2h2.5L11 2h-2.5zM13 2h2.5L15.5 2h-2.5zM10.5 2h5v0h-5zM8.5 2h5v0h-5zM10 2h3.5L13.5 2h-3.5z">
                                <animate fill="freeze" attributeName="d" dur="0.8s" keyTimes="0;0.3;0.5;1"
                                         values="M8.5 2h2.5L11 2h-2.5zM13 2h2.5L15.5 2h-2.5zM10.5 2h5v0h-5zM8.5 2h5v0h-5zM10 2h3.5L13.5 2h-3.5z;M8.5 2h2.5L11 22h-2.5zM13 2h2.5L15.5 22h-2.5zM10.5 2h5v2h-5zM8.5 20h5v2h-5zM10 2h3.5L13.5 22h-3.5z;M8.5 2h2.5L11 22h-2.5zM13 2h2.5L15.5 22h-2.5zM10.5 2h5v2h-5zM8.5 20h5v2h-5zM10 2h3.5L13.5 22h-3.5z;M1 2h2.5L18.5 22h-2.5zM5.5 2h2.5L23 22h-2.5zM3 2h5v2h-5zM16 20h5v2h-5zM18.5 2h3.5L5 22h-3.5z"/>
                            </path>
                        </svg>
                    </a>
                </li>

                <li class="bg-[#343538] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                    <a href="https://open.spotify.com/show/6WZ4EBVvxoRgtfxbaNbyEP?si=727eb76f4e3b40f8&nd=1&dlsi=1479f1640e734e64"
                       target="_blank">

                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill='#fff'
                             viewBox="0 0 24 24">
                            <g fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                               stroke-width="1.5">
                                <path stroke-dasharray="64" stroke-dashoffset="64"
                                      d="M2 12c0 -5.52 4.48 -10 10 -10c5.52 0 10 4.48 10 10c0 5.52 -4.48 10 -10 10c-5.52 0 -10 -4.48 -10 -10Z">
                                    <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="64;0"/>
                                </path>
                                <path stroke-dasharray="8" stroke-dashoffset="8"
                                      d="M8.63 15.31c2.18 -0.58 4.49 -0.34 6.5 0.69">
                                    <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.6s" dur="0.2s"
                                             values="8;0"/>
                                </path>
                                <path stroke-dasharray="12" stroke-dashoffset="12"
                                      d="M7.5 12.07c1.1 -0.37 2.28 -0.57 3.5 -0.57c2.02 0 3.92 0.55 5.55 1.5">
                                    <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.8s" dur="0.2s"
                                             values="12;0"/>
                                </path>
                                <path stroke-dasharray="14" stroke-dashoffset="14"
                                      d="M7 8.91c1.38 -0.59 2.9 -0.91 4.5 -0.91c2.41 0 4.65 0.74 6.5 2">
                                    <animate fill="freeze" attributeName="stroke-dashoffset" begin="1s" dur="0.2s"
                                             values="14;0"/>
                                </path>
                            </g>
                        </svg>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</footer>

<?php
echo $script ?? '';
?>

</body>
<!--Flowbite js link-->
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

<!--AOS transitions
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
-->
</html>