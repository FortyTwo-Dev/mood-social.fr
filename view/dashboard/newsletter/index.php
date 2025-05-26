<?php include( $root . '/resources/layout/dashboard/head.php' );?>
<body class="w-screen h-screen bg-ms-white">
    <?php include( $root . '/resources/layout/dashboard/header.php' );?>
    <main class="w-full h-full grid grid-cols-12">
        <?php include( $root . '/resources/layout/dashboard/sidebar.php' );?>
        <section class="col-span-10 mb-16 overflow-auto">
            <div class="p-4 border-b mx-2 flex items-center justify-between">
                <h1 class="text-2xl font-medium">Newsletter</h1>
                <a href="/dashboard/newsletter/create/" class="p-2 bg-ms-purple text-ms-white rounded-md font-semibold">Ajouter une newsletter</a>
            </div>
            <ul class="w-full h-full flex flex-col p-4 gap-5">
                <?php foreach($newsletters as $newsletter): ?>
                <li class="group p-4 w-full h-min rounded-md border border-gray-300 hover:border-ms-blue">
                    <a href="" class="flex justify-between items-center">
                        <div class="flex items-center gap-5">
                            <svg class="stroke-2 group-hover:stroke-ms-blue" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/><circle cx="12" cy="12" r="3"/></svg>
                            <p class="text-xl font-medium"><?=$newsletter->object?></p>
                        </div>
                        <div class="flex items-center gap-5">
                        <p class="text-xl font-medium">Envoyer : <span class="date-to-format" data-utc="<?= str_replace(' ', 'T', $newsletter->created_at) . 'Z' ?>"></span></p>
                        </div>
                    </a>
                </li>
                <?php endforeach ?>
            </ul>
        </section>
    </main>
</body>

<script>
    document.querySelectorAll('.date-to-format').forEach(el => {
        const utcDate = new Date(el.dataset.utc);
        const localDate = utcDate.toLocaleString('fr-FR', {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
        el.textContent = localDate;
    });
</script>
</html>