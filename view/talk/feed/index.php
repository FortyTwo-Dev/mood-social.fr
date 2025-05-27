<?php include( $root . '/resources/layout/talk/head.php' );?>
<body class="w-screen h-screen overflow-hidden bg-ms-white dark:bg-ms-black text-ms-black dark:text-ms-white">
    <dialog id="post-dialog">
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
            <div class="sticky top-0 p-4 border-b dark:bg-ms-black bg-ms-white">
                <h1 class="text-3xl font-semibold text-center">Fil general</h1>
                <div id="toggle-theme-button" class="absolute right-0 top-0 mr-8">
                    <div class="relative my-5 mx-2">
                        <svg id="moon" class="absolute stroke-[1.5px] mr-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
                        <svg id="sun" class="absolute stroke-[1.5px] mr-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></svg>
                    </div>
                </div>
            </div>
            
            
            <div class="w-full px-3 flex flex-col gap-4">
            
            <?php foreach($messages as $message): ?>

                <?php if (isset($message)): ?>

                <div class="border p-4 rounded-md last:mb-4">
                    <div class="flex flex-row overflow-hidden">
                        <div class="bg-ms-<?=$mood['color']?> h-6 w-6 p-8 rounded-full"></div>
                        <div class="max-w-full flex flex-col gap-2 pl-4">
                            <h2 class="text-lg font-medium"><?=$message->username?></h2>
                            <p class="text-lg/8 break-words"><?= nl2br($message->content)?></p>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between pt-4">
                        <?php if ($message->liked_by_current_user > 0): ?>
                            <div class="flex gap-1">
                                <svg class="like-action stroke-2 fill-ms-<?=$mood['color']?> stroke-ms-<?=$mood['color']?> cursor-pointer" data-color="<?=$mood['color']?>" data-like="true" data-id="<?=$message->id?>" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
                                <p class="like-number-text" data-likenumber="<?= !empty($message->like_count) ? $message->like_count : 0 ?>"> <?= !empty($message->like_count) ? (int)$message->like_count : 0 ?></p>
                            </div>
                        <?php else: ?> 
                            <div class="flex gap-1">
                                <svg class="like-action stroke-2 stroke-ms-<?=$mood['color']?> cursor-pointer" data-color="<?=$mood['color']?>" data-like="false" data-id="<?=$message->id?>" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
                                <p class="like-number-text" data-likenumber="<?= !empty($message->like_count) ? $message->like_count : 0 ?>"> <?= !empty($message->like_count) ? $message->like_count : 0 ?></p>
                            </div>       
                        <?php endif ?>

                        <svg class="stroke-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/><path d="m10 7-3 3 3 3"/><path d="M17 13v-1a2 2 0 0 0-2-2H7"/></svg>
                        
                        <svg class="stroke-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><line x1="18" x2="18" y1="20" y2="10"/><line x1="12" x2="12" y1="20" y2="4"/><line x1="6" x2="6" y1="20" y2="14"/></svg>
                    </div>
                </div>
                <?php endif ?>

            <?php endforeach ?>
            </div>
        </section>
    </main>
    <?php include_once( $root . '/resources/layout/talk/footer.php' ) ?>
</body>
</html>