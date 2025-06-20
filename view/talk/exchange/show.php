<?php include( $root . '/resources/layout/talk/head.php' );?>
<body class="w-screen h-screen overflow-hidden bg-ms-white dark:bg-ms-black text-ms-black dark:text-ms-white">
    <?php require_once( $root . '/resources/layout/notification/base.php' ) ?>
    
    <dialog id="reaction-dialog">
        <div class="max-w-xl w-full mx-4 p-6 fixed flex flex-col gap-6 justify-center items-center z-50 left-1/2 top-1/2 -translate-1/2 rounded-md bg-ms-white dark:bg-ms-black border-1 border-ms-<?=$mood['color']?> dark:border-ms-white text-ms-black dark:text-ms-white">
            <p class="font-semibold text-2xl text-start">Ajouter une réaction</p>
            <div class="h-72 border border-ms-<?=$mood['color']?> rounded-md">
                <ul id="reaction-list" class="w-full h-fit p-3 grid grid-flow-row-dense grid-cols-9 gap-2 overflow-y-scroll">
                    
                </ul>
            </div>
        </div>
    </dialog>

    <main class="w-full h-full flex justify-center gap-8 px-4 pt-4">
        <?php include( $root . '/resources/layout/talk/sidebar.php' );?>
        <section class="relative w-4xl flex flex-col gap-4 border-x border-t">
            <h1 class="sticky top-0 p-4 text-3xl font-semibold text-center border-b"><?=$data['receiver_user']->username?></h1>
            <div id="toggle-theme-button" class="absolute right-0 top-0 mr-8">
                <div class="relative my-5 mx-2">
                    <svg id="moon" class="absolute stroke-[1.5px] mr-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
                    <svg id="sun" class="absolute stroke-[1.5px] mr-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></svg>
                </div>
            </div>
            
            <div class="w-full h-full px-3 flex flex-col-reverse justify-baseline gap-4 mb-8 overflow-auto">
                <?php foreach($data['exchanges'] as $exchange): ?>

                    <?php if (isset($exchange)): ?>

                        <?php if (GetUserId() == $exchange->sender_user_id): ?>

                            <div class="relative w-full flex flex-col items-end first:mb-8 group/reaction">
                                <div class="w-fit border p-4 rounded-md">
                                    <div class="w-full flex flex-col gap-2">
                                        
                                        <?php if (isset($exchange->file_path)): ?>
                                            <div class="w-full">
                                                <img src="data:image/png;base64,<?=base64_encode(file_get_contents($root . '/storage/exchange/' . $exchange->file_path))?>">
                                            </div>
                                        <?php endif ?>

                                        <div class="w-full">
                                            <p class="text-lg/8"><?= nl2br($exchange->content)?></p>
                                        </div>

                                    </div>
                                </div>
                                <div data-id="<?=$exchange->id?>" data-color="<?=$mood['color']?>" data-text="<?=$mood['text_color']?>" class="group-hover/reaction:block hidden absolute -top-8 right-2 p-2 dark:bg-ms-black bg-ms-white border border-ms-grey rounded-md z-20 reaction-plus">
                                    <svg class="stroke-[1.5px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11v1a10 10 0 1 1-9-10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" x2="9.01" y1="9" y2="9"/><line x1="15" x2="15.01" y1="9" y2="9"/><path d="M16 5h6"/><path d="M19 2v6"/></svg>
                                </div>
                                
                                 <?php if (GetExchangeReactions($exchange->id) !== null): ?>

                                    <div data-exch="<?=$exchange->id?>" class="use-reaction-list flex flex-row-reverse gap-2 mt-2">
                                        <?php foreach(GetExchangeReactions($exchange->id) as $reaction): ?>

                                            <?php if (GetUserId() == $reaction['user_id']): ?>

                                            <div data-reaction-id="<?=$reaction['id']?>" class="use-reaction flex gap-1 stroke-[1.5px] p-2 bg-ms-<?=$mood['color']?>/20 border border-ms-<?=$mood['color']?> rounded-md">
                                                <?=htmlspecialchars_decode($reaction['emoji'])?>
                                            </div>

                                            <?php else: ?>

                                                <div data-reaction-id="<?=$reaction['id']?>" class="use-reaction flex gap-1 stroke-[1.5px] p-2 dark:bg-ms-black bg-ms-white border border-ms-grey rounded-md">
                                                <?= htmlspecialchars_decode($reaction['emoji'])?>
                                        
                                            </div>

                                            <?php endif ?>

                                        <?php endforeach ?>

                                    </div>

                                <?php else: ?>

                                    <div data-exch="<?=$exchange->id?>" class="hidden use-reaction-list flex gap-2 mt-2">
                                        
                                    </div>

                                <?php endif ?>
                            </div>

                        <?php else: ?>

                            <div class="relative first:mb-8 group/reaction">

                                <div class="w-full flex flex-row border p-4 rounded-md ">
                                    <div class="bg-ms-<?=$mood['color']?> h-6 w-6 p-8 rounded-full"></div>
                                    <div class="w-full flex flex-col gap-2 pl-4">
                                        <h2 class="text-lg font-medium"><?=$data['receiver_user']->username?></h2>
                                        <?php if (isset($exchange->file_path)): ?>
                                            <div class="w-full">
                                                <img src="data:image/png;base64,<?=base64_encode(file_get_contents($root . '/storage/exchange/' . $exchange->file_path))?>">
                                            </div>
                                        <?php endif ?>

                                        <div class="w-full">
                                            <p class="text-lg/8"><?= nl2br($exchange->content)?></p>
                                        </div>
                                    </div>
                                </div>
                                <div data-id="<?=$exchange->id?>" data-color="<?=$mood['color']?>" data-text="<?=$mood['text_color']?>" class="group-hover/reaction:block hidden absolute -top-8 right-2 p-2 dark:bg-ms-black bg-ms-white border border-ms-grey rounded-md z-20 reaction-plus">
                                    <svg class="stroke-[1.5px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11v1a10 10 0 1 1-9-10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" x2="9.01" y1="9" y2="9"/><line x1="15" x2="15.01" y1="9" y2="9"/><path d="M16 5h6"/><path d="M19 2v6"/></svg>
                                </div>
                                
                                 <?php if (GetExchangeReactions($exchange->id) !== null): ?>

                                    <div data-exch="<?=$exchange->id?>" class="use-reaction-list flex flex-row-reverse gap-2 mt-2">
                                        <?php foreach(GetExchangeReactions($exchange->id) as $reaction): ?>

                                            <?php if (GetUserId() == $reaction['user_id']): ?>

                                                <div data-reaction-id="<?=$reaction['id']?>" class="use-reaction flex gap-1 stroke-[1.5px] p-2 bg-ms-<?=$mood['color']?>/20 border border-ms-<?=$mood['color']?> rounded-md">
                                                    <?=htmlspecialchars_decode($reaction['emoji'])?>
                                                </div>

                                            <?php else: ?>

                                                <div data-reaction-id="<?=$reaction['id']?>" class="use-reaction flex gap-1 stroke-[1.5px] p-2 dark:bg-ms-black bg-ms-white border border-ms-grey rounded-md">
                                                <?=htmlspecialchars_decode($reaction['emoji'])?>
                                                </div>

                                            <?php endif ?>

                                        <?php endforeach ?>

                                    </div>

                                <?php else: ?>

                                    <div data-exch="<?=$exchange->id?>" class="hidden use-reaction-list flex gap-2 mt-2">
                                        
                                    </div>

                                <?php endif ?>
                            </div>

                        <?php endif ?>

                    <?php endif ?>

                <?php endforeach ?>
            </div>

            <div class="absolute w-full bg-ms-white dark:bg-ms-black bottom-0 px-3 py-2">
                <form action="/talk/exchange/store/" method="POST" class="w-full p-2 flex border rounded-md" enctype="multipart/form-data">
                    <label for="image-upload" class="flex justify-center items-center cursor-pointer">
                        <svg class="stroke-2 stroke-ms-<?=$mood['color']?>" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M16 5h6"/><path d="M19 2v6"/><path d="M21 11.5V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7.5"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/><circle cx="9" cy="9" r="2"/></svg>
                    </label>
                    <input id="image-upload" name="image" type="file" class="hidden">
                    <input type="hidden" name="receiver_user_id" value="<?=$data['receiver_user']->id?>">
                    <textarea class="w-full mx-2 outline-none focus:ring-0 min-h-6 max-h-12 resize-none" type="text" placeholder="message . . ." name="content" id="content" rows="1"></textarea>
                    <button type="submit" class="cursor-pointer"><svg class="stroke-2 stroke-ms-<?=$mood['color']?>" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M3.714 3.048a.498.498 0 0 0-.683.627l2.843 7.627a2 2 0 0 1 0 1.396l-2.842 7.627a.498.498 0 0 0 .682.627l18-8.5a.5.5 0 0 0 0-.904z"/><path d="M6 12h16"/></svg></button> 
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