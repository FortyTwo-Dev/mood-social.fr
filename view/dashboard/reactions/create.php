<?php include( $root . '/resources/layout/dashboard/head.php' );?>
<body class="w-screen h-screen overflow-hidden bg-ms-white">

<?php include( $root . '/resources/layout/dashboard/header.php' );?>

    <main class="w-full h-full grid grid-cols-12">
        <?php include( $root . '/resources/layout/dashboard/sidebar.php' );?>

        <section class="col-span-10 mb-16 overflow-auto">
            <div class="p-4 border-b mx-2 flex items-center justify-between">
                <h1 class="text-2xl font-medium">Créer une reaction</h1>
                <a href="/dashboard/reactions/" class="p-2 bg-ms-yellow text-ms-black rounded-md font-semibold">Retour</a>
            </div>

            <form action="/dashboard/reactions/store/" method="POST" class="mt-6 w-full flex flex-col items-center gap-6">

                <section class="w-3xl flex flex-col gap-4 justify-center">
                    <label for="name">Nom<span class="text-ms-yellow">*</span></label>
                    <div class="border border-ms-yellow px-8 py-2 rounded-md">
                        <input id="name" type="name" name="name" class="w-full h-full outline-hidden focus:outline-hidden focus:ring-0 focus:border-transparent" placeholder="Entrez un nom">
                    </div>
                </section>

                <section class="w-3xl flex flex-col gap-4 justify-center">
                    <label for="emoji">icon<span class="text-ms-yellow">*</span> (format : svg)</label>
                    <div class="border border-ms-yellow px-8 py-2 rounded-md">
                        <input id="emoji" type="emoji" name="emoji" class="w-full h-full outline-hidden focus:outline-hidden focus:ring-0 focus:border-transparent" placeholder="<svg> ... </svg>">
                    </div>
                </section>

                <button type="submit" class="w-3xl py-2 bg-ms-yellow rounded-md hover:underline text-ms-black">Créer</button>
                
            </form>

        </section>
    </main>
</body>
</html>