<section class="bg-gray-50 md:w-1/2 mx-auto">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
        </a>
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Inicia sesión en tu cuenta
                </h1>

                <p class="text-gray-400">Si eres parte de nuestra organizacion puedes acceder a nuestros recursos de
                    forma online.</p>
                <?php
                include_once __DIR__ . "/../templates/alertas.php";
                ?>

                <form class="space-y-4 md:space-y-6" action="/login" method="post">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tu
                            email</label>
                        <input type="email" name="correo" id="email"
                               class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="correo@asonog.com"
                               required=""
                               value="<?= $userEmail ?? '' ?>">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                        <div class="relative">
                            <input type="password" name="contrasena" id="password" placeholder="••••••••"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   required="">
                            <button type="button" id="togglePassword"
                                    class="absolute right-2 top-2 text-gray-600 dark:text-gray-400">
                                <i class="fas fa-eye mr-2 mx-auto text-center"></i>
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center justify-end">

                        <a href="/olvide" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">¿Olvidaste
                            tu contraseña?</a>
                    </div>

                    <div class="w-full text-white bg-primary-500 hover:bg-primary-300 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <button type="submit"
                                class="w-full text-white bg-primary-500 hover:bg-primary-300 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Ingresar
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

<script src="/build/js/login/show_password_input.js"></script>
