<?php include($root . '/resources/layout/talk/head.php'); ?>

<body class="w-screen h-screen overflow-hidden bg-ms-white dark:bg-ms-black text-ms-black dark:text-ms-white">
    <dialog id="post-dialog">
        <form method="POST" action="/talk/feed/message/store/" class="max-w-4xl w-full mx-4 p-6 fixed flex flex-col gap-6 justify-center z-50 left-1/2 top-1/2 -translate-1/2 rounded-md bg-ms-white dark:bg-ms-black border-1 border-ms-<?= $mood['color'] ?> dark:border-ms-white text-ms-black dark:text-ms-white">
            <p class="font-semibold text-2xl text-start">Nouveau post</p>
            <label for="content">Message</label>
            <textarea name="content" id="content" class="border-2 border-ms-<?= $mood['color'] ?> rounded-md min-h-40"></textarea>
            <button type="submit" class="flex rounded-md hover:underline w-full py-2 items-center justify-center gap-4 bg-ms-<?= $mood['color'] ?> text-ms-<?= $mood['text_color'] ?>">Publier</button>
        </form>
    </dialog>

    <main class="w-full h-full flex justify-center gap-8 px-4 pt-4">
        <?php include($root . '/resources/layout/talk/sidebar.php'); ?>
        <section class="relative overflow-auto w-4xl flex flex-col gap-4 border-x border-t">
            <div class="sticky z-10 top-0 p-4 border-b dark:bg-ms-black bg-ms-white">
                <h1 class="text-3xl font-semibold text-center">Profile - <?= $user[0]->username ?></h1>
                <div id="toggle-theme-button" class="absolute right-0 top-0 mr-8">
                    <div class="relative my-5 mx-2">
                        <svg id="moon" class="absolute stroke-[1.5px] mr-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
                        </svg>
                        <svg id="sun" class="absolute stroke-[1.5px] mr-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="4" />
                            <path d="M12 2v2" />
                            <path d="M12 20v2" />
                            <path d="m4.93 4.93 1.41 1.41" />
                            <path d="m17.66 17.66 1.41 1.41" />
                            <path d="M2 12h2" />
                            <path d="M20 12h2" />
                            <path d="m6.34 17.66-1.41 1.41" />
                            <path d="m19.07 4.93-1.41 1.41" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="w-full px-3 flex flex-col">
                <div class="relative border p-4 rounded-md pt-12">
                    <div class="flex flex-col items-center justify-center gap-8">
                        <div class="bg-ms-<?= $mood['color'] ?> h-6 w-6 p-8 rounded-full"></div>
                        <div class="max-w-full flex flex-col items-center justify-center gap-4 overflow-hidden">
                            <div class="flex gap-1 flex-row items-center justify-center">
                                <h2 class="text-2xl font-medium hover:underline"><?= $user[0]->username ?></h2>
                                <span class="stroke-2"><?php
                                                        if (isset($user[1]['badge']) && !empty($user[1]['badge'])) {
                                                            echo $user[1]['badge'];  
                                                        }
                                                        ?>
                                </span>
                                <span class="stroke-2 font-medium"><?php
                                                        if (isset($user[1]['name']) && !empty($user[1]['name'])) {
                                                            echo $user[1]['name'];  
                                                        }
                                                        ?>
                                </span>
                            </div>
                            <?php if (is_null($user[0]->description)): ?>
                                <p class="text-lg/8 break-words">L'utilisateur n'a pas de description.</p>
                            <?php else: ?>
                                <p class="text-lg/8 break-words"><?= $user[0]->description ?></p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="w-full flex pt-4">
                        <div class="w-full flex flex-row justify-between items-center">
                            <div class="flex gap-4 items-center">
                                <p class=" text-xl font-semibold">Suivis : <?= $user[0]->followed ?></p>
                                <p class=" text-xl font-semibold">Followers : <?= $user[0]->follower ?></p>
                            </div>
                            <?php if ($user[0]->id !== GetUserId()): ?>
                                <div class="flex gap-4 items-center">

                                    <?php if (isset($user[0]->isfollower)): ?>
                                        <form action="/profil/follow/delete/" method="POST" class="flex gap-2 text-xl font-semibold px-3 py-1.5 border-2 border-ms-<?= $mood['color'] ?> rounded-md box-border hover:underline">
                                            <input type="hidden" name="user_id" value="<?= $user[0]->id ?>">
                                            <button type="submit" class="cursor-pointer">Unfollow</button>
                                        </form>
                                    <?php elseif (isset($user[0]->pendingfollower)): ?>
                                        <div class="flex gap-2 text-xl font-semibold px-3 py-1.5 border-2 border-ms-<?= $mood['color'] ?> rounded-md box-border hover:underline">
                                            <p class="cursor-pointer">En attente</p>
                                        </div>
                                    <?php elseif (isset($user[0]->nofollower)): ?>
                                        <form action="/profil/follow/update/" method="POST" class="flex gap-2 text-xl font-semibold px-3 py-1.5 border-2 border-ms-<?= $mood['color'] ?> rounded-md box-border hover:underline">
                                            <input type="hidden" name="user_id" value="<?= $user[0]->id ?>">
                                            <button type="submit" class="cursor-pointer">Follow</button>
                                        </form>
                                    <?php else: ?>
                                        <form action="/profil/follow/store/" method="POST" class="flex gap-2 text-xl font-semibold px-3 py-1.5 border-2 border-ms-<?= $mood['color'] ?> rounded-md box-border hover:underline">
                                            <input type="hidden" name="user_id" value="<?= $user[0]->id ?>">
                                            <button type="submit" class="cursor-pointer">Follow</button>
                                        </form>
                                    <?php endif ?>

                                    <?php if (isset($user[0]->isfriend)): ?>
                                        <form action="/profil/friend/delete/" method="POST" class="flex gap-2 text-xl font-semibold px-3 py-2 bg-ms-<?= $mood['color'] ?> text-ms-<?= $mood['text_color'] ?> rounded-md hover:underline cursor-pointer">
                                            <svg class="stroke-[1.5px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                                <circle cx="9" cy="7" r="4" />
                                                <line x1="19" x2="19" y1="8" y2="14" />
                                                <line x1="22" x2="16" y1="11" y2="11" />
                                            </svg>
                                            <input type="hidden" name="user_id" value="<?= $user[0]->id ?>">
                                            <button type="submit" class="cursor-pointer">Supprimer</button>
                                        </form>
                                    <?php elseif (isset($user[0]->pendingfriend)): ?>
                                        <div class="flex gap-2 text-xl font-semibold px-3 py-2 bg-ms-<?= $mood['color'] ?> text-ms-<?= $mood['text_color'] ?> rounded-md cursor-not-allowed">
                                            <svg class="stroke-[1.5px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                                <circle cx="12" cy="7" r="4" />
                                            </svg>
                                            <p>En attente</p>
                                        </div>
                                    <?php elseif (isset($user[0]->nofriend)): ?>
                                        <form action="/profil/friend/update/" method="POST" class="flex gap-2 text-xl font-semibold px-3 py-2 bg-ms-<?= $mood['color'] ?> text-ms-<?= $mood['text_color'] ?> rounded-md hover:underline cursor-pointer">
                                            <svg class="stroke-[1.5px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                                <circle cx="9" cy="7" r="4" />
                                                <line x1="19" x2="19" y1="8" y2="14" />
                                                <line x1="22" x2="16" y1="11" y2="11" />
                                            </svg>
                                            <input type="hidden" name="user_id" value="<?= $user[0]->id ?>">
                                            <button type="submit" class="cursor-pointer">Ajouter</button>
                                        </form>
                                    <?php else: ?>
                                        <form action="/profil/friend/store/" method="POST" class="flex gap-2 text-xl font-semibold px-3 py-2 bg-ms-<?= $mood['color'] ?> text-ms-<?= $mood['text_color'] ?> rounded-md hover:underline cursor-pointer">
                                            <svg class="stroke-[1.5px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                                <circle cx="9" cy="7" r="4" />
                                                <line x1="19" x2="19" y1="8" y2="14" />
                                                <line x1="22" x2="16" y1="11" y2="11" />
                                            </svg>
                                            <input type="hidden" name="user_id" value="<?= $user[0]->id ?>">
                                            <button type="submit" class="cursor-pointer">Ajouter</button>
                                        </form>
                                    <?php endif ?>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include_once($root . '/resources/layout/talk/footer.php') ?>
</body>

</html>