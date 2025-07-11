<?php include( $root . '/resources/layout/talk/head.php' );?>
<body class="w-screen h-screen overflow-hidden bg-ms-white dark:bg-ms-black text-ms-black dark:text-ms-white">
    <?php require_once( $root . '/resources/layout/notification/base.php' ) ?>
        <dialog id="event-dialog">
        <form method="POST" action="/talk/event/store/" class="max-w-4xl w-full mx-4 p-6 fixed flex flex-col gap-6 justify-center z-50 left-1/2 top-1/2 -translate-1/2 rounded-md bg-ms-white dark:bg-ms-black border-1 border-ms-<?= $mood['color'] ?> text-ms-black dark:text-ms-white">
            <p class="font-semibold text-2xl text-start">Nouvel évènement</p>
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="border-2 p-2 border-ms-<?=$mood['color']?> rounded-md" placeholder="titre"/>
            <label for="description">Description</label>
            <textarea name="description" id="description" class="border-2 border-ms-<?= $mood['color'] ?> rounded-md min-h-40"></textarea>
            <div class="w-full flex gap-3 items-center justify-center">
                <button type="submit" class="rounded-md hover:underline w-full py-2 bg-ms-<?= $mood['color'] ?> text-<?= $mood['text_color'] ?>">Créer</button>
            </div>
        </form>
    </dialog>
    <main class="w-full h-full flex justify-center gap-8 px-4 pt-4">
        <?php include( $root . '/resources/layout/talk/sidebar.php' );?>
        <section class="relative overflow-auto w-4xl flex flex-col gap-4 border-x border-t">
            <h1 class="sticky top-0 p-4 text-3xl font-semibold text-center border-b">Évènement</h1>

            <div id="toggle-theme-button" class="absolute right-0 top-0 mr-8">
                <div class="relative my-5 mx-2 cursor-pointer">
                    <svg id="moon" class="absolute stroke-[1.5px] mr-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
                    <svg id="sun" class="absolute stroke-[1.5px] mr-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></svg>
                </div>
            </div>

            <div class="w-full px-3 flex flex-col gap-4">
                <?php foreach($data['events'] as $event): ?>

                    <?php if (isset($event)): ?>

                        <a href="/talk/event/show/?id=<?=$event['id']?>" class="border p-4 rounded-md last:mb-4">
                            <div class="w-full flex flex-row items-center justify-between">
                                <div class="w-full flex flex-row">
                                    <div class="w-full flex flex-col items-start justify-center gap-2 pl-4 overflow-hidden">
                                        <h2 class="w-full text-lg font-medium truncate"><?=$event['title']?></h2>
                                    </div>
                                </div>
                                <div class="flex gap-4">

                                </div>
                            </div>
                        </a>

                    <?php endif ?>

                <?php endforeach ?>
            </div>
            
        </section>
    </main>
    <?php include_once( $root . '/resources/layout/talk/footer.php' ) ?>
</body>
</html>