<?php include( $root . '/resources/layout/dashboard/head.php' );?>
<title>Posts</title>
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
                        <p class="text-3xl font-semibold flex items-center gap-2">
                            <?= htmlspecialchars($data['user']->username ?? '') ?>
                            <?php if (isset($data['user']->status) && $data['user']->status === 'banned'): ?>
                                <span class="ml-2 px-2 py-0.5 rounded bg-ms-red text-white text-xs font-bold uppercase flex items-center gap-1">
                                    <i data-lucide="gavel" class="inline w-5 h-5"></i>
                                    BAN
                                </span>
                            <?php endif; ?>
                        </p>
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
                            <a href="/dashboard/users/changeusermood/?id=<?= $_GET['id'] ?>"
                            class="text-2xl font-medium bg-transparent border-0 cursor-pointer p-0 m-0 text-ms-blue hover:text-ms-white">
                                Changer le mood actuel
                            </a>
                        </li>

                        <li class="flex justify-center items-center p-4 border-ms-blue border rounded-md text-ms-blue bg-ms-white hover:text-white hover:bg-ms-blue">
                            <a href="/dashboard/users/userposts/?id=<?= $_GET['id'] ?>"
                            class="group w-full flex justify-center items-center text-2xl font-medium uppercase">
                            <span class="group-hover:text-white">Voir les posts</span>
                            </a>
                        </li>

                        <li class="flex justify-center items-center p-4 border-ms-blue border rounded-md text-ms-blue bg-ms-white hover:text-ms-white hover:bg-ms-blue">
                            <form action="/dashboard/users/warning/" method="POST" onsubmit="return confirm('Envoyer un avertissement à cet utilisateur ?');">
                                <input type="hidden" name="user_id" value="<?= $data['user']->id ?>">
                                <button type="submit" class="text-2xl font-medium bg-transparent border-0 cursor-pointer p-0 m-0 text-ms-blue hover:text-ms-white">
                                    Envoyer un avertissement
                                </button>
                            </form>
                        <li>
                            <form action="/dashboard/users/delete/" method="POST" onsubmit="return confirm('Cette action est irréversible. Voulez-vous vraiment supprimer cet utilisateur ?');">
                                <input type="hidden" name="email" value="<?= $data['user']->email ?>">
                                <button 
                                    type="submit"
                                    class="group w-full flex justify-center items-center p-4 border-ms-red border rounded-md text-ms-red bg-ms-white hover:text-white hover:bg-ms-red text-2xl font-medium uppercase">
                                    <span class="group-hover:text-white">Supprimer le compte</span>
                                </button>
                            </form>
                        </li>
                        </form>
                        <?php if ($data['user']->status === 'banned'): ?>

                    <li>
                    <form action="/dashboard/users/unban/" method="POST" onsubmit="return confirm('Débannir cet utilisateur ?');">
                        <input type="hidden" name="email" value="<?= $data['user']->email ?>">
                        <button type="submit"
                            class="w-full flex flex-col items-center justify-center p-4 border-ms-black border rounded-md text-ms-black bg-ms-white hover:text-ms-white hover:bg-ms-black">
                            <div class="mb-2 text-center">
                                <span class="font-semibold">Raison du bannissement :</span>
                                <span class="italic">
                                    <?= htmlspecialchars($data['user']->ban_reason ?? 'Non précisée') ?>
                                </span>
                            </div>
                            <span class="text-2xl font-medium uppercase">Débannir le compte</span>
                        </button>
                    </form>
                </li>

                    <?php else: ?>
                    <li>
                        <button 
                            type="button"
                            onclick="document.getElementById('banModal').classList.remove('hidden')"
                            class="w-full flex justify-center items-center p-4 border-ms-red border rounded-md text-ms-red bg-ms-white hover:text-ms-white hover:bg-ms-red text-2xl font-medium uppercase">
                            Bannir le compte
                        </button>
                    </li>
                <?php endif; ?>
            <div id="banModal" class="fixed inset-0 flex items-center justify-center bg-gray-200 bg-opacity-80 z-50 hidden">
                <div class="bg-white rounded-2xl p-10 w-full max-w-2xl shadow-2xl border-4 border-ms-red relative">
                    <button type="button"
                        onclick="document.getElementById('banModal').classList.add('hidden')"
                        class="absolute top-4 right-4 text-3xl text-ms-red hover:text-ms-black font-bold"
                        aria-label="Fermer">&times;</button>
                    <h2 class="text-3xl font-bold mb-6 text-ms-red text-center">Bannir l'utilisateur</h2>
                    <form action="/dashboard/users/ban/" method="POST" onsubmit="return confirm('Confirmer le bannissement ?');">
                        <input type="hidden" name="email" value="<?= $data['user']->email ?>">
                        <div class="mb-6">
                            <label for="ban_duration" class="block text-xl font-semibold mb-2">Durée du bannissement (heures) :</label>
                            <input type="number" name="ban_duration" id="ban_duration" min="1" value="1" required class="w-full p-3 border-2 border-ms-red rounded-lg text-lg">
                        </div>
                        <div class="mb-6">
                            <label for="ban_reason" class="block text-xl font-semibold mb-2">Raison du bannissement :</label>
                            <textarea name="ban_reason" id="ban_reason" required rows="3" class="w-full p-3 border-2 border-ms-red rounded-lg text-lg" placeholder="Motif du bannissement"></textarea>
                        </div>
                        <div class="flex justify-end gap-4">
                            <button type="button"
                                onclick="document.getElementById('banModal').classList.add('hidden')"
                                class="px-6 py-3 rounded-lg bg-gray-300 text-gray-700 text-lg font-semibold hover:bg-gray-400 transition">Annuler</button>
                            <button type="submit"
                                class="px-6 py-3 rounded-lg bg-ms-red text-white text-lg font-semibold hover:bg-ms-black transition">Bannir</button>
                        </div>
                    </form>
                </div>
            </div>
            <script>
            document.getElementById('banModal').addEventListener('click', function(e) {
                if (e.target === this) this.classList.add('hidden');
            });
            </script>
                            </section>
                        </div>
                    </section>
                </main>
                <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
                <script>
                    lucide.createIcons();
                </script>

            </body>
            </html>


