<?php include( $root . '/resources/layout/talk/head.php' );?>
<body class="w-screen h-screen overflow-hidden bg-ms-white dark:bg-ms-black text-ms-black dark:text-ms-white">
    <?php require_once( $root . '/resources/layout/notification/base.php' ) ?>
    <main class="w-full h-full flex justify-center gap-8 px-4 pt-4">
        <?php include( $root . '/resources/layout/talk/sidebar.php' );?>
        <section class="relative overflow-auto w-4xl flex flex-col gap-4 border-x border-t">
            <h1 class="sticky top-0 p-4 text-3xl font-semibold text-center border-b">Évènement - <?= $data['event']['title'] ?></h1>

            <div id="toggle-theme-button" class="absolute right-0 top-0 mr-8">
                <div class="relative my-5 mx-2 cursor-pointer">
                    <svg id="moon" class="absolute stroke-[1.5px] mr-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
                    <svg id="sun" class="absolute stroke-[1.5px] mr-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></svg>
                </div>
            </div>
            
            <div class="w-full px-3 flex flex-col">
                <div class="relative border p-4 rounded-md pt-4">
                    <div class="flex flex-col items-center justify-center gap-8">
                        <div class="max-w-full flex flex-col items-center justify-center gap-4 overflow-hidden">
                            <div class="flex gap-1 flex-row items-center justify-center">
                                <h2 class="text-2xl font-medium hover:underline"><?= $data['event']['title'] ?></h2>
                            </div>
                            <?php if (is_null($data['event']['description'])): ?>
                                <p class="text-lg/8 break-words">L'evenement n'a pas de description.</p>
                            <?php else: ?>
                                <p class="text-lg/8 break-words"><?= (nl2br($data['event']['description'])) ?></p>
                            <?php endif ?>
                        </div>
                    </div>
                    <?php if( is_null($data['user_event']) || $data['user_event']): ?>
                        <div class="w-full flex pt-4">
                            <form method="POST" action="/talk/event/leave/" class="w-full flex flex-row justify-between items-center">
                            <input type="hidden" name="id" value="<?=$data['event']['id']?>">
                                <div class="flex gap-4 items-center">
                                    <button type="submit" class="text-xl font-semibold hover:underline">Quitter</button>
                                </div>
                            </form>
                        </div>
                    <?php else: ?>
                        <div class="w-full flex pt-4">
                            <form method="POST" action="/talk/event/attend/" class="w-full flex flex-row justify-between items-center">
                            <input type="hidden" name="id" value="<?=$data['event']['id']?>">
                                <div class="flex gap-4 items-center">
                                    <button type="submit" class="text-xl font-semibold hover:underline">Rejoindre</button>
                                </div>
                            </form>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <div class="w-full h-full px-3 flex flex-col justify-top gap-4 mb-8 overflow-auto">
                <?php foreach ($data['users'] as $user): ?>
                    <div class="last:mb-8">
                        <div class="w-full flex flex-row items-center border p-4 rounded-md ">
                            <div class="bg-ms-<?=$user['color']?> h-6 w-6 p-8 rounded-full"></div>
                            <div class="w-full flex flex-col gap-2 pl-4">
                                <h2 class="text-lg font-medium hover:underline"> <a href="/profil/show/?username=<?=$user['username']?>"><?=$user['username']?></a></h2>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

        </section>
    </main>
    <?php include_once( $root . '/resources/layout/talk/footer.php' ) ?>
</body>
</html>