<?php include( $root . '/resources/layout/talk/head.php' );?>
<body class="w-screen h-screen overflow-hidden bg-ms-white dark:bg-ms-black text-ms-black dark:text-ms-white">
    <?php require_once( $root . '/resources/layout/notification/base.php' ) ?>
    <dialog id="friend-dialog">
        <div class="max-w-xl w-full mx-4 p-6 fixed flex flex-col gap-6 justify-center z-50 left-1/2 top-1/2 -translate-1/2 rounded-md bg-ms-white dark:bg-ms-black border-1 border-ms-<?=$mood['color']?> dark:border-ms-white text-ms-black dark:text-ms-white">
            <p class="font-semibold text-2xl text-start">Ajouter un ami</p>
            <label for="friend">Chercher ici</label>
            <input type="text" name="friend" id="friend" class="border-2 p-2 border-ms-<?=$mood['color']?> rounded-md" placeholder="user"/>

            <ul class="w-full h-72 p-3 flex flex-col gap-3 border border-ms-<?=$mood['color']?> rounded-md overflow-y-scroll">
                <li class="flex rounded-md hover:underline w-full p-2 items-center justify-between gap-4 bg-ms-<?=$mood['color']?> text-ms-<?=$mood['text_color']?>">
                    <p></p>
                    <svg class="stroke-[1.5px] add-friend-action" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/></svg>    
                </li>
            </ul>
        </div>
    </dialog>

    <dialog id="group-dialog">
        <form method="POST" action="/talk/feed/message/store/" class="max-w-4xl w-full mx-4 p-6 fixed flex flex-col gap-6 justify-center z-50 left-1/2 top-1/2 -translate-1/2 rounded-md bg-ms-white dark:bg-ms-black border-1 border-ms-<?=$mood['color']?> dark:border-ms-white text-ms-black dark:text-ms-white">
            <p class="font-semibold text-2xl text-start">Nouveau post</p>
            <label for="content">Message</label>
            <textarea name="content" id="content" class="border-2 border-ms-<?=$mood['color']?> rounded-md min-h-40"></textarea>
            <button type="submit" class="flex rounded-md hover:underline w-full py-2 items-center justify-center gap-4 bg-ms-<?=$mood['color']?> text-ms-<?=$mood['text_color']?>">Publier</button>
        </form>
    </dialog>

    <main class="w-full h-full flex justify-center gap-8 px-4 pt-4">
        <?php include( $root . '/resources/layout/talk/sidebar.php' );?>
        <section class="relative overflow-auto w-4xl flex flex-col gap-4 border-x border-t">
            <h1 class="sticky top-0 p-4 text-3xl font-semibold text-center border-b">Messages</h1>
            <div class="absolute left-0 top-0 ml-2 cursor-pointer">
                <svg class="relative my-5 mx-2 stroke-[1.5px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"  stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><path d="M16 3.128a4 4 0 0 1 0 7.744"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><circle cx="9" cy="7" r="4"/></svg>
            </div>
            <div id="button-add-friend" class="absolute left-0 top-0 ml-12 cursor-pointer">
                <svg class="relative my-5 mx-2 stroke-[1.5px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/></svg>
            </div>

            <div id="toggle-theme-button" class="absolute right-0 top-0 mr-8">
                <div class="relative my-5 mx-2 cursor-pointer">
                    <svg id="moon" class="absolute stroke-[1.5px] mr-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
                    <svg id="sun" class="absolute stroke-[1.5px] mr-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></svg>
                </div>
            </div>

            <div class="w-full px-3 flex flex-col gap-4">

                <?php foreach($friends as $friend): ?>

                    <?php if (isset($friend)): ?>

                        <div class="border p-4 rounded-md last:mb-4">
                            <div class="w-full flex flex-row items-center justify-between">
                                <div class="w-full flex flex-row">
                                    <div class="bg-ms-<?=$mood['color']?> h-6 w-6 p-8 rounded-full flex items-center justify-center text-4xl font-semibold text-ms-<?=$mood['text_color']?>">A</div>
                                    <div class="w-full flex flex-col items-start justify-center gap-2 pl-4 overflow-hidden">
                                        <h2 class="w-full text-lg font-medium truncate"><?=$friend->username?></h2>
                                    </div>
                                </div>
                                <div class="flex gap-4">

                                    <form action="/friend/reject/" method="POST">
                                        <input type="hidden" name="user_id" id="user_id" value="<?=$friend->id?>">
                                        <button type="submit" class="cursor-pointer">
                                            <svg class=" stroke-2 stroke-red-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="17" x2="22" y1="8" y2="13"/><line x1="22" x2="17" y1="8" y2="13"/></svg>
                                        </button>
                                    </form>

                                    <form action="/friend/accept/" method="POST">
                                        <input type="hidden" name="user_id" id="user_id" value="<?=$friend->id?>">
                                        <button type="submit" class="cursor-pointer">
                                            <svg class=" stroke-2 stroke-green-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m16 11 2 2 4-4"/><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>

                    <?php endif ?>

                <?php endforeach ?>

            </div>
            
            <div class="w-full px-3 flex flex-col gap-4">

                <?php foreach($exchanges as $exchange): ?>

                    <?php if (isset($exchange)): ?>

                    <form action="/talk/exchange/show/" method="GET" class="w-full border p-4 rounded-md last:mb-4 group/reaction">
                        <input type="hidden" name="exchange_id" value="<?=$exchange->id?>">
                        <button class="w-full flex flex-row gap-4 cursor-pointer">

                            <div class="bg-ms-<?=$mood['color']?> h-6 w-6 p-8 rounded-full flex items-center justify-center text-4xl font-semibold text-ms-<?=$mood['text_color']?>">A</div>

                            <div class="w-full flex items-center overflow-hidden">
                                <h2 class="text-lg font-medium truncate"><?=$exchange->username?></h2>
                            </div>
                        </button>
                    </form>

                    <?php endif ?>

                <?php endforeach ?>

            </div>
            
            <div class="w-full px-3 flex flex-col gap-4">

                <?php foreach($talks as $talk): ?>

                    <?php if (isset($talk)): ?>

                    <a href="/talk/group/show/?talk_id=<?=$talk->id?>" class="border p-4 rounded-md last:mb-4">
                        <div class="w-full flex flex-row">
                            <div class="bg-ms-<?=$mood['color']?> h-6 w-6 p-8 rounded-full flex items-center justify-center text-4xl font-semibold text-ms-<?=$mood['text_color']?>">G</div>
                            <div class="w-full flex flex-col items-start justify-center gap-2 pl-4 overflow-hidden">
                                <h2 class="w-full text-lg font-medium truncate"><?=$talk->title?></h2>
                            </div>
                        </div>
                    </a>

                    <?php endif ?>

                <?php endforeach ?>

            </div>
        </section>
    </main>
    <?php include_once( $root . '/resources/layout/talk/footer.php' ) ?>
    <script src="/resources/js/friend.js"></script>
</body>
</html>