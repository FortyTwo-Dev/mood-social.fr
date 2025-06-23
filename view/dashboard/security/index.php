<?php include( $root . '/resources/layout/dashboard/head.php' );?>
<body class="w-screen h-screen overflow-hidden bg-ms-white">

<?php include( $root . '/resources/layout/dashboard/header.php' );?>

    <main class="w-full h-full grid grid-cols-12">
        <?php include( $root . '/resources/layout/dashboard/sidebar.php' );?>

        <section class="col-span-10 mb-16 overflow-auto">
            <div class="p-4 border-b mx-2 flex items-center justify-between">
                <h1 class="text-2xl font-medium">Captchas</h1>
                <a href="/dashboard/security/captcha/create/" class="p-2 bg-ms-red text-ms-white rounded-md font-semibold">Ajouter un captcha</a>
            </div>
            <div class="overflow-x-auto mx-2">
                <table class="min-w-full divide-y divide-ms-grey">
                    <thead class="">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-base font-bold text-ms-black uppercase tracking-wider">
                                Nom
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-base font-bold text-ms-black uppercase tracking-wider">
                                Question
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-base font-bold text-ms-black uppercase tracking-wider">
                                Réponse
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-base font-bold text-ms-black uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-ms-grey">

                        <?php foreach($captchas as $captcha): ?>
                            <tr class="hover:bg-ms-grey/10">
                                <td class="px-6 py-4 whitespace-nowrap font-medium"><?=$captcha->title?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?=$captcha->question?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?=$captcha->answer?></td>
                                <td class="px-6 py-4 whitespace-nowrap flex gap-4">

                                    <a href="/dashboard/security/captcha/edit/?id=<?=$captcha->id?>" class="text-ms-blue font-medium hover:underline">Modifier</a>

                                    <form action="/dashboard/security/captcha/delete/?id=<?=$captcha->id?>" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');"><button type="submit" class="text-ms-red font-medium hover:underline cursor-pointer">Supprimer</button></form>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>