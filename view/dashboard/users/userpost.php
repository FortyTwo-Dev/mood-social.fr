<?php

    if (!isset($root)) {
        $root = $_SERVER['DOCUMENT_ROOT'];
    }
    include($root . '/resources/layout/dashboard/head.php');
    include_once($root . '/private/Actions/Routing/Route.php');
?>

<body class="w-screen h-screen overflow-hidden bg-ms-white">
    <?php include($root . '/resources/layout/dashboard/header.php'); ?>
    <main class="w-full h-full grid grid-cols-12">
        <?php include($root . '/resources/layout/dashboard/sidebar.php'); ?>
        
        <section class="col-span-10 mb-16 overflow-auto">
            <div class="p-4 border-b mx-2">
                <h1 class="text-2xl font-medium">Posts de <?= htmlspecialchars($data['user']->username ?? 'Utilisateur inconnu') ?></h1>
                <input
                    type="text"
                    id="search-post"
                    placeholder="Rechercher un post..."
                    class="mt-4 w-full p-2 border rounded-md"
                />
            </div>
            <ul class="p-4 flex flex-col gap-4" id="posts-list">
                <?php foreach($data['messages'] as $message): ?>
                <li class="border rounded-md p-4">
                    <p class="text-lg post-content"><?= htmlspecialchars($message->content) ?></p>
                    <?php if (!empty($message->path)): ?>
                    <img src="<?= htmlspecialchars('/storage/feed/' . $message->path) ?>" alt="Post Image" class="mt-2 max-w-full h-auto rounded-md">
                    <?php endif; ?>
                    <span class="text-xs text-gray-500 block mt-2"><?= htmlspecialchars($message->created_at) ?></span>
                </li>
                <?php endforeach; ?>

                <?php if (empty($data['messages'])): ?>
                    <li>Aucun post.</li>
                <?php endif; ?>
            </ul>
        </section>
    </main>


    <script>
        const searchInput = document.getElementById('search-post');
        const posts = document.querySelectorAll('#posts-list li');

        searchInput.addEventListener('input', function() {
            const value = this.value.toLowerCase();
            posts.forEach(post => {
                const content = post.querySelector('.post-content')?.textContent.toLowerCase() || '';
                post.style.display = content.includes(value) ? '' : 'none';
            });
        });
    </script>

    
</body>
</html>