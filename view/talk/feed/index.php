<?php include($root . '/resources/layout/talk/head.php'); ?>
<style>
    #drawing-canvas {
        cursor: crosshair;
        touch-action: none;
    }
</style>

<body class="w-screen h-screen overflow-hidden bg-ms-white dark:bg-ms-black text-ms-black dark:text-ms-white">
    <?php require_once($root . '/resources/layout/notification/base.php') ?>

    <dialog id="post-dialog">
        <form method="POST" action="/talk/feed/message/store/" enctype="multipart/form-data" class="max-w-4xl w-full mx-4 p-6 fixed flex flex-col gap-6 justify-center z-50 left-1/2 top-1/2 -translate-1/2 rounded-md bg-ms-white dark:bg-ms-black border-1 border-ms-<?= $mood['color'] ?> text-ms-black dark:text-ms-white">
            <p class="font-semibold text-2xl text-start">Nouveau post</p>
            <label for="content">Message</label>
            <textarea name="content" id="content" class="border-2 border-ms-<?= $mood['color'] ?> rounded-md min-h-40"></textarea>
            <div id="drawing-container" class="hidden flex flex-col items-center gap-2">
                <p class="text-sm text-center">Dessinez votre message</p>
                <canvas id="drawing-canvas" data-color="<?= $mood['color'] ?>" width="300" height="300" class="border-2 border-gray-500 bg-white touch-none"></canvas>

                <div id="preview-container" class="hidden mt-2">
                    <img id="drawing-preview" class="max-w-full h-auto border border-gray-300 rounded" alt="Prévisualisation du dessin">
                </div>

                <button type="button" id="clear-canvas" class="text-red-600 text-sm mt-1">Effacer le dessin</button>
                <button type="button" id="save-canvas" class="text-red-600 text-sm mt-1">Sauvegarder le dessin</button>
                <input name="drawing" type="file" id="drawing-data">
            </div>
            <div class="w-full flex gap-3 items-center justify-center">
                <label for="image-upload" class="flex justify-center items-center cursor-pointer">
                    <svg class="stroke-2 stroke-ms-<?= $mood['color'] ?>" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 5h6" />
                        <path d="M19 2v6" />
                        <path d="M21 11.5V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7.5" />
                        <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                        <circle cx="9" cy="9" r="2" />
                    </svg>
                </label>
                <input id="image-upload" name="image" type="file" class="hidden">
                <button type="submit" class="rounded-md hover:underline w-full py-2 bg-ms-<?= $mood['color'] ?> text-<?= $mood['text_color'] ?>">Publier</button>
            </div>
            <input type="hidden" name="message_id" value="1">
        </form>
    </dialog>

    <main class="w-full h-full flex justify-center gap-8 px-4 pt-4">
        <?php include($root . '/resources/layout/talk/sidebar.php'); ?>
        <section class="relative overflow-auto w-4xl flex flex-col gap-4 border-x border-t">
            <div class="sticky z-10 top-0 p-4 border-b dark:bg-ms-black bg-ms-white">
                <h1 class="text-3xl font-semibold text-center">Fil general</h1>
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


            <div class="w-full px-3 flex flex-col gap-4">

                <?php foreach ($messages as $message): ?>

                    <?php if (isset($message)): ?>
                        <div class="w-full h-full message" data-id="<?= $message->id ?>">
                            <div class="relative border p-4 rounded-md last:mb-4 message-box">
                                <div class="flex flex-row">
                                    <div class=" relative bg-ms-<?= $mood['color'] ?> h-6 w-6 p-8 rounded-full">
                                        <?php if (!empty($image['head'])): ?>
                                            <img src="data:image/png;base64,<?= $image['head'] ?>" class="  absolute w-5 h-5 object-cover z-5 bottom-4 right-1.5" alt="head">
                                        <?php endif; ?>
                                        <?php if (!empty($image['beard'])): ?>
                                            <img src="data:image/png;base64,<?= $image['beard'] ?>" class=" absolute w-5 h-5 object-cover z-20 bottom-4 left-1.5 " alt="beard">
                                        <?php endif; ?>
                                        <?php if (!empty($image['hat'])): ?>
                                            <img src="data:image/png;base64,<?= $image['hat'] ?>" class="  absolute w-5 h-5 object-cover z-10 top-0.5 right-6" alt="hat">
                                        <?php endif; ?>
                                    </div>
                                    <div class="max-w-full flex flex-col gap-2 pl-4 overflow-hidden">
                                        <h2 class="text-lg font-medium hover:underline"><a href="/profil/show/?username=<?= $message->username ?>"><?= $message->username ?></a></h2>

                                        <?php if (isset($message->path)): ?>
                                            <div class="w-full">
                                                <img src="data:image/png;base64,<?= base64_encode(file_get_contents($root . '/storage/feed/' . $message->path)) ?>" loading="lazy">
                                            </div>
                                        <?php endif ?>

                                        <p class="text-lg/8 break-words"><?= nl2br($message->content) ?></p>
                                    </div>
                                </div>

                                <div class="flex flex-row justify-between pt-4">
                                    <?php if ($message->liked_by_current_user > 0): ?>
                                        <div class="flex gap-1">
                                            <svg class="like-action stroke-2 fill-ms-<?= $mood['color'] ?> stroke-ms-<?= $mood['color'] ?> cursor-pointer" data-color="<?= $mood['color'] ?>" data-like="true" data-id="<?= $message->id ?>" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                                            </svg>
                                            <p class="like-number-text" data-likenumber="<?= !empty($message->like_count) ? $message->like_count : 0 ?>"> <?= !empty($message->like_count) ? (int)$message->like_count : 0 ?></p>
                                        </div>
                                    <?php else: ?>
                                        <div class="flex gap-1">
                                            <svg class="like-action stroke-2 stroke-ms-<?= $mood['color'] ?> cursor-pointer" data-color="<?= $mood['color'] ?>" data-like="false" data-id="<?= $message->id ?>" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                                            </svg>
                                            <p class="like-number-text" data-likenumber="<?= !empty($message->like_count) ? $message->like_count : 0 ?>"> <?= !empty($message->like_count) ? $message->like_count : 0 ?></p>
                                        </div>
                                    <?php endif ?>

                                    <svg class="stroke-2 reply cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                        <path d="m10 7-3 3 3 3" />
                                        <path d="M17 13v-1a2 2 0 0 0-2-2H7" />
                                    </svg>

                                    <svg class="stroke-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="18" x2="18" y1="20" y2="10" />
                                        <line x1="12" x2="12" y1="20" y2="4" />
                                        <line x1="6" x2="6" y1="20" y2="14" />
                                    </svg>
                                </div>

                                <div class="w-full flex flex-col justify-center items-center max-h-96 h-full overflow-scroll reply-message-list hidden">

                                    <svg class="w-12 h-12 animate-spin m-4 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>

                                </div>

                            </div>
                            <div class="flex flex-row reply-input hidden">
                                <form action="/talk/feed/message/reply/store/" method="POST" class="w-full p-2 flex border-x border-b rounded-b-md">
                                    <input type="hidden" name="message_id" value="<?= $message->id ?>">
                                    <input class="w-full mx-2 outline-none focus:ring-0 min-h-6 max-h-12 resize-none" type="text" placeholder="message . . ." name="content" id="content" rows="1"></input>
                                    <button type="submit" class="cursor-pointer"><svg class="stroke-2 stroke-ms-<?= $mood['color'] ?>" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M3.714 3.048a.498.498 0 0 0-.683.627l2.843 7.627a2 2 0 0 1 0 1.396l-2.842 7.627a.498.498 0 0 0 .682.627l18-8.5a.5.5 0 0 0 0-.904z" />
                                            <path d="M6 12h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endif ?>

                <?php endforeach ?>
            </div>
        </section>
    </main>
    <?php include_once($root . '/resources/layout/talk/footer.php') ?>
</body>

</html>