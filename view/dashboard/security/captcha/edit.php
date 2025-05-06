<?php include( $root . '/resources/layout/dashboard/head.php' );?>
<body class="w-screen h-screen overflow-hidden bg-ms-white">

<?php include( $root . '/resources/layout/dashboard/header.php' );?>

    <main class="w-full h-full grid grid-cols-12">
        <?php include( $root . '/resources/layout/dashboard/sidebar.php' );?>

        <section class="col-span-10 mb-16 overflow-auto">
            <div class="p-4 border-b mx-2 flex items-center justify-between">
                <h1 class="text-2xl font-medium">Modifier le captcha</h1>
                <a href="/dashboard/security/" class="p-2 bg-ms-red text-ms-white rounded-md font-semibold">Retour</a>
            </div>

            <form action="/dashboard/security/captcha/update/?id=<?=$captcha->id?>" method="POST" class="mt-6 w-full flex flex-col items-center gap-6">

                <section class="w-3xl flex flex-col gap-4 justify-center">
                    <label for="title">Nom<span class="text-ms-red">*</span></label>
                    <div class="border border-ms-red px-8 py-2 rounded-md">
                        <input id="title" type="title" name="title" class="w-full h-full outline-hidden focus:outline-hidden focus:ring-0 focus:border-transparent" placeholder="Entrez un nom" value="<?=$captcha->title?>">
                    </div>
                </section>

                <section class="w-3xl flex flex-col gap-4 justify-center">
                    <label for="content">Couleur<span class="text-ms-red">*</span></label>
                    <div class="border border-ms-red px-8 py-2 rounded-md">
                        <input id="content" type="content" name="content" class="w-full h-full outline-hidden focus:outline-hidden focus:ring-0 focus:border-transparent" placeholder="Entrez une couleur" value="<?=$captcha->content?>">
                    </div>
                </section>

                <section class="w-3xl flex flex-col gap-4 justify-center">
                    <label for="question">Question<span class="text-ms-red">*</span></label>
                    <div class="border border-ms-red px-8 py-2 rounded-md">
                        <input id="question" type="question" name="question" class="w-full h-full outline-hidden focus:outline-hidden focus:ring-0 focus:border-transparent" placeholder="Entrez une question" value="<?=$captcha->question?>">
                    </div>
                </section>

                <section class="w-3xl flex flex-col gap-4 justify-center">
                    <label for="answer">Réponse<span class="text-ms-red">*</span></label>
                    <div class="border border-ms-red px-8 py-2 rounded-md">
                        <input id="answer" type="answer" name="answer" class="w-full h-full outline-hidden focus:outline-hidden focus:ring-0 focus:border-transparent" placeholder="Entrez une réponse" value="<?=$captcha->answer?>">
                    </div>
                </section>

                <button type="submit" class="w-3xl py-2 bg-ms-red rounded-md hover:underline text-ms-white">Modifier</button>
                
            </form>

        </section>
    </main>
</body>
</html>