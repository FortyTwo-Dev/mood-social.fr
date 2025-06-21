<?php include($root . '/resources/layout/dashboard/head.php'); ?>

<body class="w-screen h-screen overflow-hidden bg-ms-white">

    <?php include($root . '/resources/layout/dashboard/header.php'); ?>

    <main class="w-full h-full grid grid-cols-12">
        <?php include($root . '/resources/layout/dashboard/sidebar.php'); ?>

        <section class="col-span-10 mb-16 overflow-auto">
            <div class="p-4 border-b mx-2 flex items-center justify-between">
                <h1 class="text-2xl font-medium">Ajouté une image</h1>
                <a href="/dashboard/profil/" class="p-2 bg-ms-red text-ms-white rounded-md font-semibold">Retour</a>
            </div>

            <form action="/dashboard/profil/custom/store/" method="POST" enctype="multipart/form-data" class="mt-6 w-full flex flex-col items-center gap-6">

                <input type="hidden" name="id" id="hiddenId" />

                <div class="flex flex-col items-center justify-center rounded-lg border-4 border-dashed border-gray-300 px-4 py-10 hover:border-blue-400 transition-all duration-300" id="dropZone">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400 mb-4">
                        <path d="M10.3 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10l-3.1-3.1a2 2 0 0 0-2.814.014L6 21" />
                        <path d="m14 19.5 3-3 3 3" />
                        <path d="M17 22v-5.5" />
                        <circle cx="9" cy="9" r="2" />
                    </svg>
                    <p class="mt-4 text-center text-xl font-medium text-gray-800">
                        Déposez vos fichiers ici ou
                        <label class="shadow-blue-100 mt-2 inline-block rounded-full border bg-white px-4 py-2 font-normal text-shadow-ms-black shadow hover:bg-blue-50 cursor-pointer transition-all">
                            <input class="hidden" type="file" name="image" id="imageInput" accept="image/*" required />
                            parcourir
                        </label>
                    </p>
                    <div id="fileInfo" class="mt-2 text-sm text-gray-600"></div>
                </div>
                <div id="fileName" class="mt-2 text-sm text-gray-600"></div>

                <div id="previewContainer" class="mt-4 hidden flex flex-col items-center">
                    <img id="imagePreview" src="" alt="Aperçu" class="w-32 h-32 object-contain rounded border" />
                    <p class="text-green-600 mt-2 font-medium">Image chargée avec succès ✅</p>
                </div>



                <section class="w-3xl flex flex-col gap-4 justify-center">
                    <label for="category">Catégorie<span class="text-ms-red">*</span></label>
                    <div class="border border-ms-red px-8 py-2 rounded-md bg-white">
                        <select id="category" name="category" class="w-full h-full outline-none focus:outline-none focus:ring-0 focus:border-transparent bg-transparent" required>
                            <option value="">Sélectionnez une catégorie</option>
                            <option value="beard">Beard</option>
                            <option value="hat">Hat</option>
                            <option value="head">Head</option>
                        </select>
                    </div>
                </section>

                <button type="submit" class="w-3xl py-3 bg-ms-red rounded-md hover:bg-red-700 hover:underline text-ms-white font-medium transition-all duration-300">
                    Créer
                </button>
            </form>

        </section>
        <script src="/resources/js/profil_dashboard.js"></script>
    </main>
</body>

</html>