<?php include( $root . '/resources/layout/dashboard/head.php' );?>
<body class="w-screen h-screen overflow-hidden bg-ms-white">
    <?php include( $root . '/resources/layout/dashboard/header.php' );?>
    <main class="w-full h-full grid grid-cols-12">
        <?php include( $root . '/resources/layout/dashboard/sidebar.php' );?>
        <section class="col-span-10 pb-24 overflow-auto">
            <div class="p-4 border-b mx-2">
                <h1 class=" text-2xl font-medium">Newsletter</h1>
            </div>
            <form action="/dashboard/newsletter/store/" method="POST" class="mt-6 w-full flex flex-col items-center gap-6">

                <section class="w-3xl flex flex-col gap-4 justify-center">
                    <label for="object">Object<span class="text-ms-purple">*</span></label>
                    <div class="border border-ms-purple px-8 py-2 rounded-md">
                        <input id="object" type="text" name="object" class="w-full h-full outline-hidden focus:outline-hidden focus:ring-0 focus:border-transparent" placeholder="Entrez un Object">
                    </div>
                </section>

                <section class="w-3xl flex flex-col gap-4 justify-center">
                    <label for="title">Titre<span class="text-ms-purple">*</span></label>
                    <div class="border border-ms-purple px-8 py-2 rounded-md">
                        <input id="title" type="title" name="title" class="w-full h-full outline-hidden focus:outline-hidden focus:ring-0 focus:border-transparent" placeholder="Entrez un Titre">
                    </div>
                </section>

                <section class="w-3xl flex flex-col gap-4 justify-center">
                    <label for="content">content<span class="text-ms-purple">*</span></label>
                    <div class="border border-ms-purple p-1 rounded-md">
                        <textarea id="content" type="content" name="content" class="w-full h-full outline-hidden focus:outline-hidden focus:ring-0 focus:border-transparent"></textarea>
                    </div>
                </section>

                <section class="w-3xl flex flex-col gap-4 justify-center">
                    <label for="action">Nom de l'action</label>
                    <div class="border border-ms-purple px-8 py-2 rounded-md">
                        <input id="action" type="action" name="action" class="w-full h-full outline-hidden focus:outline-hidden focus:ring-0 focus:border-transparent" placeholder="Entrez un nom pour l'Action">
                    </div>
                </section>

                <section class="w-3xl flex flex-col gap-4 justify-center">
                    <label for="url">Url de l'action</label>
                    <div class="border border-ms-purple px-8 py-2 rounded-md">
                        <input id="url" type="url" name="url" class="w-full h-full outline-hidden focus:outline-hidden focus:ring-0 focus:border-transparent" placeholder="Entrez une Url pour l'action">
                    </div>
                </section>

                <button type="submit" class="w-3xl py-2 bg-ms-purple rounded-md hover:underline text-ms-white">Créer & Envoyer</button>
            </form>
        </section>
    </main>
</body>
</html>