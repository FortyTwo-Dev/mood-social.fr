<?php include( $root . '/resources/layout/dashboard/head.php' );?>
<body class="w-screen h-screen overflow-hidden bg-ms-white">
    <?php include( $root . '/resources/layout/dashboard/header.php' );?>
    <main class="w-full h-full grid grid-cols-12">
        <?php include( $root . '/resources/layout/dashboard/sidebar.php' );?>
        <section class="w-full h-fit col-span-10 mb-16 overflow-auto">
            <div class="p-4 border-b mx-2">
                <h1 class=" text-2xl font-medium">Utilisateurs / <?= $data['user']->username ?></h1>
            </div>
            <div class="w-full h-full grid grid-cols-12 grid-rows-8 p-4 gap-4">
                <section class="relative col-span-3 row-span-4 p-4 flex flex-col items-center justify-between border border-gray-300 hover:border-ms-blue rounded-md">
                    <div class="absolute h-4 w-4 bg-green-500 rounded-full top-0 right-0 mr-4 mt-4"></div>
                    <div class="flex flex-col items-center gap-4">
                        <div class=" h-24 w-24 rounded-full bg-gray-300"></div>
                        <p class="text-3xl font-semibold"><?= $data['user']->username ?></p>
                    </div>
                    <div class="flex flex-col items-center gap-3">

                        <?php if(isset($data['stats']['friend'])): ?>
                            <p class="text-2xl"><?=$data['stats']['friend']['number']?> Amis</p>
                        <?php else: ?>
                            <p class="text-2xl">Non défini</p>
                        <?php endif ?>

                        <?php if(isset($data['stats']['follower'])): ?>
                            <p class="text-2xl"><?=$data['stats']['follower']['number']?> Follower</p>
                        <?php else: ?>
                            <p class="text-2xl">Non défini</p>
                        <?php endif ?>

                        <?php if(isset($data['stats']['subscription'])): ?>
                            <p class="text-2xl"><?=$data['stats']['subscription']['title']?></p>
                        <?php else: ?>
                            <p class="text-2xl">Non défini</p>
                        <?php endif ?>

                        <?php if(isset($data['current_mood']->name)): ?>
                            <p class="text-2xl"><?= $data['current_mood']->name ?></p>
                        <?php else: ?>
                            <p class="text-2xl">Non défini</p>
                        <?php endif ?>
                    </div>
                </section>
                <section class="col-span-9 row-span-4 p-3 gap-5 flex flex-col border border-gray-300 hover:border-ms-blue rounded-md">
                    <h2 class="text-2xl font-semibold">Moods</h2>
                    <ul class="flex flex-col gap-4">
                        <?php if(isset($data['moods']) && !empty($data['moods'])): ?>
                            <?php foreach($data['moods'] as $mood): ?>
                                <li class="flex justify-between items-center p-4 border-ms-<?=$mood['color']?> border rounded-md">
                                    <p class="text-2xl font-medium underline decoration-ms-<?=$mood['color']?>"><?=$mood['name']?></p>
                                    <span class="text-2xl font-medium"><?=$mood['number']?></span>
                                </li>
                            <?php endforeach ?>
                        <?php else: ?>
                            <li class="flex justify-center items-center p-4 border-ms-grey border rounded-md">
                                <p class="text-2xl font-medium underline">Aucun</p>
                            </li>
                        <?php endif ?>
                    </ul>
                </section>
                <section class="col-span-6 row-span-4 p-3 gap-5 flex flex-col border border-gray-300 hover:border-ms-blue rounded-md">
                    <h2 class="text-2xl font-semibold">Données</h2>
                    <ul class="w-full h-full flex flex-col items-center justify-between">
                        <?php if(isset($data['user']->email)): ?>
                            <li class="w-full px-6 text-2xl font-medium flex items-center justify-between"><span>Email : </span> <p><?= $data['user']->email ?></p></li>
                        <?php else: ?>
                            <li class="w-full px-6 text-2xl font-medium flex items-center justify-between"><span>Email : </span> <p>non définie</p></li>
                        <?php endif ?>

                        <?php if(isset($data['user']->street)): ?>
                            <li class="w-full px-6 text-2xl font-medium flex items-center justify-between"><span>Adresse : </span> <p><?= $data['user']->street ?></p></li>
                        <?php else: ?>
                            <li class="w-full px-6 text-2xl font-medium flex items-center justify-between"><span>Adresse : </span> <p>non définie</p></li>
                        <?php endif ?>

                        <?php if(isset($data['user']->city)): ?>
                            <li class="w-full px-6 text-2xl font-medium flex items-center justify-between"><span>Ville : </span> <p><?= $data['user']->city ?></p></li>
                        <?php else: ?>
                            <li class="w-full px-6 text-2xl font-medium flex items-center justify-between"><span>Ville : </span> <p>non définie</p></li>
                        <?php endif ?>

                        <?php if(isset($data['user']->cp)): ?>
                            <li class="w-full px-6 text-2xl font-medium flex items-center justify-between"><span>Code Postal : </span> <p><?= $data['user']->cp ?></p></li>
                        <?php else: ?>
                            <li class="w-full px-6 text-2xl font-medium flex items-center justify-between"><span>Code Postal : </span> <p>non définie</p></li>
                        <?php endif ?>

                        <?php if(isset($data['user']->country)): ?>
                            <li class="w-full px-6 text-2xl font-medium flex items-center justify-between"><span>Pays : </span> <p><?= $data['user']->country ?></p></li>
                        <?php else: ?>
                            <li class="w-full px-6 text-2xl font-medium flex items-center justify-between"><span>Pays : </span> <p>non définie</p></li>
                        <?php endif ?>
                    </ul>
                </section>
                <section class="col-span-6 row-span-4 p-3 gap-5 flex flex-col border border-gray-300 hover:border-ms-blue rounded-md">
                    <h2 class="text-2xl font-semibold">Actions</h2>
                    <ul class="flex flex-col gap-4">
                        <li class="flex justify-center items-center p-4 border-ms-blue border rounded-md text-ms-blue bg-ms-white hover:text-ms-white hover:bg-ms-blue">
                            <span class="text-2xl font-medium">Changer le mood actuel</span>
                        </li>
                        <li class="flex justify-center items-center p-4 border-ms-blue border rounded-md text-ms-blue bg-ms-white hover:text-ms-white hover:bg-ms-blue">
                            <span class="text-2xl font-medium">Envoyer un avertissement</span>
                        </li>
                        <li class="flex justify-center items-center p-4 border-ms-red border rounded-md text-ms-red bg-ms-white hover:text-ms-white hover:bg-ms-red">
                            <span class="text-2xl font-medium uppercase">Supprimer le compte</span>
                        </li>
                        <?php if ($data['user']->status === 'banned'): ?>
                        <li class="flex justify-center items-center p-4 border-ms-green border rounded-md text-ms-green bg-ms-white hover:text-ms-white hover:bg-ms-green">
                            <form action="/dashboard/users/unban/" method="POST" onsubmit="return confirm('Débannir cet utilisateur ?');">
                                <input type="hidden" name="email" value="<?= $data['user']->email ?>">
                                <button type="submit" class="text-2xl font-medium uppercase bg-transparent border-0 cursor-pointer p-0 m-0 text-ms-green hover:text-ms-white">
                                    Débannir le compte
                                </button>
                            </form>
                        </li>
                    <?php else: ?>
                        <li class="flex justify-center items-center p-4 border-ms-red border rounded-md text-ms-red bg-ms-white hover:text-ms-white hover:bg-ms-red">
                            <form action="/dashboard/users/ban/" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir bannir cet utilisateur ?');">
                                <input type="hidden" name="email" value="<?= $data['user']->email ?>">
                                <label for="ban_duration" class="mr-2">Durée (heures) :</label>
                                <input type="number" name="ban_duration" id="ban_duration" min="1" value="1" required class="w-24 mr-2 p-1 border rounded">
                                <button type="submit" class="text-2xl font-medium uppercase bg-transparent border-0 cursor-pointer p-0 m-0 text-ms-red hover:text-ms-white">
                                    Bannir le compte
                                </button>
                            </form>
                        </li>
                    <?php endif; ?>
            </ul>
                </section>
            </div>
        </section>
    </main>
</body>
</html>


