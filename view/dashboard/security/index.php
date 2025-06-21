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
                        <!-- <tr class="hover:bg-ms-grey/10">
                            <td class="px-6 py-4 whitespace-nowrap font-medium">Jaune</td>
                            <td class="px-6 py-4 whitespace-nowrap">Quelle est cette couleur ?</td>
                            <td class="px-6 py-4 whitespace-nowrap">Jaune</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="#" class="text-ms-blue font-medium hover:underline mr-4">Edit</a>
                                <a href="#" class="text-ms-red font-medium hover:underline">Supprimer</a>
                            </td>
                        </tr>
                        <tr class="hover:bg-ms-grey/10">
                            <td class="px-6 py-4 whitespace-nowrap font-medium">Violet</td>
                            <td class="px-6 py-4 whitespace-nowrap">Quelle est cette couleur ?</td>
                            <td class="px-6 py-4 whitespace-nowrap">Violet</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="#" class="text-ms-blue font-medium hover:underline mr-4">Edit</a>
                                <a href="#" class="text-ms-red font-medium hover:underline">Supprimer</a>
                            </td>
                        </tr>
                        <tr class="hover:bg-ms-grey/10">
                            <td class="px-6 py-4 whitespace-nowrap font-medium">Rouge</td>
                            <td class="px-6 py-4 whitespace-nowrap">Quelle est cette couleur ?</td>
                            <td class="px-6 py-4 whitespace-nowrap">Rouge</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="#" class="text-ms-blue font-medium hover:underline mr-4">Edit</a>
                                <a href="#" class="text-ms-red font-medium hover:underline">Supprimer</a>
                            </td>
                        </tr>
                        <tr class="hover:bg-ms-grey/10">
                            <td class="px-6 py-4 whitespace-nowrap font-medium">Bleu</td>
                            <td class="px-6 py-4 whitespace-nowrap">Quelle est cette couleur ?</td>
                            <td class="px-6 py-4 whitespace-nowrap">Bleu</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="#" class="text-ms-blue font-medium hover:underline mr-4">Edit</a>
                                <a href="#" class="text-ms-red font-medium hover:underline">Supprimer</a>
                            </td>
                        </tr> -->

                        <?php foreach($captchas as $captcha): ?>
                            <tr class="hover:bg-ms-grey/10">
                                <td class="px-6 py-4 whitespace-nowrap font-medium"><?=$captcha->title?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?=$captcha->question?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?=$captcha->answer?></td>
                                <td class="px-6 py-4 whitespace-nowrap flex gap-4">

                                    <a href="/dashboard/security/captcha/edit/?id=<?=$captcha->id?>" class="text-ms-blue font-medium hover:underline">Edit</a>

                                    <form action="/dashboard/security/captcha/delete/?id=<?=$captcha->id?>" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');"><button type="submit" class="text-ms-red font-medium hover:underline cursor-pointer">Supprimer</button></form>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            
            <!-- <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Question</th>
                        <th>Réponse</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jaune</td>
                        <td>Quelle est cette couleur ?</td>
                        <td>Jaune</td>
                        <td ><a href="#">edit</a> <a href="#" >supprimer</a></td>
                    </tr>
                    <tr>
                        <td>Violet</td>
                        <td>Quelle est cette couleur ?</td>
                        <td>Violet</td>
                        <td><a href="#">edit</a> <a href="#">supprimer</a></td>
                    </tr>
                    <tr>
                        <td>Rouge</td>
                        <td>Quelle est cette couleur ?</td>
                        <td>Rouge</td>
                        <td><a href="#">edit</a> <a href="#">supprimer</a></td>
                    </tr>
                    <tr>
                        <td>Bleu</td>
                        <td>Quelle est cette couleur ?</td>
                        <td>Bleu</td>
                        <td><a href="#">edit</a> <a href="#">supprimer</a></td>
                    </tr>
                    <tr>
                        <td>Gris</td>
                        <td>Quelle est cette couleur ?</td>
                        <td>Gris</td>
                        <td><a href="#">edit</a> <a href="#">supprimer</a></td>
                    </tr>
                </tbody>
            </table> -->
            <!-- <ul class="w-full h-full flex flex-col p-4 gap-5">
            <li class="group p-4 w-full h-min rounded-md border border-gray-300 hover:border-ms-blue">
                    <a href="" class="flex justify-between items-center">

                        <div class="flex items-center gap-5">
                            <p class="text-xl font-medium">capt</p>
                        </div>
                        <div class="flex items-center gap-5">
                            <svg class="stroke-2 stroke-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg>
                            <svg class="stroke-2 stroke-red-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                        </div>
                    </a>
                </li>
                <li class="group p-4 w-full h-min rounded-md border border-gray-300 hover:border-ms-blue">
                    <a href="" class="flex justify-between items-center">
                        <div class="flex items-center gap-5">
                            <svg class="stroke-2 group-hover:stroke-ms-blue" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/><circle cx="12" cy="12" r="3"/></svg>
                            <div class=" h-12 w-12 rounded-full bg-gray-200"></div>
                            <p class="text-xl font-medium">capt</p>
                        </div>
                        <div class="flex items-center gap-5">
                            <svg class="stroke-2 stroke-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg>
                            <svg class="stroke-2 stroke-red-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                        </div>
                    </a>
                </li>
            </ul> -->
        </section>
    </main>
</body>
</html>