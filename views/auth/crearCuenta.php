<section class="w-full mx-auto">

    <a href="/admin" class="underline text-lg">&larr; Volver</a>

    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <h1 class="text-2xl font-bold leading-tight tracking-tight text-gray-900 mb-8 md:text-2xl">
            Crear una nueva cuenta
        </h1>

        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">

                <?php
                include_once __DIR__ . "/../templates/alertas.php";
                ?>

                <form class="space-y-4 md:space-y-6" action="/crear-cuenta" method="post">
                    <div>
                        <label for="correo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ingresa
                            el email del usuario <span class="text-red-500" >*</span> </label>
                        <input type="email" name="correo" id="correo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600
                        focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                        dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="correo@correo.com" required="">
                    </div>

                    <div>
                        <label for="nombreUsuario" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ingresa
                            el nombre del usuario <span class="text-gray-400">(Opcional)</span></label>
                        <input type="text" name="nombre" id="nombre"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            placeholder="Carlos">
                    </div>

                    <div>
                        <label for="apellido" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ingresa
                            el apellido del usuario <span class="text-gray-400">(Opcional)</span></label>
                        <input type="text" name="apellido" id="apellido" <
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600
                        focus:border-primary-600 block w-full p-2.5 "
                            placeholder="Martinez">
                    </div>

                    <div>
                        <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ingresa
                            el telefono del usuario <span class="text-gray-400">(Opcional)</span></label>
                        <input type="tel" name="telefono" id="telefono" maxlength="8"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="123456789">
                    </div>

                    <div>
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona
                            el rol del usuario</label>

                        <select name="rol" id="rol"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                            <?php foreach ($roles as $role) : ?>
                                <option value="<?php echo $role->id; ?>"><?php echo $role->nombre; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mt-10 text-sm text-gray-400 ">
                        <h2>Al crear la cuenta, el usuario recibira un mensaje a su correo para activar su cuenta.</h2>
                    </div>

                    <div class="bg-primary-500 hover:bg-primary-300 font-medium rounded-lg">
                        <button type="submit"
                            class="w-full text-white text-sm px-5 py-2.5 text-center ">
                            Crear cuenta
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>