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
            <h1 class="sticky top-0 p-4 text-3xl font-semibold text-center border-b"><?=$talk->title?></h1>
            <div id="toggle-theme-button" class="absolute right-0 top-0 mr-8">
                <div class="relative my-5 mx-2">
                    <svg id="moon" class="absolute stroke-[1.5px] mr-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
                    <svg id="sun" class="absolute stroke-[1.5px] mr-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></svg>
                </div>
            </div>
            
            <div class="w-full h-full px-3 flex flex-col-reverse justify-baseline gap-4 mb-14">
                <? foreach($messages as $message): ?>

                    <? if (isset($message)): ?>
                        <? if (GetUserId() == $message->user_id): ?>
                            <div class="w-full flex flex-row justify-end first:mb-8">
                                <div class="w-fit border p-4 rounded-md">
                                    <div class="flex flex-col gap-2">
                                        <p class="text-lg/8"><?= nl2br($message->content)?></p>
                                    </div>
                                </div>
                            </div>
                        <? else: ?>
                            <div class="border p-4 rounded-md first:mb-8">
                                <div class="flex flex-row">
                                    <div class="bg-ms-<?=$mood['color']?> h-6 w-6 p-8 rounded-full"></div>
                                    <div class="flex flex-col gap-2 pl-4">
                                        <h2 class="text-lg font-medium"><?=$message->username?></h2>
                                        <p class="text-lg/8"><?= nl2br($message->content)?></p>
                                    </div>
                                </div>
                            </div>
                        <? endif ?>
                    <? endif ?>

                <? endforeach ?>
            </div>

            <div class="absolute w-full bottom-0 px-3 py-2">
                <form action="/talk/group/message/store/" method="POST" class="w-full p-2 flex border rounded-md" enctype="multipart/form-data">
                    <label for="image-upload" class="flex justify-center items-center">
                        <svg class="stroke-2 stroke-ms-<?=$mood['color']?>" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M16 5h6"/><path d="M19 2v6"/><path d="M21 11.5V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7.5"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/><circle cx="9" cy="9" r="2"/></svg>
                    </label>
                    <input id="image-upload" name="image" type="file" class="hidden">
                    <input type="hidden" name="talk_id" value="<?=$talk->id?>">
                    <textarea class="w-full mx-2 outline-none focus:ring-0 min-h-6 max-h-12 resize-none" type="text" placeholder="message . . ." name="content" id="content" rows="1"></textarea>
                    <button type="submit"><svg class="stroke-2 stroke-ms-<?=$mood['color']?>" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M3.714 3.048a.498.498 0 0 0-.683.627l2.843 7.627a2 2 0 0 1 0 1.396l-2.842 7.627a.498.498 0 0 0 .682.627l18-8.5a.5.5 0 0 0 0-.904z"/><path d="M6 12h16"/></svg></button> 
                </form>
            </div>

        </section>
    </main>
    <?php include_once( $root . '/resources/layout/talk/footer.php' ) ?>
    <script>
        const textareas = document.querySelectorAll('textarea');

        textareas.forEach(textarea => {
            textarea.addEventListener('input', autoResize);
            autoResize.call(textarea);
        });

        function autoResize() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        }
    </script>
</body>
</html>